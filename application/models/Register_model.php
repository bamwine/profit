<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	// --------------------------------------------------------------------

	/**
	 * index method
	 *lastname
	 * Generally 
	 *
	 */
	public function create_account($pass_image,$nat_image,$lc1_doc)
	{
		$data = 
			array(
				
				'fname'  => $this->input->post('firstname'),
				'lname' => $this->input->post('lastname'),
				'pwd'  =>  md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'gender'  => $this->input->post('gender'),
				'is_active' => 'FALSE',
				'utype' => 'USER',
				'pics' => $pass_image, 
				'nation_id'=> $nat_image,
				'lc1_doc'=> $lc1_doc,
				'bdate' => $this->input->post('dob')
				
				);
			
		$res = $this->db->insert("tbl_usec", $data);

		if ($res) 
		{
			$user_id = $this->db->insert_id();

			//create a user address
			$net_id = $this->user_address($user_id);

			//save create_account
			$net_user_relation = $this->create_bank($user_id);

			//save profile
		//	$profile = $this->save_account_profile_data($user_id);

		}

		return $res ? 1 : 0;
	}
	// --------------------------------------------------------------------

	
	// --------------------------------------------------------------------

	/**
	 * create_network method
	 *
	 * Generally 
	 *
	 */
	protected function user_address($user_id)
	{
		
		$data = 
			array(
				'user_id' => $user_id,
				'address' => $this->input->post('address'),
				'city'  => $this->input->post('city'),
				'state'  => $this->input->post('state'),
				'zipcode'  => $this->input->post('zipcode')
				
				);
			
		$res = $this->db->insert("tbl_addressc", $data);

		return $res ? $this->db->insert_id() : 0;
	}
	// --------------------------------------------------------------------

	/**
	 * create_account method
	 *
	 * Generally 
	 *
	 */
	protected function create_bank($user_id)
	{
	
	$accno = rand(9999999999, 99999999999);
	$accno = strlen($accno) != 10 ? substr($accno, 0, 10) : $accno;
	
		$data = 
			array(
				'user_id' => $user_id,
				'acc_no' => $accno,
				'type'  => $this->input->post('acctype'),
				'balance' => 0,
				'pin'  => $this->input->post('pin'),
				'status'  => 'INACTIVE',
				'bdate'  => date('Y-m-d H:i:s'),
				'current_bak' => $this->input->post('currtbank')
				);
			
		$res = $this->db->insert("tbl_accountsc", $data);
		
		if($res==1){
		
$subject = "Account Registration";
	$to =$this->input->post('email');
	$msg_body = "Dear Customer,<br/><br/>
	This is to inform you that your Account $accno is register successfully with Profit and currently in Inactive state. We will soon contact you once it gets activated.<br/><br/>In case you need any further clarification for the same, please do get in touch with your Home Branch.<br/><br/>
	Regards,<br/>Profit Company";   
	
	$mail_data = array('to' => $to, 'sub' => $subject, 'msg' => 'register', 'body' => $msg_body);
	$this->M_general_model->send_email($mail_data);
		}
		return $res ? 1 : 0;
	}
	// --------------------------------------------------------------------

}
