<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

public function __construct()
	{
		parent::__construct();

		$this->M_main_configurations->if_logged_in_adms();
		$this->load->model("Admin_model");
		$this->load->model("M_general_model");
		$this->load->model("Customer_model");
		


	}
	public function index()
	{
	
	$data['view_page'] = "dot/home";
	$data['view_div'] = "lonp";
	
	$data['userlist'] = $this->Admin_model->get_userlist();
	$data['accounlist'] = $this->Admin_model->get_accountlist();
	$data['loanlistp'] = $this->Admin_model->get_all_loanspend();
	$data['loanlistf'] = $this->Admin_model->get_all_loansfind();
	$data['loanlistran'] = $this->Admin_model->get_all_loans_trans();
	$data['nav_file']='include/super';
	$data['user_accts'] = $this->Admin_model->get_user_accts();
	
	$data['usernames']=	$this->session->userdata('username');
	$data['user_ids']=	$this->session->userdata('user_id');
	$data['type']= $this->session->userdata('utype');
	
	$data['userlist'] = $this->Admin_model->get_userlist();
	$data['accounlist'] = $this->Admin_model->get_accountlist();
	$this->M_main_configurations->user_render_admin($data);
	}
	
	
	
	
		public function changerm($view_div='dash')
	{
	if (!$view_div) 
		{
			show_404();
			return;
		}
		
	$data['userlist'] = $this->Admin_model->get_userlist();
	$data['accounlist'] = $this->Admin_model->get_accountlist();
	$data['loanlistp'] = $this->Admin_model->get_all_loanspend();
	$data['loanlistf'] = $this->Admin_model->get_all_loansfind();
	$data['loanlistran'] = $this->Admin_model->get_all_loans_trans();
	$data['user_accts'] = $this->Admin_model->get_user_accts();
	
	//$loan_no=$data['loanlistran']->id;
	$data['usernames']=	$this->session->userdata('username');
	$data['user_ids']=	$this->session->userdata('user_id');
	$data['type']= $this->session->userdata('utype');
	$data['nav_file']='include/super';
	$data['view_page'] = "dot/home";
	$data['view_div'] = $view_div;
	$this->M_main_configurations->user_render_admin($data);
	
	}
	
	
	public function delusers($id_enc = false)
	{
	
		
		if (!$id_enc) 
		{
			show_404();
			return;
		}
		
		$userid = h_encrypt_decrypt($id_enc,'decrypt');
		
	$del = $this->Admin_model->deluser($userid);	
		
	if ($del) 
		{
			$this->session->set_flashdata('success','User  Deletion was Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','User Deletion Failed');
		}

		redirect('Admins/changerm/use');	
		
	}
	
	public function changeUserStatus()
	{
		$this->form_validation->set_rules('sta_type','Status','trim|required');		
		
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
			redirect('Admins/changerm/use');
			return;
		}
		
		$del = $this->Admin_model->changeUserStatus();
		if($del){
			$this->session->set_flashdata('success','User  Status change was Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','User Status change Failed');
		}
		redirect('Admins/changerm/use');
	}

	
	
	
	
	
	
	public function changeAccStatus()
	{
		$this->form_validation->set_rules('sta_type','Status','trim|required');		
		
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
			redirect('Admins/changerm/acclt');
			return;
		}
		
		$del = $this->Admin_model->changeAccStatus();
		if($del){
			$this->session->set_flashdata('success','Account  Status change was Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','Account Status change Failed');
		}
		
		redirect('Admins/changerm/acclt');
		
	}
	
	public function changeLoanStatus()
	{
		$this->form_validation->set_rules('sta_type','Status','trim|required');		
		
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
			redirect('Admins/changerm/lonp');
			return;
		}
		
		$del = $this->Admin_model->changeLoanStatus();
		if($del){
			$this->session->set_flashdata('success','Money  Transfer  was Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','Money  Transfer  Failed');
		}
		
		redirect('Admins/changerm/lonp');
		
	}
	
	
	
	public function changeUserEmail()
	{
		$this->form_validation->set_rules('email','email','trim|required');		
		
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
			redirect('Admins/changerm/use');
			return;
		}
		
		$del = $this->Admin_model->changeUserEmail();
		if($del){
			$this->session->set_flashdata('success','User  Email change was Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','User Email change Failed');
		}
		redirect('Admins/changerm/use');
	}

	
	
		public function user_errors2($id_enc,$view_div)
	{
	if (!$id_enc) 
		{
			show_404();
			return;
		}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
		
	$data['loanpaids'] = $this->Admin_model->get_all_loans_paid($id);
	$data['view_page'] = "dot/home";
	$data['nav_file']='include/super';
	$data['view_div'] = $view_div;
	$this->M_main_configurations->user_render_admin($data);
	}
	
		public function user_errors3($id_enc,$view_div)
	{
	if (!$id_enc) 
		{
			show_404();
			return;
		}

	$id = h_encrypt_decrypt($id_enc,'decrypt');
	$data['view_page'] = "dot/home";
	$data['view_div'] = $view_div;
	$data['nav_file']='include/super';
	$data['cont_details']=$this->Admin_model->get_contract_deta($id);
	//$data['id_enc'] = $id_enc;
	$this->M_main_configurations->user_render_admin($data);
	}
	
	
		public function user_errors($id_enc,$view_div)
	{
	if (!$id_enc) 
		{
			show_404();
			return;
		} else{ $data['nav_file'] = "dot/user/user_nav"; }

	$id = h_encrypt_decrypt($id_enc,'decrypt');
		
	$data['loanpaids'] = $this->Admin_model->get_all_loans_paid($id);
		
	$data['view_page'] = "dot/home";
	$data['view_div'] = $view_div;
	
	$data['userdetails']=$this->M_main_configurations->get_user_details($id);
	$data['userbalinqure']=$this->M_main_configurations->get_user_bal_inquire($id);
	$data['hasloan']=$this->Admin_model->get_user_hasloan($id);
	
	$acc_no=$data['userdetails']->acc_no;
	$data['tranaction'] = $this->Customer_model->print_stamt($acc_no);	
	
	$data['user_bank'] = $this->Customer_model->user_accounts($acc_no,$id);
	$data['cont_details']=$this->Admin_model->get_contract_deta($id);
	
	if (!$data['userdetails']) 
		{
			show_404();
			return;
		}
		
		if (!$data['userbalinqure']) 
		{
			show_404();
			return;
		}

if (!$data['hasloan']) 
		{
			show_404();
			return;
		}
		
	$data['id_enc'] = $id_enc;
	$data['nav_file']='include/super';
	$this->M_main_configurations->user_render_admin($data);
	
	}
	
	
	public function	changepin($id_enc){
		
		if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	$data['userdetails']=$this->M_main_configurations->get_user_details($id);
$this->form_validation->set_rules('pin','token','trim|required|min_length[5]|numeric');
$this->form_validation->set_rules('cpin','token','trim|required|matches[pin]|numeric');

$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}


