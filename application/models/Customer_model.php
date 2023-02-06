<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model 
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
	public function make_transction($uerids)
	{
	
	$amt=$this->input->post('amt');
	$type=$this->input->post('type');
	//$uerids =	$this->session->userdata('user_id');
	$result=$this->M_main_configurations->get_user_details($uerids);
	$acc_no=$result->acc_no;
	$tx_no = $this->M_general_model->next_tx_no();		
	$desc = sprintf("Fund transfer of $%u to Account %u Reference# %s", $amt, $acc_no, $tx_no);		
		
		//$get_bal = $this->M_main_configurations->get_user_balance($uerids,$acc_no);
		
		$get_bal = $this->db->query('SELECT balance FROM tbl_accountsc WHERE user_id = "'.$uerids.'" AND acc_no = "'.$acc_no.'" AND status = "ACTIVE"');
			

		if ($get_bal->num_rows() ==1) 
		{
		$balance =$get_bal->row()->balance;
		if($type == "debit") {
			//check if amt is more then $balance
			if($balance < $amt) {
				//header('Location: index.php?msg=' . urlencode(''));
				$this->session->set_flashdata('failed','Account balance is less, fail to transfer fund.');
	
				//redirect('Customer/changerm/wd');
				redirect('Dashboard/user_errors/'.h_encrypt_decrypt($uerids).'/wd',"refresh");
			}
		}
		$total = $type == "credit" ? ($balance + $amt-($this->M_general_model->taxtion($amt))) : ($balance - $amt-($this->M_general_model->taxtion($amt)));
		if($total <= 0) {
			//return here...
		}
		
		
		$dataup = 
			array(
				'balance' => $total							
				);
				
		$this->db->where("user_id", $uerids);
		$this->db->where("acc_no", $acc_no);
		$res = $this->db->update("tbl_accountsc", $dataup);
		
		$data = 
			array(
				
				'tx_type'  =>$type,
				'amount' => $amt,
				'description'  => $desc,
				'tx_no' => $tx_no,
				'date'  => date('Y-m-d H:i:s'),
				'to_accno'  => $acc_no,
				'status'  => 'SUCCESS',
				'tdate'  => date('Y-m-d H:i:s'),
				'comments'  => $this->input->post('desc')
				
			);
			
			$resave = $this->db->insert("tbl_transactionc", $data);
			
		
		$this->session->set_flashdata('success','Transaction Made Successfully');
//exit;
		//redirect('Customer');
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($uerids).'/wd',"refresh");
		
		}
	
	else {
	
	$this->session->set_flashdata('failed','Account number not active. You can not proceed fund transfer with a inactive account.');
		
		//redirect('Customer/changerm/wd');
		
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($uerids).'/wd',"refresh");
	}
	

			
return $res ? 1 : 0;
		}

	public function print_stamt($acc_no)
	{
	$res = $this->db->query('SELECT * FROM tbl_transactionc WHERE to_accno = "'.$acc_no.'" ORDER BY id DESC LIMIT 20 ');
			
	return $res->num_rows() > 0 ? $res : 0;
	}
	
	
	
		public function make_transfer()
	{
	
	
	$uerids =	$this->session->userdata('user_id');
	$result=$this->M_main_configurations->get_user_details($uerids);
	//$acc_no=$result->acc_no;
	
	
	
	$acc_no 	= $this->input->post('accno');
	$sacc_no 	= $this->input->post('saccno');
	$rbname 	= $this->input->post('rbname');
	$rname	 	= $this->input->post('rname');
	$swift	 	= $this->input->post('swift');
	$amt	 	= $this->input->post('amt');
	$comments	= $this->input->post('desc');
	$date_of 	= $this->input->post('dot');
	$toption 	= $this->input->post('toption');
	
	
	$funds_data = array(
		'acc_no' 	=> $acc_no, 
		'sacc_no' 	=> $sacc_no,
		'rbname' 	=> $rbname, 
		'rname' 	=> $rname, 
		'swift' 	=> $swift, 
		'amt' 		=> $amt,
		'comments' 	=> $comments,
		'date_of' 	=> $date_of,
		'toption' 	=> $toption,
	);
	
	
	
	$get_bal = $this->db->query('SELECT * FROM tbl_accountsc WHERE acc_no = "'.$sacc_no.'" AND user_id = "'.$uerids.'"');
			

		if ($get_bal->row()->status=='INACTIVE') 
		{
		
			$this->session->set_flashdata('failed','This account is either not active for fund Transfer/Suspended or Dormant. Pls contact Customer Care for details.');

		redirect('Customer/changerm/ft');
		return $res ? 1 : 0;
			exit();
		
		}
	
	
	//now setting the temp array into session so we can use it later...
	//$_SESSION['funds_data'] = $funds_data;
	$this->session->set_userdata($funds_data);
	//generate and send token
	$token = rand(100000, 9999999);
	$token = strlen($token) != 6 ? substr($token, 0, 6) : $token;
	$this->session->set_userdata('otp_token', $token);
	//$_SESSION['otp_token'] = $token;

	//email it now.	
	$subject = "Transaction Authorization Code";
	//$to = $_SESSION['hlbank_user']['email'];
	$to=$result->email;
	//$mail_data = array('to' => $to, 'sub' => $subject, 'msg' => 'otp', 'token' => $token);
	//send_email($mail_data);
	
	
$this->email->from('bamwinealbert@gmail.com', 'Bamwine Profit');
$this->email->to('bamwinealbert@gmail.com');
$this->email->subject($subject);
$this->email->message($token);

$this->email->send();
	
	redirect('Customer/changerm/tk');
	//header('Location: index.php?v=Token');
	exit();
	
	
		}
		
		
		
	
