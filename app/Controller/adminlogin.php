<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminlogin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper');
        no_cache();
        $this->load->model('home_db');
		$this->load->model('common_db');
        if($_SERVER['REQUEST_METHOD']==='POST' && $this->input->post('username')!='')
        {
			
			
			$this->load->helper(array('form', 'url')); 
				$this->load->library('form_validation');	
			   	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
				
				
				
				
				if($this->form_validation->run() == FALSE)
			   		{
							$this->session->set_flashdata('message','<div class="errorHandler alert alert-danger">
									<i class="fa fa-remove-sign"></i> Invalid Username Or Password
								</div>');    
            			    redirect(base_url());
	   				}
					
				else
				{
					$user =$this->input->post('username');
					$pass = $this->input->post('password');
			                $pass = sha1($pass); 
					$query = $this->common_db->condition_array('admin', array('username'=>$user,'status'=>0),' ',' '); // login check
					
					
		                     /*   echo $pass;
		                         die();
					
					die('fghfghfg'); */
					
					if($query)
					{
					    $hash="".$query[0]->password.""; 
						
						/*
						echo "<pre>";
						echo $pass;
						 print_r($query);die; */
						
						if ($pass == $hash) 
						{
                                                       
                                                        $this->common_db->update_data('admin',array('last_login'=>date('Y-m-d H:i:s')),'username',$user);
							$this->session->set_userdata('ddAdmin', $user);
							//echo "login";die;
							
							redirect('adminhome');
						}
						else
						{
							$this->session->set_flashdata('message','<div class="errorHandler alert alert-danger">
									<i class="fa fa-remove-sign"></i> Invalid Password.
								</div>');    
								// echo "else part";die; 
							redirect(base_url());
							
						}
					}
					
					else
					{
						$this->session->set_flashdata('message','<div class="errorHandler alert alert-danger">
									<i class="fa fa-remove-sign"></i> Invalid Username.
								</div>');    
						redirect(base_url());
					} 
				}
			
		}
        if(!$this->session->userdata('ddAdmin'))
        {    
            $this->load->view('signin',$this->data);
        }
    }
    
    public function index()
    {
        if($this->session->userdata('ddAdmin'))
        {
            redirect('adminhome');
        }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */