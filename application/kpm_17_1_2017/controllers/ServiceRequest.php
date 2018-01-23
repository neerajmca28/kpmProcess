<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceRequest extends CI_Controller {

	public function index()
	{
		$result['query']=$this->ServiceRequestModel->get_account_creation();
		$this->load->view('include/header');
		$this->load->view('include/headerMenu');
		$this->load->view('include/leftMenu');
		$this->load->view('servicerequest/list_device_change',$result);
		$this->load->view('include/footer');
	}
	
	public function NewAccountCreation()
	{

		$this->load->view('include/header');
		$this->load->view('include/headerMenu');
		$this->load->view('include/leftMenu');

		$data = array();

	    $querySalesManager = $this->ServiceRequestModel->getAllSalesManager();
	    if ($querySalesManager)
	    {
	        $data['SalesManager'] = $querySalesManager;

	    }

	    $queryVehicleType = $this->ServiceRequestModel->getVehicleType();
	    if ($queryVehicleType)
	    {
	        $data['VehicleType'] = $queryVehicleType;

	    }

	    $this->load->view('servicerequest/new_account_creation',$data);

		$this->load->view('include/footer');
	}
	public function AccountCreation()
	{
		$this->load->view('include/header');
		$this->load->view('include/headerMenu');
		//$this->load->view('include/leftMenu');

		$date=date("Y-m-d H:i:s");
		$account_manager = $this->session->userdata('username');
		$company = $this->input->post('company');
	    $potential = $this->input->post('potential');
	    $contact_person = $this->input->post('contact_person');
	    $contact_number = $this->input->post('contact_number');
	    $billing_name = $this->input->post('billing_name');
	    $billing_address = $this->input->post('billing_address');
	    $type_of_org = $this->input->post('type_of_org');
	    $pan_no = $this->input->post('pan_no');
	    $mode_of_payment = $this->input->post('mode_of_payment');

	    $dimts = $this->input->post('dimts');

	    if($mode_of_payment=="Cash")
	    {
	        $device_price_total = $this->input->post('device_price_total1');
	        $TxtDTotalREnt = $this->input->post('TxtDTotalREnt1');
	        $rent_month = $this->input->post('rent_month');
	   	}
	    else if($mode_of_payment=="Cheque")
	    {
	        $device_price = $this->input->post('device_price');
	        $device_price_vat = $this->input->post('device_price_vat');
	        $device_price_total = $this->input->post('device_price_total');
	        $device_rent_Price = $this->input->post('device_rent_Price');
	        $device_rent_service_tax = $this->input->post('device_rent_service_tax');
	        $TxtDTotalREnt = $this->input->post('TxtDTotalREnt');
	        $rent_month = $this->input->post('rent_month1');
	   
	    }
	    else if($mode_of_payment=="Demo")
	    {
	        $demo = $this->input->post('mode_of_payment');
	    }
	    else if($mode_of_payment=="Lease")
	    {
	        $device_price_total = $this->input->post('device_amount_total');
	    }
	   
		    $vehicle_type = $this->input->post('vehicle_type');
		    $account_type = $this->input->post('account_type');
		    $immobilizer = $this->input->post('immobilizer');
		    $ac_on_off = $this->input->post('ac_on_off');
		    $email_id = $this->input->post('email_id');
		    $user_name = $this->input->post('user_name');
		    $user_password = $this->input->post('user_password');
		    $service_comment = $this->input->post('service_comment');
		    $new_acc_salescomment = $this->input->post('new_acc_salescomment');
	 	    $rent_status = $this->input->post('rent_status');
	    	$dimts_fee = $this->input->post('dimts_fee');


		$data = array(
            'date'                      =>  $date,
            'account_manager'           =>  $account_manager,
            'company'                   =>  $company,
            'potential'                 =>  $potential,    
            'contact_person'            =>  $contact_person,
            'contact_number'            =>  $contact_number,
            'billing_name'              =>  $billing_name,
            'billing_address'           =>  $billing_address,
            'type_of_org'               =>  $type_of_org,
            'pan_no'                    =>  $pan_no,
            'demo_time'                 =>  $demo,
            'device_price'              =>  $device_price,
            'device_price_vat'          =>  $device_price_vat,
            'device_price_total'        =>  $device_price_total,
            'device_rent_Price'         =>  $device_rent_Price,
            'device_rent_service_tax'   =>  $device_rent_service_tax,
            'DTotalREnt'                =>  $TxtDTotalREnt,
            'mode_of_payment'           =>  $mode_of_payment,
            'vehicle_type'              =>  $vehicle_type,
            'immobilizer'               =>  $immobilizer,
            'ac_on_off'                 =>  $ac_on_off,
            'account_type'              =>  $account_type,
            'email_id'                  =>  $email_id,
            'user_name'                 =>  $user_name,
            'user_password'             =>  $user_password,
            'sales_manager'             =>  $sales_manager,
            'dimts'                     =>  $dimts,
            'rent_status'               =>  $rent_status,
            'dimts_fee'                 =>  $dimts_fee,
            'rent_month'                =>  $rent_month,
            'new_acc_salescomment'      =>  $new_acc_salescomment,
            'branch_id'                 =>  $user_id
        );

		$s = $this->ServiceRequestModel->insertNewAccountCreation($data);

		echo $s;
	    
	    $this->load->view('servicerequest/new_account_creation',$data);

		$this->load->view('include/footer');
	}

}
