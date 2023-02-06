<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


public function __construct()
	{
		parent::__construct();

	///	$this->M_main_configurations->if_logged_in();
		$this->load->model("Admin_model");
		$this->load->model("M_general_model");
	}

	public function index()
	{
	$data['view_page'] = "home";
	$data['usernames']=	$this->session->userdata('username');
	$data['user_ids']=	$this->session->userdata('user_id');
	$this->M_main_configurations->site_render_view($data);
	}
	
	public function admin()
	{
	$data['view_page'] = "admin";
	
		$this->M_main_configurations->site_render_view($data);
	}
	
	public function Holder()
	{
	$data['view_page'] = "holds";
	
		$this->M_main_configurations->site_render_view($data);
	}
	
	public function processLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->Admin_model->process_login($username,$password);

		if ($login) 
		{
			$this->session->set_userdata('username',$login->names);			
			$this->session->set_userdata('user_id',$login->id);
			$this->session->set_userdata('utype',$login->type);
			redirect('Dashboard');
		}
		else
		{
			$this->session->set_flashdata('failed','Not valid  password or Account is not Active. Please try again or contact to support.');
			$this->index();
			
			redirect('adminback');
			return;
		}
	}
	
	
		public function processLogin2()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->Admin_model->process_login2($username,$password);

		if ($login) 
		{
			$this->session->set_userdata('username',$login->names);			
			$this->session->set_userdata('user_id',$login->id);
			$this->session->set_userdata('utype',$login->type);
			redirect('Admins');
		}
		else
		{
			$this->session->set_flashdata('failed','Not valid  password or Account is not Active. Please try again or contact to support.');
			$this->index();
			
			redirect('super');
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

				redirect('adminback');
	}

	
	
	public function logout2()
	{
					$this->session->set_userdata(
					array(
						'username'	=> NULL,
						'user_id'	=> NULL,
						'welcome_pop_up' => NULL,
					));

				$this->session->set_flashdata('success',"Logged out Successfull");

				$this->unset_only();

				redirect('super');
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
