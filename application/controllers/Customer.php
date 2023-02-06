<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

public function __construct()
	{
		parent::__construct();

		$this->M_main_configurations->if_logged_in();
		$this->load->model("Customer_model");
		$this->load->model("M_general_model");


	}

	public function index()
	{
	$data['view_div'] = "dsb"; 
	$data['view_page'] = "customer";
	$data['usernames']=	$this->session->userdata('username');
	$data['user_ids']=	$this->session->userdata('user_id');
	$uerids =	$this->session->userdata('user_id');	
	$data['userdetails']=$this->M_main_configurations->get_user_details($uerids);
	$data['userbalinqure']=$this->M_main_configurations->get_user_bal_inquire($uerids);
	
	$resultd=$this->M_main_configurations->get_user_details($uerids);
	$acc_no=$resultd->acc_no;
	//$result = $this->Customer_model->print_stamt($acc_no);
	$data['tranaction'] = $this->Customer_model->print_stamt($acc_no);
	$this->M_main_configurations->user_render_view($data);
	}
	
	
	public function changerm($view_div='adt')
	{
	if (!$view_div) 
		{
			show_404();
			return;
		}
		
		
	//$data['usernames']=	$this->session->userdata('username');
	$data['user_ids']=	$this->session->userdata('user_id');
	$data['view_div'] = $view_div;
	
	$uerids =	$this->session->userdata('user_id');	
	$result=$this->M_main_configurations->get_user_details($uerids);
	$data['userdetails']=$this->M_main_configurations->get_user_details($uerids);
	$data['userbalinqure']=$this->M_main_configurations->get_user_bal_inquire($uerids);
	$data['flnames'] = $result->fname."  ".$result->lname;
	$data['ufname'] = $result->fname;
	$data['ulname'] = $result->lname;
	$data['uemail'] = $result->email;
	$data['uphone'] = $result->phone;
	$data['uaddress'] = $result->address;
	$data['ucity'] = $result->city;
	$data['ustate'] = $result->state;
	$data['uzipcode'] = $result->zipcode;
	$data['ucountry'] = $result->country;
	$data['uacc_no'] = $result->acc_no;
	$data['ubalance'] = $result->balance;
	
	//if($result->gender == "M"){$gender = "MALE";}
	//else if($result->gender == "F") {$gender = "FEMALE";}
	
	$gender = ($result->gender) =='M' ? 'MALE' : 'FEMALE';
	$data['ubdate'] = $result->bdate;
	$data['ugender'] = $gender;
	
	if($result->type == "CA"){$atype = "Checking Account";}
else if($result->type == "SA") {$atype = "Saving Account";}
else if($result->type == "FDA") {$atype = "Fixed deposit Account";}
$data['utype'] = $atype;

//$uerids =	$this->session->userdata('user_id');	
	$resultd=$this->M_main_configurations->get_user_details($uerids);
	$acc_no=$resultd->acc_no;
	//$result = $this->Customer_model->print_stamt($acc_no);
	$data['tranaction'] = $this->Customer_model->print_stamt($acc_no);	
	
	$data['view_page'] = "customer";
	$this->M_main_configurations->user_render_view($data);
	
	}
	
	
	public function transaction()
	{
	
		$this->form_validation->set_rules('type',' Transction Type.','trim|required');
		$this->form_validation->set_rules('desc','Description ','trim|required|min_length[9]');
		$this->form_validation->set_rules('amt','Amount','trim|required|numeric');		
		
		
		$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$data['view_div'] = "withd";
			$data['view_page'] = "customer";
			$uerids =	$this->session->userdata('user_id');
	
			$data['userdetails']=$this->M_main_configurations->get_user_details($uerids);
			$this->M_main_configurations->user_render_view($data);
			//redirect('Customer/changerm/wd');
			return;
		}
	
	
		$saved = $this->Customer_model->make_transction();
	if ($saved) 
		{

			$this->session->set_flashdata('success','Transaction Made Successfully ');
			//$data['view_div'] = "withd";
			//$this->M_main_configurations->user_render_view($data);
			$this->index();
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Transaction Failed');
				//$data['view_div'] = "withd";
				//$this->M_main_configurations->user_render_view($data);
				
				$this->index();
			return;
		}

	}
	

	
	
	
	public function Transfer(){
	
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
			
			
			return;
		}
	
		
		
	$saved = $this->Customer_model->make_transfer();
	if ($saved) 
		{

			$this->session->set_flashdata('success','Transaction Made Successfully ');
			//$data['view_div'] = "withd";
			//$this->M_main_configurations->user_render_view($data);
			$this->index();
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Transaction Failed');
				//$data['view_div'] = "withd";
				//$this->M_main_configurations->user_render_view($data);
				
				$this->index();
			return;
		}
		
		
	
	}
	
	
public function	Transferfud(){
$this->form_validation->set_rules('token','token','trim|required');

$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}



$saved = $this->Customer_model->transferFunds();
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



public function	changepwd(){
$this->form_validation->set_rules('pwd','password','trim|required|min_length[8]');
$this->form_validation->set_rules('cpwd','password','trim|required|matches[pwd]');
$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}



$saved = $this->Customer_model->changepwd();
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','Password change Made Successfully ');
			
			$this->index();
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Password change Failed');
								
				$this->index();
			return;
		}
		
}



public function	changepin(){
$this->form_validation->set_rules('pin','token','trim|required|min_length[5]|numeric');
$this->form_validation->set_rules('cpin','token','trim|required|matches[pin]|numeric');

$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}


$saved = $this->Customer_model->changepin();
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','PIN Change Made Successfully ');			
			$this->index();
			
			redirect('Customer/changerm/actste',"refresh");
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','PIN Change Failed');
						
				$this->index();
			return;
		}
		
}




public function	Quickloan(){
$this->form_validation->set_rules('acount_no','Account no','trim|required');
$this->form_validation->set_rules('amount','Amount','trim|required|numeric');

$this->form_validation->set_message('matches','{field} Don\'t Match');

		if ($this->form_validation->run() == false) 
		{
			$this->index();
			
			
			return;
		}


$saved = $this->Customer_model->quick_cash();
	if ($saved) 
		{
		
			$this->session->set_flashdata('success','Request made Successfully ');			
			$this->index();
//exit();
			
			redirect('Customer/changerm/qkc',"refresh");
			return;
		}
		else
		{
			$this->session->set_flashdata('failed','Request   Failed');
						
			redirect('Customer/changerm/qkc',"refresh");

			return;
		}
		
}



	
}