$saved = $this->Customer_model->changepin_ad($id);
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','PIN Change Made Successfully ');			
			
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/uset',"refresh");
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','PIN Change Failed');
						
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/uset',"refresh");
			return;
		}
		
}

public function	changepwd($id_enc){
	
	if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	$data['userdetails']=$this->M_main_configurations->get_user_details($id);
$this->form_validation->set_rules('pwd','password','trim|required|min_length[8]');
$this->form_validation->set_rules('cpwd','password','trim|required|matches[pwd]');
$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}



$saved = $this->Customer_model->changepwd_ad($id);
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','Password change Made Successfully ');
			
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/uset',"refresh");
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Password change Failed');
								
				redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/uset',"refresh");
			return;
		}
		
}
	
	
	

public function	Quickloan($id_enc){
	if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	$data['userdetails']=$this->M_main_configurations->get_user_details($id);
	
$this->form_validation->set_rules('acount_no','Account no','trim|required');
$this->form_validation->set_rules('amount','Amount','trim|required|numeric');

$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}


$saved = $this->Customer_model->quick_cash_ad($id);
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','Request made Successfully ');			
			$this->index();
	
			
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/qkc',"refresh");
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Request   Failed');
						
				redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/qkc',"refresh");
			return;
		}
		
}



	public function Transfer($id_enc){
	
		if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	$data['userdetails']=$this->M_main_configurations->get_user_details($id);
	
		$this->form_validation->set_rules('rbname','Receiver s Bank Name','trim|required|min_length[8]');
		$this->form_validation->set_rules('rname','Receiver s Name','trim|required|min_length[8]');
		$this->form_validation->set_rules('accno','Account Number','trim|required|min_length[10]|numeric|max_length[10]');
		$this->form_validation->set_rules('swift',' SWIFT/ABA Routing Number','trim|required|min_length[8]|numeric|max_length[12]');
		$this->form_validation->set_rules('saccno','Account Number','trim|required|min_length[10]|numeric');
		$this->form_validation->set_rules('amt','Ammount','trim|required|numeric');
		$this->form_validation->set_rules('dot','Date of Transfer','trim|required');
		$this->form_validation->set_rules('toption','fund transfer','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required|min_length[10]');		
	
	
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			//redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/ft');
			return;
		}
	
		
		
	$saved = $this->Customer_model->make_transfer_ad($id);
	if ($saved) 
		{

			$this->session->set_flashdata('success','Transaction Made Successfully ');
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/ft',"refresh");
			//$this->index();
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Transaction Failed');
				
				redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/ft',"refresh");
				//$this->index();
			return;
		}
		
		
	
	}	
	
	
	
		public function transaction($id_enc)
	{
	
	if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	
		$this->form_validation->set_rules('type',' Transction Type.','trim|required');
		$this->form_validation->set_rules('desc','Description ','trim|required|min_length[9]');
		$this->form_validation->set_rules('amt','Amount','trim|required|numeric');		
		
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
				redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/wd');
			return;
		}
	
	
		$saved = $this->Customer_model->make_transction($id);
	if ($saved) 
		{

			$this->session->set_flashdata('success','Transaction Made Successfully ');
			
			//$this->index();
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/wd',"refresh");
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Transaction Failed');
				
				
				$this->index();
			return;
		}

	}
	
	