function transferFunds() 
{
	$token =  $this->input->post('token');
	$s_token = $this->session->userdata('otp_token');
	
	$toption;
	$sacc_no;
	$racc_no ;
	$amt;
	if($s_token == $token) {
		//extract($_SESSION['funds_data']);
		$toption     =$this->session->userdata('toption');
		$sacc_no     =$this->session->userdata('sacc_no');
		$racc_no     =$this->session->userdata('acc_no');
		$amt		=$this->session->userdata('amt');
	}
	else {
		$this->session->set_flashdata('failed','Transaction Authorization Code in not valid.');
		redirect('Customer/changerm/ft');
		
		exit();
	}
	
	//next transaction number
	$tx_no = $this->M_general_model->next_tx_no();	
	
	//check if lets a Local transfer
	if($toption != "LT") {
		//debit from sender,
		//update transaction table,
		//send email and show details to user.
		
		$s_result = $this->db->query('SELECT acc_no, user_id, balance FROM tbl_accountsc WHERE acc_no =  "'.$sacc_no.'"');
			

		$s_bal 		= $s_result->row()->balance; 
		$s_uid 		= $s_result->row()->user_id;
		$s_accno 	= $s_result->row()->acc_no;
		$d_total 	= ($s_bal - $amt-($this->M_general_model->taxtion($amt)));
		if($s_bal < $amt) {
			
			$this->session->set_flashdata('failed','You do not have enough balance to proceed with this transfer.');
			redirect('Customer/changerm/ft');
			exit();	
		}
		//update sender's account balance
		$sql_sacc = $this->db->query('UPDATE tbl_accounts SET balance = "'.$d_total.'" WHERE user_id = "'.$s_uid.'" AND acc_no = "'.$s_accno.'"');
		
		$desc = sprintf("Fund transfer of $%u to Account %u Reference# %s", $amt, $racc_no, $tx_no);
		//$sql = "INSERT INTO tbl_transaction (tx_no, tx_type, amount, date, description, to_accno, status, tdate, comments) 
			//	VALUES ('$tx_no', 'debit', $amt, NOW(), '$desc', '$sacc_no', 'SUCCESS', '$date_of', '$comments')";
				
				$dataudp = 
			array(
				
				'tx_type'  =>'debit',
				'amount' => $amt,
				'description'  => $desc,
				'tx_no' => $tx_no,
				'date'  => date('Y-m-d H:i:s'),
				'to_accno'  => $sacc_no,
				'status'  => 'SUCCESS',
				'tdate'  => $this->session->userdata('date_of'),
				'comments'  => $this->session->userdata('comments')
				
			);
				
				
				$res = $this->db->insert("tbl_transactionc", $dataudp);
				
		//	funds_transfer_mail($amt, $sacc_no);
		//$_SESSION['funds_data']['tx_no'] = $tx_no;
		//header('Location: index.php?v=IntFund');
		$this->session->set_flashdata('success','Transaction Made Successfully ');
		redirect('Customer/changerm/ft');
		return $res ? 1 : 0;
		exit();
	}
	
	//1) check receivers account is valid, or not.
	
	$res1 = $this->db->query('SELECT acc_no, user_id, balance FROM tbl_accountsc WHERE acc_no = "'.$racc_no.'" AND status = "ACTIVE"');
	if ($res1->num_rows()== 1) {
		
		//2) Now check if senders balance is available or not..
		
		$s_sql = $this->db->query('SELECT acc_no, user_id, balance FROM tbl_accountsc WHERE acc_no = "'.$sacc_no.'"');
		//check if senders balance is not enough
		$s_bal 	= $s_sql->row()->balance; 
		if($s_bal < $amt) {
			$this->session->set_flashdata('failed','You do not have enough balance to proceed with this transfer.');

		redirect('Customer/changerm/ft');
		
			
		}
		//3) credit in reveice's account and add transaction entry.
		$r_bal 	= $res1->row()->balance;
		$r_uid 	= $res1->row()->user_id;
		$r_accno = $res1->row()->acc_no;
		$total = ($r_bal + $amt-($this->M_general_model->taxtion($amt)));
		
		
		$sql_sacc = $this->db->query('UPDATE tbl_accountsc SET balance = "'.$total.'" WHERE user_id = "'.$r_uid.'" AND acc_no = "'.$r_accno.'"');
		
		$desc = sprintf("Fund transfer of $%u from Account %u Reference# %s", $amt, $sacc_no, $tx_no);
		//$sql = "INSERT INTO tbl_transaction (tx_no, tx_type, amount, date, description, to_accno, status, tdate, comments) 
			//	VALUES ('$tx_no', 'credit', $amt, NOW(), '$desc', '$r_accno', 'SUCCESS', '$date_of', '$comments')";
		
		
		
		$dataudp2 = 
			array(
				
				'tx_type'  =>'credit',
				'amount' => $amt,
				'description'  => $desc,
				'tx_no' => $tx_no,
				'date'  => date('Y-m-d H:i:s'),
				'to_accno'  => $sacc_no,
				'status'  => 'SUCCESS',
				'tdate'  => $this->session->userdata('date_of'),
				'comments'  => $this->session->userdata('comments')
				
			);
				
				
				$res = $this->db->insert("tbl_transactionc", $dataudp2);
		if($res==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	}	
		
		//4) debit from sender's account add transaction entry
		$s_uid 	= $s_sql->row()->user_id;
		$s_accno = $s_sql->row()->acc_no;
		$d_total = ($s_bal - $amt-($this->M_general_model->taxtion($amt)));
		
		
		$sql_sacc = "";
		
$sql_sacc1 = $this->db->query('UPDATE tbl_accountsc SET balance = "'.$d_total.'" WHERE user_id = "'.$s_uid.'" AND acc_no = "'.$s_accno.'"');
		//debit from sender's account and insert a log, send email
		$desc = sprintf("Fund transfer of $%u to Account %u Reference# %s", $amt, $r_accno, $tx_no);
		$sender_sql = "INSERT INTO tbl_transactionc (tx_no, tx_type, amount, date, description, to_accno, status, tdate, comments) 
				VALUES ('$tx_no', 'debit', $amt, NOW(), '$desc', '$s_accno', 'SUCCESS', '$date_of', '$comments')";
				
		
		
		$dataudp3 = 
			array(
				
				'tx_type'  =>'debit',
				'amount' => $amt,
				'description'  => $desc,
				'tx_no' => $tx_no,
				'date'  => date('Y-m-d H:i:s'),
				'to_accno'  => $s_accno,
				'status'  => 'SUCCESS',
				'tdate'  => $this->session->userdata('date_of'),
				'comments'  => $this->session->userdata('comments')
				
			);
				
				
				$resd = $this->db->insert("tbl_transactionc", $dataudp3);
		
	
		
		//email details...
		if($resd==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	}	
		$this->session->set_flashdata('success','Fund transfer successful');
		redirect('Customer/changerm/ft');
		exit();
	}
	else {
		$this->session->set_flashdata('failed','Receivers account number does not exist or not active. Please contact to custmer care.');

		redirect('Customer/changerm/ft');
		
		exit();	
	}
}




