<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


public function __construct()
	{
		parent::__construct();

	$this->load->model("Login_model");

	}

	public function index()
	{
	$data['view_page'] = "login";

		$this->M_main_configurations->site_render_view($data);
	}
	
	
	
	/**
	 * index method
	 *
	 * Generally 
	 *
	 */
	public function processLogin()
	{
		$username = $this->input->post('accno');
		$password = $this->input->post('pass');

		$login = $this->Login_model->process_login($username,$password);

		if ($login) 
		{
			$this->session->set_userdata('username',$login->fname);			
			$this->session->set_userdata('user_id',$login->id);
			$this->session->set_userdata('utype',$login->utype);
			$this->session->set_userdata('pin',$login->pin);
			$this->session->set_userdata('use_imag',$login->pics);
			
			

			redirect('Customer');
		}
		else
		{
			$this->session->set_flashdata('failed','Not valid account number or password or Account is not Active. Please try again or contact to support.');
			$this->index();
			return;
		}
	}

		public function logout()
	{
					$this->session->set_userdata(
					array(
						'username'	=> NULL,
						'user_id'	=> NULL,
						'welcome_pop_up' => NULL,
					));

				$this->session->set_flashdata('success',"Logged out Successfull");

				$this->unset_only();

				redirect('Login');
	}

	private function unset_only() 
	{
	    $user_data = $this->session->all_userdata();

	    foreach ($user_data as $key => $value) 
	    {
	        if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') 
	        {
	            $this->session->unset_userdata($key);
	        }
	    }
	}
	
}