public function	Transferfud_ad($id_enc){
	
	if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	
$this->form_validation->set_rules('token','token','trim|required');

$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}



$saved = $this->Customer_model->transferFunds_ad($id);
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','Transaction Made Successfully ');
			
			$this->index();
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Transaction Failed');
				
				
				$this->index();
			return;
		}
		
}
	
	
	
public function addUserBanks($id_enc)
	{
		
		if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	
		
		$this->form_validation->set_rules('bank_nam','bank name','trim|required');		
		$this->form_validation->set_rules('bank_acct','bank Account','trim|required|numeric');
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
		redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/bd',"refresh");
			return;
		}
		
		$del = $this->Admin_model->addUserBanks();
		if($del){
			$this->session->set_flashdata('success','Account  Addition Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','Account  Addition Failed');
		}
		
		redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/bd',"refresh");
		
	}	
	
		public function changeUserBankStatus()
	{
		$this->form_validation->set_rules('accn','Account No','trim|required|numeric');		
		
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
			redirect('Admins/changerm/acclt');
			return;
		}
		
		$del = $this->Admin_model->changeUserBankStatus();
		if($del){
			$this->session->set_flashdata('success','Account  Status change was Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','Account Status change Failed');
		}
		
		redirect('Admins/changerm/acclt');
		
	}
	
	
		public function contra()
	{
		
		
	
		
		$this->form_validation->set_rules('accn','Account No','trim|required|numeric');		
		$this->form_validation->set_rules('userid','','trim|required|numeric');	
		$this->form_validation->set_rules('rqmout','Amount','trim|required|numeric');	
		$this->form_validation->set_rules('rdate','','trim|required');	
		$this->form_validation->set_rules('apmout','Amount','trim|required|numeric');	
		$this->form_validation->set_rules('rate','rate','trim|required|numeric');	
		$this->form_validation->set_rules('apay','Amount','trim|required|numeric');	
		$this->form_validation->set_rules('sign','sign','trim|required');	
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
			redirect('Admins/changerm/appv',"refresh");
			return;
		}
		
		$del = $this->Admin_model->make_loan_t();
		if($del){
			$this->session->set_flashdata('success','Account  Status change was Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','Account Status change Failed');
		}
		
		redirect('Admins/changerm/appv',"refresh");
		
	}
	
	
public function update_sign($id_enc)
	{
		$lc1d_doc='./uploads/user.jpg';
		if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	
	if (!empty($_FILES['sign']['name']))
		{
			//upload files
			$path = './uploads/users/sign';
			//M_general_model is loaded globally
			$result=$this->M_general_model->do_upload($path,'sign');

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
	
	
	$saved = $this->Customer_model->update_sign($id,$lc1d_doc);
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','Signature Updated Successfully ');
			
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/sign',"refresh");
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Signature Update Failed');
								
				redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/sign',"refresh");
			return;
		}
	
	}	
	
	
			public function payloan($id_enc)
	{
		
		if (!$id_enc) 
		{
			show_404();
		return;}
	$id = h_encrypt_decrypt($id_enc,'decrypt');
	
		
		$this->form_validation->set_rules('uaccn','Account No','trim|required|numeric');		
		$this->form_validation->set_rules('userids','','trim|required|numeric');	
		$this->form_validation->set_rules('loan_amt','Amount','trim|required|numeric');	
		$this->form_validation->set_rules('dop','','required');	
		$this->form_validation->set_rules('pay_amt','Amount','trim|required|numeric');	
		$this->form_validation->set_rules('paymean','means','trim|required');	
		$this->form_validation->set_rules('loanid','','trim|required|numeric');	
		$this->form_validation->set_rules('paying_acc','Account','trim|required');	
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			
			
			redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/lad',"refresh");
			return;
		}
		
		$del = $this->Admin_model->make_loan_pays();
		if($del){
			$this->session->set_flashdata('success','Loan Updated   Successful');
		}
		else
		{
			$this->session->set_flashdata('failed','Loan Updated Failed');
		}
		
		redirect('Admins/user_errors/'.h_encrypt_decrypt($id).'/lad',"refresh");
		
	}
	
	
}