public function changepin()
	{
	$u_uid=	$this->session->userdata('user_id');
	$pin =  $this->input->post('pin');
	$data['userdetails']=$this->M_main_configurations->get_user_details($u_uid);
	$res = $this->db->query('UPDATE tbl_accountsc SET pin = "'.$pin.'" WHERE user_id = "'.$u_uid.'" ');
	if($res==1){
	
	
	//send email here
	
	
	
	
	$to =$data['userdetails']->email;
	$subject = "PIN Change";	
	$mail_data = array('to' => $to, 'sub' => $subject, 'msg' => 'change_pin', 'pin' => $pin);
	$this->M_general_model->send_email($mail_data);
	}	
			
	return $res ? 1 : 0;
	}

	
	public function changepin_ad($id)
	
	{
		$data['userdetails']=$this->M_main_configurations->get_user_details($id);
		
	//$u_uid=	$this->session->userdata('user_id');
	$pin =  $this->input->post('pin');
	
	$res = $this->db->query('UPDATE tbl_accountsc SET pin = "'.$pin.'" WHERE user_id = "'.$id.'" ');
	if($res==1){
	
	
	
	//send email here
	
	$to =$data['userdetails']->email;
	$subject = "PIN Change";	
	$mail_data = array('to' => $to, 'sub' => $subject, 'msg' => 'change_pin', 'pin' => $pin);
	
	$this->M_general_model->send_email($mail_data);
	}	
			
	return $res ? 1 : 0;
	}

	
	
