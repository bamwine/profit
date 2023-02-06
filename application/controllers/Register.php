<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


public function __construct()
	{
		parent::__construct();
		$this->M_main_configurations->if_logged_in_ad();
		$this->load->model("Register_model");
		$this->load->model("M_general_model");
		$this->load->helper(array('form', 'url'));

	}

	public function index()
	{
	$data['view_page'] = "register";
	//$data['view_page'] = "upload";
		$this->M_main_configurations->site_render_view($data);
	}
	
	
	
		public function createAccount()
	{
		
	//for Information 
		$this->form_validation->set_rules('firstname','First Name','trim|required');
		$this->form_validation->set_rules('lastname','Last Name','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword',' Password','trim|required|matches[password]');
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('gender','Please select your gender','trim|required');
		$this->form_validation->set_rules('dob','Date of Birth','trim|required');		
		$this->form_validation->set_rules('phone','Phone Number','trim|required|min_length[10]|numeric');
		
		// for address
		$this->form_validation->set_rules('city','City Name','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required|min_length[10]');
		$this->form_validation->set_rules('state','Country','trim|required');		
		$this->form_validation->set_rules('zipcode','Zip Code','trim|required');
		
		
		// for account
		$this->form_validation->set_rules('acctype','Please select Account Type.','trim|required');
		$this->form_validation->set_rules('pin','Account Pin','trim|required|min_length[5]|numeric');
		$this->form_validation->set_rules('cpin','Pins','trim|required|matches[pin]|numeric');		
	
	
	/// for files uplad
		//$this->form_validation->set_rules('picture');
		//$this->form_validation->set_rules('lc1d','LC1 DOCUMENT','trim|required');		
		//$this->form_validation->set_rules('nin','ID DOCUMENT','trim|required');
		

		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			return;
		}
			
			
		//$this->createAccount();
		
		$pass_image = './uploads/user.jpg';
		$nin_image  = './uploads/user.jpg';
		$lc1d_doc="";
		
if (!empty($_FILES['passport']['name']))
		{
			//upload files
			$path = './uploads/users/passt';
			//M_general_model is loaded globally      
			$result=$this->M_general_model->do_upload($path,'passport');

			if (isset($result['error'])) 
			{
				$this->session->set_flashdata('failed','Upload Document: :'.$result['error']);

				$this->index();
				return;
			}

			

			$pass_image = $path.'/'.$result['upload_data']['file_name'];
		}else{
			
			$this->session->set_flashdata('failed','file required');
			//return;
			
		}

		
				
if (!empty($_FILES['nin']['name']))
		{
			//upload files
			$path = './uploads/users/nat_id';
			//M_general_model is loaded globally
			$result=$this->M_general_model->do_upload($path,'nin');

			if (isset($result['error'])) 
			{
				$this->session->set_flashdata('failed','Upload Document: :'.$result['error']);

				$this->index();
				return;
			}

			

			$nin_image = $path.'/'.$result['upload_data']['file_name'];
		}else{
			
			$this->session->set_flashdata('failed','file required');
			//return;
			
		}

	

				
if (!empty($_FILES['lc1d']['name']))
		{
			//upload files
			$path = './uploads/users/lc_doc';
			//M_general_model is loaded globally
			$result=$this->M_general_model->do_upload_documents($path,'lc1d');

			if (isset($result['error'])) 
			{
				$this->session->set_flashdata('failed','Upload Document: :'.$result['error']);

				$this->index();
				return;
			}

			

			$lc1d_doc = $path.'/'.$result['upload_data']['file_name'];
		}else{
			
			$this->session->set_flashdata('failed','file required');
			//return;
			
		}
	

		$save = $this->Register_model->create_account($pass_image,$nin_image,$lc1d_doc);

		if ($save) 
		{

			$this->session->set_flashdata('success','Account Created Successfully - login');
			
			redirect('Dashboard');
		}
		else
		{
			$this->session->set_flashdata('failed','Account Creation Failed');
			$this->index();
		}
	}
	
	
	 public function do_upload()
        {
               
				$config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"]).'./uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
				$this->upload->initialize($config);
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
						
                      $this->load->view('upload', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                         $this->load->view('upload_success', $data);
                }
        }
	
	 
	
}
