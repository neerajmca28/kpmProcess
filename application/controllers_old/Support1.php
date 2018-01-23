<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

 public function __construct()
  {
    parent::__construct();
    error_reporting(E_ALL & ~E_NOTICE);
  }
  public function index()
    {
        $userName = $this->session->userdata['user_name'];
        $parentId = $this->session->userdata['ParentId'];
       // $groupId = $this->session->userdata['support_group_id'];
        //  $userId = '77727';
        $groupId = '7781';

        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        $result['query']=$this->New_device_addition->get_dev_addition_list($groupId);
        $this->load->view('support/list_device_addition',$result);
        $this->load->view('include/footer');
    }

    public function Device_addition()
    {
        $userId = '77727';
        $groupId = '7781';

        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        $result['assign_device']=$this->New_device_addition->select_query_inventory();
        $result['destination']=$this->New_device_addition->select_query_live_con($userId);

        $this->load->view('support/deviceAddtionForm',$result);
        $this->load->view('include/footer');
        
    }

    
    public function form_NewDeviceAddition()
    {
        $groupId = '7781';
        $userId = '77727';
        // $this->load->view('include/header');
        // $this->load->view('include/headerMenu');
        // $this->load->view('include/leftMenu');
        // print_r($this->input->post()); die;
         $this->load->library('form_validation');
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // //Validating Mobile no. Field
         $this->form_validation->set_rules('date', 'Departure Date', 'required');
         $this->form_validation->set_rules('transport_name', 'Customer Name', 'required');
         $this->form_validation->set_rules('truck_no', 'Truck No', 'required');
         $this->form_validation->set_rules('device_imei', 'Device IMEI', 'required');
         $this->form_validation->set_rules('destination', 'Destination', 'required');
         $this->form_validation->set_rules('warehouse', 'Ware House', 'required');
         $this->form_validation->set_rules('transport_name', 'Transport Name', 'required');
         $this->form_validation->set_rules('transport_mob_no', 'Transport Mob No', 'required|regex_match[/^[0-9]{10}$/]');



        if ($this->form_validation->run() == FALSE)
        {
            $result['assign_device']=$this->New_device_addition->select_query_inventory();
            $result['destination']=$this->New_device_addition->select_query_live_con($userId);
             //$this->load->view('support/deviceAddtionForm',$result);
             $result['body'] = 'support/deviceAddtionForm';
            $this->load->view('template/base',$result);
        }
        else
        {
            //Setting values for tabel columns
            $data = array(
            'date' => $this->input->post('date'),
            'customer_name' => $this->input->post('customer_name'),
            'truck_no' => $this->input->post('truck_no'),
            'device_imei' => $this->input->post('device_imei'),
            'destination' => $this->input->post('destination'),
            'warehouse' => $this->input->post('warehouse'),
            'transport_name' => $this->input->post('transport_name'),
            'transport_mob_no' => $this->input->post('transport_mob_no'),
            'lr_number' => $this->input->post('lr_number'),
            'driver_mobile_no' => $this->input->post('driver_mobile_no'),
            'trip' => $this->input->post('trip'),
            'rate' => $this->input->post('rate')
            );
            //print_r($data); die;
            //Transfering data to Model
            $output=$this->SupportModel->new_device_additionclose($data);
            //print_r($output); die;
            if($output==1)
            {
                $result['assign_device']=$this->New_device_addition->select_query_inventory();
                $result['destination']=$this->New_device_addition->select_query_live_con($userId);
                $result['message'] = "IMEI Already Exist";
                //print_r($result); die;
                $result['body'] = 'support/deviceAddtionForm';
                $this->load->view('template/base',$result);
            }
            else if($output==2)
            {
                $result['assign_device']=$this->New_device_addition->select_query_inventory();
                $result['destination']=$this->New_device_addition->select_query_live_con($userId);
                $result['message'] = "SIM Already Exist";
                $result['body'] = 'support/deviceAddtionForm';
                $this->load->view('template/base',$result);
            }
            else if($output==3)
            {
                $result['assign_device']=$this->New_device_addition->select_query_inventory();
                $result['destination']=$this->New_device_addition->select_query_live_con($userId);
                $result['message'] = "Something Bad Happened";
                $result['body'] = 'support/deviceAddtionForm';
                $this->load->view('template/base',$result);
            }
            else if($output==4)
            {
                $result['message'] = 'Data Inserted Successfully';
                $result['query']=$this->New_device_addition->get_dev_addition_list($groupId);
                //redirect('support/index');
                $result['body'] = 'support/list_device_addition';
                $this->load->view('template/base',$result);
            }
            else{
                redirect('support/index');
                //$this->load->view('support/list_device_addition');
            }
         
            //$result['query']=$this->New_device_addition->get_dev_addition_list($groupId);
            //$this->load->view('support/list_device_addition',$result);
            //$this->load->view('support/list_device_addition');
                
        }
        

            //$this->load->view('include/footer');
        
    }

   public function edit()
    {
        $RecordId1 = $this->uri->segment(3);
        //print_r(explode("-",$RecordId));   2017-07-15 17:53:13    
        $tt=explode("-",$RecordId1);

        $RecordId=$tt[0];
        $datetoupdate=date('Y-m-d',$tt[1]); 
        $userId = '77727';
        $result['recordId'] = $tt[0];
       $result['datetoupdate'] =$tt[1];
       //echo $date=date('Y-m-d',strtotime($tt[1])); die;

        $result['id'] = $this->SupportModel->show_ServicesTable($result);

        if (empty($result['id']))
        {
            show_404();
        }

        elseif($result['id'])
        {
            $result['recordId'] = $RecordId1;
            $result['datetoupdate'] = $datetoupdate;
            $result['formEdit'] = false;
            $result['assign_device']=$this->New_device_addition->select_query_inventory();
            $result['destination']=$this->New_device_addition->select_query_live_con($userId);
            $result['body'] = 'support/deviceUpdationForm';
            $this->load->view('template/base',$result);
            
        }
        else
        {
            $result["id"] = [array("veh_reg" => "","thana_name" => "","veh_destination" => "","veh_driver_name" => "","veh_departuredate" => "","driver_contact_no" => "","veh_phone_number" => "","card_number" => "","veh_advance" => "")];
            $result['recordId'] = $RecordId1;
            $result['formEdit'] = true;
            $result['assign_device']=$this->New_device_addition->select_query_inventory();
            $result['destination']=$this->New_device_addition->select_query_live_con($userId);
            $result['body'] = 'support/deviceUpdationForm';           
       
            $this->load->view('template/base',$result);
        }       
    }

   public function form_Update()
    {
            $data = array(
                'id' => $this->input->post('id'),
                'dateupdate' => $this->input->post('dateupdate'),
 
                
                'date'              => $this->input->post('date'),
                'customer_name'     => $this->input->post('customer_name'),
                'truck_no'          => $this->input->post('truck_no'),
                'veh_destination'   => $this->input->post('destination'),
                'warehouse'         => $this->input->post('warehouse'),
                'transport_name'    => $this->input->post('transport_name'),
                'transport_mob_no'  => $this->input->post('transport_mob_no'),
                'lr_number'         => $this->input->post('lr_number'),
                'driver_mobile_no'  => $this->input->post('driver_mobile_no'),
                'trip'              => $this->input->post('trip'),
                'rate'              => $this->input->post('rate'),
            );

            //print_r($data);die();

            $records['data'] = $this->SupportModel->update_kpm_services($data);
            $records['data'] = $this->SupportModel->update_kpm_tripData($data);
            
            redirect('/Support/');
    }

    public function vehicleNoChange()
    {
        //$RecordId = $this->uri->segment(3);

        $userId = '77727';
        $groupId = '7781';

        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');

        $result['vehList']=$this->New_device_addition->vehicleNoChange($groupId);
        $result['destination']=$this->New_device_addition->select_query_live_con($userId);
            // print_r($this->input->post()); die;
        $this->load->view('support/vehicle_change',$result);
        
        $this->load->view('include/footer');

        // $this->load->view('support/deviceAddtionForm',$result);
        
     
    }
    public function vehicleNoChangeSubmision()
    {
        $groupId = '7781';
        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');

        $data = array(
            'groupId'=>$groupId,
            'device_no_new' => $this->input->post('device_no_new'),
            'device_no_old' => $this->input->post('device_no_old'),
            'date' => $this->input->post('date'),
            'customer_name' => $this->input->post('customer_name'),
            'truck_no' => $this->input->post('truck_no'),
            'destination' => $this->input->post('destination'),
            'warehouse' => $this->input->post('warehouse'),
            'transport_name' => $this->input->post('transport_name'),
            'transport_mob_no' => $this->input->post('transport_mob_no'),
            'lr_number' => $this->input->post('lr_number'),
            'driver_mobile_no' => $this->input->post('driver_mobile_no'),
            'trip' => $this->input->post('trip'),
            'rate' => $this->input->post('rate')
            );
        //print_r($data); die;
        ///$this->load->view('support/vehicle_change',$result);

      
        

      $this->SupportModel->changeVehicle($data);
      
      
       $result['query']=$this->New_device_addition->get_dev_addition_list($groupId);
                // redirect('/Support/');
        $this->load->view('support/list_device_addition',$result);
        $this->load->view('include/footer');

    }

    public function imeiSelect()
    {
        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        $this->load->view('support/imei_select');
        $this->load->view('include/footer');
    }
    
    public function imeit()
    {
        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        $sno=$this->input->post('sno');
        $tt=$this->SupportModel->imei_dd($sno);
        $result['device_imei']=$tt;
        $result['device_no']=$sno;
   
         $this->load->view('support/imei_select',$result);
        
        
        $this->load->view('include/footer');
    }
}