public function changepwd()
	{
	$pwd =  $this->input->post('pwd');
	$u_uid=	$this->session->userdata('user_id');
	$res = $this->db->query('UPDATE tbl_usec SET pwd =  "'.$pwd.'" WHERE id =  "'.$u_uid.'"');
	
	if($res==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	
	}		
	return $res ? 1 : 0;
	}	

	
public function changepwd_ad($id)
	{
	$pwd =  $this->input->post('pwd');
	//$u_uid=	$this->session->userdata('user_id');
	$res = $this->db->query('UPDATE tbl_usec SET pwd =  "'.md5($pwd).'" WHERE id =  "'.$id.'"');
	
	if($res==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	}		
	return $res ? 1 : 0;
	}	
	
	
	
	public function quick_cash()
	{
	
	$u_uid=	$this->session->userdata('user_id');
	$userid =  $this->input->post('userid');
	$acount_no =  $this->input->post('acount_no');
	$amt =  $this->input->post('amount');
	$tx_no = $this->M_general_model->next_tx_no();
$res=0;	
	
	if($u_uid != $userid) {
		$this->session->set_flashdata('failed','You Have Hacked System .');
		return 0;
		exit();
	} 
	
	$get_bal = $this->db->query('SELECT amountl FROM tbl_loansc WHERE userIdl = "'.$userid.'" AND to_accnol = "'.$acount_no.'" and statusl="PENDING" ');
			

		if ($get_bal->num_rows() ==1) 
		{
		$balance =$get_bal->row()->amountl;
		$toatal=$balance+$amt;
		$desc = sprintf("Loan Request of $%u to Account %u Reference# %s", $toatal, $acount_no, $tx_no);
		
		$res = $this->db->query('UPDATE tbl_loansc SET amountl = "'.$toatal.'" ,descriptionl = "'.$desc.'"  WHERE userIdl = "'.$userid.'" AND to_accnol = "'.$acount_no.'"');
		
		$this->session->set_flashdata('success','Loan Request made successful');
	
	
	}
	
	else{
		
		$desc = sprintf("Loan Request of $%u to Account %u Reference# %s", $amt, $acount_no, $tx_no);
		
		
		$dataudp3 = 
			array(
				
				'tx_typel'  =>'loan',
				'amountl' => $amt,
				'userIdl' => $userid,
				'descriptionl'  => $desc,
				'tx_nol' => $tx_no,
				'datel'  => date('Y-m-d H:i:s'),
				'to_accnol'  => $acount_no,
				'statusl'  => 'PENDING',
				'tdatel'  => date('Y-m-d H:i:s'),
				'commentsl'  => 'WANTS A LOAN'
				
			);
				
				
	$res = $this->db->insert("tbl_loansc", $dataudp3);
	
	if($res==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	}
		
	}
	
			
	return $res ? 1 : 0;
	}

	
	
	
	
	public function quick_cash_ad($id)
	{
	
	$u_uid=	$id;
	$userid =  $this->input->post('userid');
	$acount_no =  $this->input->post('acount_no');
	$amt =  $this->input->post('amount');
	$tx_no = $this->M_general_model->next_tx_no();
$res=0;	
	
	if($u_uid != $userid) {
		$this->session->set_flashdata('failed','You Have Hacked System .');
		return 0;
		exit();
	} 
	
	$get_bal = $this->db->query('SELECT amountl FROM tbl_loansc WHERE userIdl = "'.$userid.'" AND to_accnol = "'.$acount_no.'" and statusl="PENDING" ');
			

		if ($get_bal->num_rows() ==1) 
		{
		$balance =$get_bal->row()->amountl;
		$toatal=$balance+$amt;
		$desc = sprintf("Loan Request of $%u to Account %u Reference# %s", $toatal, $acount_no, $tx_no);
		
		$res = $this->db->query('UPDATE tbl_loansc SET amountl = "'.$toatal.'" ,descriptionl = "'.$desc.'"  WHERE userIdl = "'.$userid.'" AND to_accnol = "'.$acount_no.'"');
		
		$this->session->set_flashdata('success','Loan Request made successful');
	
	
	}
	
	else{
		
		$desc = sprintf("Loan Request of $%u to Account %u Reference# %s", $amt, $acount_no, $tx_no);
		
		
		$dataudp3 = 
			array(
				
				'tx_typel'  =>'loan',
				'amountl' => $amt,
				'userIdl' => $userid,
				'descriptionl'  => $desc,
				'tx_nol' => $tx_no,
				'datel'  => date('Y-m-d H:i:s'),
				'to_accnol'  => $acount_no,
				'statusl'  => 'PENDING',
				'tdatel'  => date('Y-m-d H:i:s'),
				'commentsl'  => 'WANTS A LOAN'
				
			);
				
				
	$res = $this->db->insert("tbl_loansc", $dataudp3);
	
	if($res==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	}
		
	}
	
			
	return $res ? 1 : 0;
	}

	
		public function make_transfer_ad($id)
	{
	
	
	$uerids =$id;
	$result=$this->M_main_configurations->get_user_details($uerids);
	//$acc_no=$result->acc_no;
	
	
	
	$acc_no 	= $this->input->post('accno');
	$sacc_no 	= $this->input->post('saccno');
	$rbname 	= $this->input->post('rbname');
	$rname	 	= $this->input->post('rname');
	$swift	 	= $this->input->post('swift');
	$amt	 	= $this->input->post('amt');
	$comments	= $this->input->post('desc');
	$date_of 	= $this->input->post('dot');
	$toption 	= $this->input->post('toption');
	
	
	$funds_data = array(
		'acc_no' 	=> $acc_no, 
		'sacc_no' 	=> $sacc_no,
		'rbname' 	=> $rbname, 
		'rname' 	=> $rname, 
		'swift' 	=> $swift, 
		'amt' 		=> $amt,
		'comments' 	=> $comments,
		'date_of' 	=> $date_of,
		'toption' 	=> $toption,
	);
	
	
	
	$get_bal = $this->db->query('SELECT * FROM tbl_accountsc WHERE acc_no = "'.$sacc_no.'" AND user_id = "'.$uerids.'"');
			

		if ($get_bal->row()->status=='INACTIVE') 
		{
		
			$this->session->set_flashdata('failed','This account is either not active for fund Transfer/Suspended or Dormant. Pls contact Customer Care for details.');

		//redirect('Customer/changerm/ft');
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/ft',"refresh");
		return $res ? 1 : 0;
			exit();
		
		}
	
	
	//now setting the temp array into session so we can use it later...
	//$_SESSION['funds_data'] = $funds_data;
	$this->session->set_userdata($funds_data);
	//generate and send token
	$token = rand(100000, 9999999);
	$token = strlen($token) != 6 ? substr($token, 0, 6) : $token;
	$this->session->set_userdata('otp_token', $token);
	//$_SESSION['otp_token'] = $token;

	//email it now.	
	$subject = "Transaction Authorization Code";
	//$to = $_SESSION['hlbank_user']['email'];
	$to=$result->email;
	//$mail_data = array('to' => $to, 'sub' => $subject, 'msg' => 'otp', 'token' => $token);
	//send_email($mail_data);
	
	
$this->email->from('bamwinealbert@gmail.com', 'Bamwine Profit');
$this->email->to('bamwinealbert@gmail.com');
$this->email->subject($subject);
$this->email->message($token);

$this->email->send();
	
	//redirect('Customer/changerm/tk');
	redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/tk');
	//header('Location: index.php?v=Token');
	exit();
	
	
		}
		
	
	
		
