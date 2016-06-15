<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminhome extends CI_Controller {

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
        $prof=$this->home_db->getdetails($this->session->userdata('ddAdmin'));        
        $this->data['profile']=$prof;
        $this->data['header']=$this->load->view('header',$this->data,true);
		 $this->data['footer']=$this->load->view('footer',$this->data,true);
        
		if($prof[0]->type=='1')
		{
		   $this->data['left']=$this->load->view('left',$this->data,true);
        }
		else if($prof[0]->type=='2')
		{
            
		   $this->data['left']=$this->load->view('leftadmin',$this->data,true);
        }
		else
		{
          $this->data['left']=$this->load->view('leftcc',$this->data,true);
        }
		
		if(!$this->session->userdata('ddAdmin'))
        {
            redirect('adminlogin','refresh');
        }   
    }
    
    public function index()
    {
        $this->data['users']=$this->common_db->execute_query('select count(*) as tot from user_detail');
        $this->data['orders']=$this->common_db->execute_query('select count(*) as tot from orders where status=0 union all select count(*) as tot from orders where status=1');
        $this->data['products']=$this->common_db->execute_query('select count(*) as tot from product where status=0');
        $this->data['stock']=$this->common_db->execute_query('select count(*) as tot from product where stock < 5 and status=0');
        $this->load->view('home',$this->data); 
    }
   
    function logout()
    {
        $this->session->unset_userdata('ddAdmin');
	    session_destroy();
		redirect(base_url());
    } 
	
	function profile()
	{
		
		$this->load->view('profile_view', $this->data);
	}
	
	function profile_setting()
	{
		$prof =$this->data['profile'];
		$id = $prof[0]->id;

		$post = $this->input->post(null, true);
		$fname = $post['fname'];
		$email =$post['email'];
		$phone = $post['phone'];
		
		
			$data =array(
						'name'=>$fname,
						'email'=>$email,
						'mobile'=>$phone
						);
		
		$query =$this->common_db->update_data('admin',$data, 'id', $id);
		if($query)
		{
			$this->session->set_flashdata('message','<div class="alert alert-success"><button data-dismiss="alert" class="close">
                                            &times;
                                        </button>
                                        <i class="fa fa-check-circle"></i>
                                        <strong>Well done!</strong> You successfully Updated your Profile.
                                    </div>');
			redirect ('adminhome/profile');
		}
	}
	
	
	function account_setting()
	{
		$post = $this->input->post(null, true);
		$cpass = $post['cpassword'];
	
                $pass = $post['password'];
        
		$rpass = $post['rpassword'];
		$this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('cpassword', 'Current Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('rpassword', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger"><button data-dismiss="alert" class="close">
                                            &times;
                                        </button>
                                        <i class="fa fa-times-circle"></i>
                                        <strong>Error!</strong> '.validation_errors().'
                                    </div>');
            redirect ('adminhome/profile');;
        }

		$prof =$this->data['profile'];
		$id = $prof[0]->id;
		
        $hash="".$prof[0]->password."";
        
        $cpass = sha1(cpass ); 
       
        
        if ($cpass == $hash) 
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger"><button data-dismiss="alert" class="close">
                                            &times;
                                        </button>
                                        <i class="fa fa-times-circle"></i>
                                        <strong>Error!</strong> Invalid current password.
                                    </div>');
            redirect ('adminhome/profile');;
        }
        
            
            
		$options = [
					'cost' => 11,
					'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        			];
					
		$data =array(
					'password'=> sha1($pass)
					);
		
		$query =$this->common_db->update_data('admin',$data,'id',$id);
		if($query)
		{
			$this->session->set_flashdata('message','<div class="alert alert-success"><button data-dismiss="alert" class="close">
                                            &times;
                                        </button>
                                        <i class="fa fa-check-circle"></i>
                                        <strong>Well done!</strong> You successfully Updated Password.
                                    </div>');
			redirect ('adminhome/profile');
		}

	}
    
    function adminuser()
    {
        if($this->data['profile'][0]->type==1)
        {
        $this->data['admins']=$this->common_db->getall('admin','insert_date','desc');
        $this->load->view('admins',$this->data);
        }
        else
        {
            redirect('adminhome');
        }
    }
    
    function status()
    {
        $id=$this->uri->segment(3);
        $sql=$this->common_db->status('admin',$id);
        if($sql)
        {
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                            <i class="fa fa-remove-sign"></i> Status Updated Successfully.
                        </div>');    
            redirect(base_url().'adminhome/adminuser');
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-remove-sign"></i> Status Update Not successfull
                        </div>');    
            redirect(base_url().'adminhome/adminuser');
        }
    }
    function add_user()
    {
        if($this->data['profile'][0]->type==1)
        {
        $this->data['type']='add';
        $this->load->view('addedit_user',$this->data);
        if($_SERVER['REQUEST_METHOD']==='POST' && $this->input->post('name',true)!=''):
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('mobile', 'Phone Number', 'required|numeric|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');

        if ($this->form_validation->run() == FALSE)
        {   
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-remove-sign"></i>'.validation_errors().'</div>'); 
            redirect('adminhome/add_user');
        }
        else
        {
        $name=$this->input->post('name');
        $options = [
                'cost' => 11,
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                ];
        
                $db=array(
                    'name'=>$name,
                    'mobile'=>$this->input->post('mobile'),
                    'username'=>$this->input->post('username'),
                    'email'=>$this->input->post('email'),
                    'password'=>password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options),
                    'type'=>$this->input->post('type'),
                    'insert_date'=>date('Y-m-d H:i:s')
                );  
                $sql=$this->common_db->add_data('admin',$db);
                if($sql)
                {
                    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-remove-sign"></i> Category Added Successfully.
                                </div>');    
                    redirect(base_url().'adminhome/adminuser');
                }
                else
                {
                    $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-remove-sign"></i> Insertion Not successfull. Please try again.
                                </div>');    
                    redirect(base_url().'adminhome/add_user');
                }
        }      
        endif;
        
        }
        else
        {
            redirect('adminhome');
        }
    }
    
    function banner()
    {
        $this->data['banner']=$this->common_db->getall('banner',' ',' ');
        $this->load->view('banner',$this->data);
    }
    
    function edit_banner()
    {
        $this->data['banner']=$this->common_db->getall('banner',' ',' '); 
        $this->load->view('edit_banner',$this->data);
        
        if($_SERVER['REQUEST_METHOD']==='POST'):
        $id=$this->input->post('idd');
        if($_FILES['imag']['name']){  
        unlink('../'.$this->data['banner'][0]->image);
        
        //upload images now
        $uploaddir = '../assets/banner/'; 
        $uploadDBdir= "assets/banner/";
        $arrayImage=$_FILES['imag']['name'];
        $arrayTemp=$_FILES['imag']['tmp_name'];
        if($arrayTemp!="") {
            $ext = end(explode(".",  $arrayImage));
            $image_name='Image'.time().'.'.$ext;
            $uploadfile = $uploaddir.$image_name;
            $uploadfileTable = $uploadDBdir.$image_name;
            move_uploaded_file($arrayTemp,$uploadfile);
            }
            
        $db=array(
        'image'=>$uploadfileTable
        );
        
        $q=$this->common_db->update_data('banner',$db,'id',$id);  
        if($q)
        {
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close"><i class="fa fa-times"></i></button> Edited Successfully.
                            </div>');    
                redirect(base_url().'adminhome/banner');
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close"><i class="fa fa-times"></i></button> Edit Not successfull
                        </div>');    
            redirect(base_url().'adminhome/edit_banner/');
        }
        }
        else
        redirect('adminhome/banner');
        endif;
    }
    
    function ban_status()
    {
        $id=$this->uri->segment(3);
        $sql=$this->common_db->status('banner',$id);
        if($sql)
        {
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissable">
                            <i class="fa fa-remove-sign"></i> Status Updated Successfully.
                        </div>');    
            redirect(base_url().'adminhome/banner');
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-remove-sign"></i> Status Update Not successfull
                        </div>');    
            redirect(base_url().'adminhome/banner');
        }
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */