<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	// --------------------------------------------------------------------

	/**
	 * process_login method
	 *
	 * Generally 
	 *
	 */
	public function process_login($user_name,$password)
	{
		$res = $this->db->query('Select u.*,  a.acc_no,  a.type,
  a.pin,  ad.address,  ad.city,   ad.state,  ad.country From tbl_usec u Inner Join tbl_accountsc
  a   On a.user_id = u.id Inner Join tbl_addressc  ad   On ad.user_id = u.id Where   u.is_active != "FALSE" And   a.acc_no = "'.$user_name.'" And   u.pwd = "'.md5($password).'"');		

		
		return $res->num_rows() > 0 ? $res->row() : 0;
	}
	// --------------------------------------------------------------------
}