function transferFunds_ad($id) 
{
	$token =  $this->input->post('token');
	$s_token = $this->session->userdata('otp_token');
	
	$toption;
	$sacc_no;
	$racc_no ;
	$amt;
	if($s_token == $token) {
		//extract($_SESSION['funds_data']);
		$toption     =$this->session->userdata('toption');
		$sacc_no     =$this->session->userdata('sacc_no');
		$racc_no     =$this->session->userdata('acc_no');
		$amt		=$this->session->userdata('amt');
	}
	else {
		$this->session->set_flashdata('failed','Transaction Authorization Code in not valid.');
		//redirect('Customer/changerm/ft');
		
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/ft');
		exit();
	}
	
	//next transaction number
	$tx_no = $this->M_general_model->next_tx_no();	
	
	//check if lets a Local transfer
	if($toption != "LT") {
		//debit from sender,
		//update transaction table,
		//send email and show details to user.
		
		$s_result = $this->db->query('SELECT acc_no, user_id, balance FROM tbl_accountsc WHERE acc_no =  "'.$sacc_no.'"');
			

		$s_bal 		= $s_result->row()->balance; 
		$s_uid 		= $s_result->row()->user_id;
		$s_accno 	= $s_result->row()->acc_no;
		$d_total 	= ($s_bal - $amt-($this->M_general_model->taxtion($amt)));
		if($s_bal < $amt) {
			
			$this->session->set_flashdata('failed','You do not have enough balance to proceed with this transfer.');
			//redirect('Customer/changerm/ft');
			redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/ft');
			exit();	
		}
		//update sender's account balance
		$sql_sacc = $this->db->query('UPDATE tbl_accounts SET balance = "'.$d_total.'" WHERE user_id = "'.$s_uid.'" AND acc_no = "'.$s_accno.'"');
		
		$desc = sprintf("Fund transfer of $%u to Account %u Reference# %s", $amt, $racc_no, $tx_no);
		//$sql = "INSERT INTO tbl_transaction (tx_no, tx_type, amount, date, description, to_accno, status, tdate, comments) 
			//	VALUES ('$tx_no', 'debit', $amt, NOW(), '$desc', '$sacc_no', 'SUCCESS', '$date_of', '$comments')";
				
				$dataudp = 
			array(
				
				'tx_type'  =>'debit',
				'amount' => $amt,
				'description'  => $desc,
				'tx_no' => $tx_no,
				'date'  => date('Y-m-d H:i:s'),
				'to_accno'  => $sacc_no,
				'status'  => 'SUCCESS',
				'tdate'  => $this->session->userdata('date_of'),
				'comments'  => $this->session->userdata('comments')
				
			);
				
				
				$res = $this->db->insert("tbl_transactionc", $dataudp);
				
		//	funds_transfer_mail($amt, $sacc_no);
		//$_SESSION['funds_data']['tx_no'] = $tx_no;
		//header('Location: index.php?v=IntFund');
		$this->session->set_flashdata('success','Transaction Made Successfully ');
		//redirect('Customer/changerm/ft');
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/ft');
		return $res ? 1 : 0;
		exit();
	}
	
	//1) check receivers account is valid, or not.
	
	$res1 = $this->db->query('SELECT acc_no, user_id, balance FROM tbl_accountsc WHERE acc_no = "'.$racc_no.'" AND status = "ACTIVE"');
	if ($res1->num_rows()== 1) {
		
		//2) Now check if senders balance is available or not..
		
		$s_sql = $this->db->query('SELECT acc_no, user_id, balance FROM tbl_accountsc WHERE acc_no = "'.$sacc_no.'"');
		//check if senders balance is not enough
		$s_bal 	= $s_sql->row()->balance; 
		if($s_bal < $amt) {
			$this->session->set_flashdata('failed','You do not have enough balance to proceed with this transfer.');

		//redirect('Customer/changerm/ft');
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/ft');
			
		}
		//3) credit in reveice's account and add transaction entry.
		$r_bal 	= $res1->row()->balance;
		$r_uid 	= $res1->row()->user_id;
		$r_accno = $res1->row()->acc_no;
		$total = ($r_bal + $amt-($this->M_general_model->taxtion($amt)));
		
		
		$sql_sacc = $this->db->query('UPDATE tbl_accountsc SET balance = "'.$total.'" WHERE user_id = "'.$r_uid.'" AND acc_no = "'.$r_accno.'"');
		
		$desc = sprintf("Fund transfer of $%u from Account %u Reference# %s", $amt, $sacc_no, $tx_no);
		//$sql = "INSERT INTO tbl_transaction (tx_no, tx_type, amount, date, description, to_accno, status, tdate, comments) 
			//	VALUES ('$tx_no', 'credit', $amt, NOW(), '$desc', '$r_accno', 'SUCCESS', '$date_of', '$comments')";
		
		
		
		$dataudp2 = 
			array(
				
				'tx_type'  =>'credit',
				'amount' => $amt,
				'description'  => $desc,
				'tx_no' => $tx_no,
				'date'  => date('Y-m-d H:i:s'),
				'to_accno'  => $sacc_no,
				'status'  => 'SUCCESS',
				'tdate'  => $this->session->userdata('date_of'),
				'comments'  => $this->session->userdata('comments')
				
			);
				
				
				$res = $this->db->insert("tbl_transactionc", $dataudp2);
		if($res==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	}	
		
		//4) debit from sender's account add transaction entry
		$s_uid 	= $s_sql->row()->user_id;
		$s_accno = $s_sql->row()->acc_no;
		$d_total = ($s_bal - $amt-($this->M_general_model->taxtion($amt)));
		
		
		$sql_sacc = "";
		
$sql_sacc1 = $this->db->query('UPDATE tbl_accountsc SET balance = "'.$d_total.'" WHERE user_id = "'.$s_uid.'" AND acc_no = "'.$s_accno.'"');
		//debit from sender's account and insert a log, send email
		$desc = sprintf("Fund transfer of $%u to Account %u Reference# %s", $amt, $r_accno, $tx_no);
		$sender_sql = "INSERT INTO tbl_transactionc (tx_no, tx_type, amount, date, description, to_accno, status, tdate, comments) 
				VALUES ('$tx_no', 'debit', $amt, NOW(), '$desc', '$s_accno', 'SUCCESS', '$date_of', '$comments')";
				
		
		
		$dataudp3 = 
			array(
				
				'tx_type'  =>'debit',
				'amount' => $amt,
				'description'  => $desc,
				'tx_no' => $tx_no,
				'date'  => date('Y-m-d H:i:s'),
				'to_accno'  => $s_accno,
				'status'  => 'SUCCESS',
				'tdate'  => $this->session->userdata('date_of'),
				'comments'  => $this->session->userdata('comments')
				
			);
				
				
				$resd = $this->db->insert("tbl_transactionc", $dataudp3);
		
	
		
		//email details...
		if($resd==1){
	
	//$this->session->set_flashdata('failed','You Have Hacked System .');
	
	//send email here
	}	
		$this->session->set_flashdata('success','Fund transfer successful');
		//redirect('Customer/changerm/ft');
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/ft');
		exit();
	}
	else {
		$this->session->set_flashdata('failed','Receivers account number does not exist or not active. Please contact to custmer care.');

		//redirect('Customer/changerm/ft');
		redirect('Dashboard/user_errors/'.h_encrypt_decrypt($id).'/ft');
		exit();	
	}
}



public function user_accounts($acc_no,$id)
	{
	$res = $this->db->query('SELECT * FROM tbl_userc_accts WHERE user_acct = "'.$acc_no.'" and user_id = "'.$id.'" ORDER BY id DESC LIMIT 20 ');
			
	return $res->num_rows() > 0 ? $res : 0;
	}
	


public function update_sign($id,$signs)
	{
	$res = $this->db->query('UPDATE tbl_usec SET signature =  "'.$signs.'" WHERE id = "'.$id.'"');
			
	return $res ? 1 : 0;
	}
	
	
	
}
