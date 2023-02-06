<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class crud_model extends CI_Model 
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
	
	
	
	
	public function get_all_loanspend()
	{
		//SELECT sum(`amountl`),MONTHNAME(`datel`) FROM `tbl_loansc` WHERE YEAR(`datel`) =YEAR(NOW()) group BY month(`datel`) ASC
	$res = $this->db->query('SELECT sum(`amountl`) as "amt",MONTHNAME(`datel`)as "names"  FROM `tbl_loansc` WHERE  statusl="pending" group BY month(`datel`) ASC');
			
	return $res->result_array();
	}
	
	
	
	public function get_all_loansfind()
	{
	$res = $this->db->query('SELECT sum(`amountl`) as "amt",MONTHNAME(`datel`)as "names"  FROM `tbl_loansc` WHERE  statusl="APPROVED" group BY month(`datel`) ASC');
			
	return $res->result_array();
	}
	
	
	
	public function get_all_loans_trans()
	{
	$res = $this->db->query('SELECT sum(`ramount`)as"asked",sum(`availb_amt`)as"Taken",MONTHNAME(`date_apprv`)as"months" FROM `tbl_loan_us` GROUP by month(`date_apprv`)');
			
	return $res->result_array();
	}
	
	public function get_all_loans_trans2()
	{
	$res = $this->db->query('SELECT sum(`ramount`)as"asked",sum(`availb_amt`)as"Taken" FROM `tbl_loan_us` ');
			
	return $res->result_array();
	}
	
	
	
	public function get_all_loans_trans3()
	{
	$res = $this->db->query('SELECT sum(`bal_pay`-`bal_to_pay`)as"collected",sum(`availb_amt`)as"Taken" FROM `tbl_loan_us` ');
			
	return $res->result_array();
	}
	
	
	
	public function get_userlist()
	{
	$res = $this->db->query('SELECT u.id, u.fname, u.lname, u.bdate, u.is_active, u.email, u.phone, a.acc_no
        FROM tbl_usec u, tbl_accountsc a
		WHERE u.id = a.user_id
		ORDER BY id DESC ');
			
	return $res->num_rows() > 0 ? $res : 0;
	}
	
	
	
	public function get_user_accts()
	{
	$res = $this->db->query('SELECT  tbl_userc_accts.*,tbl_usec.fname,
  tbl_usec.lname FROM   tbl_userc_accts
  INNER JOIN tbl_usec ON tbl_userc_accts.user_id = tbl_usec.id
  INNER JOIN tbl_accountsc ON tbl_accountsc.user_id = tbl_usec.id WHERE
 tbl_userc_accts.user_bak_stut = "Verfied"');
			
	return $res->num_rows() > 0 ? $res : 0;
	}
	
	
	public function get_user_hasloan($id)
	{
	$res = $this->db->query('SELECT  tbl_loan_us.*
FROM  tbl_loan_us   INNER JOIN tbl_usec ON tbl_loan_us.userIdl =tbl_usec.id WHERE  tbl_loan_us.userIdl = "'.$id.'"');
			
	return $res->num_rows() > 0 ? $res->row() : 0;
	}
	
	
	public function get_accountlist()
	{
	$res = $this->db->query('SELECT u.id, u.fname, u.lname, a.acc_no, a.balance,a.user_id, a.status, a.bdate, a.type, a.id AS acc_id
        FROM tbl_usec u, tbl_accountsc a
		WHERE u.id = a.user_id
		ORDER BY id DESC ');
			
	return $res->num_rows() > 0 ? $res : 0;
	}
	
	
	
	
	
	
	
	
	public function get_contract_deta($id)
	{
	$res = $this->db->query('SELECT  tbl_loan_us.*,tbl_usec.fname,  tbl_usec.lname,  tbl_usec.email,tbl_usec.signature,
  tbl_usec.phone,  tbl_usec.pics,  tbl_usec.bdate,  tbl_usec.gender,
  tbl_usec.is_active,  tbl_usec.utype,  tbl_usec.nation_id,  tbl_usec.lc1_doc,tbl_addressc.address,
  tbl_addressc.city,
  tbl_addressc.state,
  tbl_addressc.zipcode,
  tbl_addressc.country,
  tbl_addressc.user_id
FROM  tbl_loan_us  INNER JOIN tbl_usec ON tbl_loan_us.userIdl = tbl_usec.id  INNER JOIN tbl_addressc ON tbl_addressc.user_id = tbl_usec.id WHERE
  tbl_loan_us.id = "'.$id.'"');
			
	return $res->num_rows() > 0 ? $res : 0;
	}
	
	
	
	public function deluser($id)
		
	{
		
	$res = $this->db->query('DELETE FROM `tbl_usec` WHERE id = "'.$id.'"');
	if ($res== 1) {
		$res2 = $this->db->query('DELETE FROM `tbl_accountsc` WHERE user_id = "'.$id.'"');
	
		if ($res2== 1) {
			$res3 = $this->db->query('DELETE FROM `tbl_addressc` WHERE user_id = "'.$id.'"');
			
		}
		
	}
		return $res3 ? 1 : 0;
	}
	
	
	public function changeUserStatus()
	{
		
	$status =$this->input->post('sta_type');
	$id     =$this->input->post('userid');
		
	$res = $this->db->query('UPDATE tbl_usec SET is_active = "'.$status.'" WHERE id = "'.$id.'"');
			
	return $res ? 1 : 0;
	}
	
	
	
	public function changeAccStatus()
	{
		
	$status =$this->input->post('sta_type');
	$id     =$this->input->post('userid');
		
	$res = $this->db->query('UPDATE tbl_accountsc SET status = "'.$status.'" WHERE user_id = "'.$id.'"');
			
	return $res ? 1 : 0;
	}
	
	public function changeLoanStatus()
	{
		
	$status =$this->input->post('sta_type');
	$userid =$this->input->post('userid');
	$acct =$this->input->post('accn');
	$id     =$this->input->post('lonid');
	$dates= date('Y-m-d H:i:s');
		
	$res = $this->db->query('UPDATE tbl_loansc SET statusl = "'.$status.'",date_apprv="'.$dates.'" WHERE id = "'.$id.'" and userIdl = "'.$userid.'" and to_accnol = "'.$acct.'"');
			
	return $res ? 1 : 0;
	}
	
	public function changeUserEmail()
	{
		
	$email =$this->input->post('email');
	$id     =$this->input->post('userid');
		
	$res = $this->db->query('UPDATE tbl_usec SET email = "'.$email.'" WHERE id = "'.$id.'"');
			
	return $res ? 1 : 0;
	}
	
	
	public function process_login($user_name,$password)
	{
		$res = $this->db->query('SELECT * FROM back where  statu != "FALSE" and  names = "'.$user_name.'" And   passd = "'.md5($password).'"');		

		
		return $res->num_rows() > 0 ? $res->row() : 0;
	}
	
	
	public function process_login2($user_name,$password)
	{
		$res = $this->db->query('SELECT * FROM super where  statu != "FALSE" and  names = "'.$user_name.'" And   passd = "'.md5($password).'"');		

		
		return $res->num_rows() > 0 ? $res->row() : 0;
	}
	
	public function addUserBanks()
	{
		
	$useact =$this->input->post('accn');
	$id     =$this->input->post('userid');
	$bank_nam =$this->input->post('bank_nam');
	$bank_acct  =$this->input->post('bank_acct');
	
	$data = 
			array(
				
				'user_id'  =>$id,
				'user_acct' => $useact,
				'user_bak_acc'  => $bank_acct,
				'user_bak_na' => $bank_nam,
				'user_bak_stut'=> 'Not Verfied'
				
			);
		
	$res = $this->db->insert("tbl_userc_accts", $data);
			
	return $res ? 1 : 0;
	}
	
	
	
	public function changeUserBankStatus()
	{
		
	$useact =$this->input->post('accn');
	$id     =$this->input->post('userid');
	$status     =$this->input->post('sta_type');
		
	$res = $this->db->query('UPDATE tbl_userc_accts SET user_bak_stut = "'.$status.'" WHERE id = "'.$id.'" and user_acct = "'.$useact.'" ');
			
	return $res ? 1 : 0;
	}
	
	
	
	public function make_loan_t()
	{
		
	$accn =$this->input->post('accn');
	$userid     =$this->input->post('userid');
	$rqmout =$this->input->post('rqmout');
	$rdate  =$this->input->post('rdate');
	
	$apmout =$this->input->post('apmout');
	$rate     =$this->input->post('rate');
	$apay =$this->input->post('apay');
	$sign  =$this->input->post('sign');
	$lonid  =$this->input->post('lonid');
	$total_lon=(($rate/100)*$apmout)+$apmout;
	
	$data = 
			array(
				
				'userIdl'  =>$userid,
				'ramount' => $rqmout,
				'to_accnol'  => $accn,
				'rdate' => $rdate,				
				'availb_amt'  =>$apmout,
				'bal_pay' => $total_lon,
				'signature'  => $sign,
				'rate' => $rate,
				'date_apprv' => date('Y-m-d H:i:s'),
				'bal_to_pay'=> $total_lon,
				'statusl'=> 'Transfered'
				
			);
		
	$res = $this->db->insert("tbl_loan_us", $data);
	
	if($res==1){
		$res = $this->db->query('UPDATE tbl_loansc SET statusl = "Transfered" WHERE userIdl = "'.$userid.'" and to_accnol = "'.$accn.'" and id ="'.$lonid.'" ');
	
		
	}
			
	return $res ? 1 : 0;
	}
	
	
	
	
	public function make_loan_pays()
	{
		
	$user_acct =$this->input->post('uaccn');
	$userid     =$this->input->post('userids');
	$loan_requet =$this->input->post('loan_amt');
	$amout_paid  =$this->input->post('pay_amt');
	
	$date_pay =$this->input->post('dop');
	$means_pay     =$this->input->post('paymean');
	$loan_id =$this->input->post('loanid');
	$paying_acc  =$this->input->post('paying_acc');
	
	$res1 = $this->db->query('select bal_to_pay from tbl_loan_us  WHERE userIdl = "'.$userid.'" and to_accnol = "'.$user_acct.'" and id ="'.$loan_id.'" ');
	$balance =$res1->row()->bal_to_pay;	
	$data = 
			array(
				
				'user_id'  =>$userid,
				'user_acct' => $user_acct,
				'loan_requet'  => $loan_requet,
				'amout_paid' => $amout_paid,				
				'date_pay'  =>$date_pay,
				'means_pay' => $means_pay,
				'loan_id'  => $loan_id,
				'loan_bal' => $balance-$amout_paid,
				'pay_account'=> $paying_acc
				
				
			);
		
	$res = $this->db->insert("tbl_loan_pay", $data);
	
	if($res==1){
		$res1 = $this->db->query('UPDATE tbl_loan_us SET bal_to_pay = bal_to_pay-"'.$amout_paid.'" WHERE userIdl = "'.$userid.'" and to_accnol = "'.$user_acct.'" and id ="'.$loan_id.'" ');
	
	}
			
	return $res ? 1 : 0;
	}
	
	public function get_all_loans_paid($id)
	{
		
	$res = $this->db->query('SELECT * FROM tbl_loan_pay WHERE loan_id= "'.$id.'"');
	return $res->num_rows() > 0 ? $res : 0;
	}
	
	
	
}
