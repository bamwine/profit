<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_main_configurations extends CI_Model 
{


	public function __construct()
	{
		parent::__construct();

		$this->session->set_userdata('Profit','Uganda Limited');
		$this->company_name = $this->session->userdata('company_name');
		$this->username = $this->session->userdata('username');
		$this->user_id = $this->session->userdata('user_id');
		$this->utype = $this->session->userdata('utype');
		$this->use_imag = $this->session->userdata('use_imag');
		
		

	}

/**
	 * if_logged_in method
	 *
	 * Generally 
	 *
	 */
	public function if_logged_in()
	{
		$username = $this->session->userdata('username');
		$utype = $this->session->userdata('utype');

		if (!$username || !$utype) 
		{
			redirect('logout');
		}
	}
	
public function if_logged_in_ad()
	{
		$username = $this->session->userdata('username');
		$utype = $this->session->userdata('utype');

		if (!$username || !$utype) 
		{
			redirect('adminback');
		}
	}

	public function if_logged_in_adms()
	{
		$username = $this->session->userdata('username');
		$utype = $this->session->userdata('utype');

		if (!$username || !$utype) 
		{
			redirect('super');
		}
	}
	

	public function logout($msg='')
	{
		//kill/unset sessions data
		$this->unset_only();

		$msg = !$msg ? "Logged out Successfully" : $msg;	
		$this->session->set_flashdata('success',$msg);
		redirect('login');
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
	
	
	
	public function get_user_details($user_id)
	{
		$res = $this->db->query('Select u.*,  a.acc_no,  a.type,a.balance,
  a.pin,  ad.address,  ad.city,   ad.state, ad.zipcode, ad.country From tbl_usec u Inner Join tbl_accountsc
  a   On a.user_id = u.id Inner Join tbl_addressc  ad   On ad.user_id = u.id Where   u.id = "'.$user_id.'"');		

		
		return $res->num_rows() > 0 ? $res->row() : 0;
	}
	
	public function get_user_bal_inquire($user_id)
	{
		$res = $this->db->query('Select   u.fname,  u.lname,  u.is_active,  a.acc_no,u.id,
  a.balance,  tra.*,  Max(tra.date) As lastdat
 
From   tbl_usec u Inner Join   tbl_accountsc a     On a.user_id = u.id Inner Join
 tbl_transactionc tra     On tra.to_accno = a.acc_no Where   u.id = "'.$user_id.'"
');		

		
		return $res->num_rows() > 0 ? $res->row() : 0;
	}
	
	
	
	public function get_user_balance($user_id,$account_no)
	{
	$res = $this->db->query('SELECT balance FROM tbl_accountsc WHERE user_id = "'.$user_id.'" AND acc_no = "'.$account_no.'" AND status = "ACTIVE"');		

		
		return $res->num_rows() > 0 ? $res->row() : 0;
	}
	
	
	
	public function site_render_view($data)
	{
		$data['company_name'] = $this->company_name;
		$data['username'] = $this->username;

		$data['page_heading'] = isset($data['page_heading']) ? $data['page_heading'] : '';

		$data['page_title'] = $data['page_heading'].'-'.$this->session->userdata('company_name');

		$header_file = isset($data['header_view']) ? $data['header_view'] : 'header';
		$footer_file = isset($data['footer_view']) ? $data['footer_view'] : 'footer';

		$this->load->view("include/".$header_file, $data);
		$this->load->view($data['view_page'],$data);
		$this->load->view("include/".$footer_file,$data);
	}


	public function user_render_view($data)
	{
		$data['company_name'] = $this->company_name;
		$data['username'] = $this->username;

		$data['page_heading'] = isset($data['page_heading']) ? $data['page_heading'] : '';

		$data['page_title'] = $data['page_heading'].'-'.$this->session->userdata('company_name');

		
//$header_file = isset($data['header_view']) ? $data['header_view'] : 'headeradmin';
		$header_file = isset($data['header_view']) ? $data['header_view'] : 'header';
		$footer_file = isset($data['footer_view']) ? $data['footer_view'] : 'footer';
		$nav_file = isset($data['nav_file']) ? $data['nav_file'] : 'navigation';
		
		$this->load->view("include/".$header_file, $data);
		$this->load->view("include/".$nav_file, $data);
		$this->load->view($data['view_page'],$data);
		$this->load->view("include/".$footer_file,$data);
	}
	

	
	public function user_render_admin($data)
	{
		$data['company_name'] = $this->company_name;
		$data['username'] = $this->username;

		$data['page_heading'] = isset($data['page_heading']) ? $data['page_heading'] : '';

		$data['page_title'] = $data['page_heading'].'-'.$this->session->userdata('company_name');

		
		$header_file = isset($data['header_view']) ? $data['header_view'] : 'header';
		$footer_file = isset($data['footer_view']) ? $data['footer_view'] : 'footer';
		$nav_file = isset($data['nav_file']) ? $data['nav_file'] : 'include/nav_admin';
		
		$this->load->view("include/".$header_file, $data);
		$this->load->view($nav_file, $data);
		$this->load->view($data['view_page'],$data);
		$this->load->view("include/".$footer_file,$data);
	}
	
	
	
	
	public function user_render_adminv($data)
	{
		$data['company_name'] = $this->company_name;
		$data['username'] = $this->username;

		$data['page_heading'] = isset($data['page_heading']) ? $data['page_heading'] : '';

		$data['page_title'] = $data['page_heading'].'-'.$this->session->userdata('company_name');

		
		
		
		
		$header_file = isset($data['header_view']) ? $data['header_view'] : 'headeradmin';
		$footer_file = isset($data['footer_view']) ? $data['footer_view'] : 'footer';
		$nav_file = isset($data['nav_file']) ? $data['nav_file'] : 'navigation';
		
		$this->load->view("include/".$header_file, $data);
		$this->load->view("include/".$nav_file, $data);
		$this->load->view($data['view_page'],$data);
		$this->load->view("include/".$footer_file,$data);
		
		
	}
	
	
}
