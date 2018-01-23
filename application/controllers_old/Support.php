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
       // $groupId = '7781';
        //echo  $user_id_live = $this->session->userdata['user_id_live'];
          //echo  $groupId = $this->session->userdata['group_id']; die;
         $installerId = $this->session->userdata['installerId'];

        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        $result['query']=$this->New_device_addition->get_dev_addition_list($groupId);

        //echo "<pre>";print_r($result);die();
        $this->load->view('support/list_device_addition',$result);
        $this->load->view('include/footer');
    }

    public function Device_addition()
    {
        $user_id_live = $this->session->userdata['user_id_live'];
          $groupId = $this->session->userdata['group_id'];
         $installerId = $this->session->userdata['installerId'];


        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        $result['assign_device']=$this->New_device_addition->select_query_inventory($installerId);
        $result['destination']=$this->New_device_addition->select_query_live_con($user_id_live);

        $this->load->view('support/deviceAddtionForm',$result);
        $this->load->view('include/footer');
        
    }

    
    public function form_NewDeviceAddition()
    {
        //$groupId = '7781';
        //$userId='77727';
         $user_id_live = $this->session->userdata['user_id_live'];
          $groupId = $this->session->userdata['group_id'];
         $installerId = $this->session->userdata['installerId'];
         $this->load->view('include/header');
         $this->load->view('include/headerMenu');
         $this->load->view('include/leftMenu');

            $timestr=$this->input->post('time');
            $datestr=$this->input->post('date');
             $datetime=date('Y-m-d H:i:s',strtotime($timestr.' '.$datestr));

      
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
            'rate' => $this->input->post('rate'),
            'source' => $this->input->post('source'),
            'sealno' => $this->input->post('sealno'),
            'weight' => $this->input->post('weight'),
            //'actual_start_time' => $this->input->post('actual_dateTime')
              'actual_start_time' => $datetime

            );
           // echo '<pre>'; print_r($data); die;
            //Transfering data to Model
            $output=$this->SupportModel->new_device_additionclose($data);
           // print_r($output); die;
            if($output==1)
            {
                $result['assign_device']=$this->New_device_addition->select_query_inventory($installerId);
                $result['destination']=$this->New_device_addition->select_query_live_con($user_id_live);
                $result['message'] = "IMEI Already Exist";
                //print_r($result); die;
                //$result['body'] = 'support/deviceAddtionForm';
                //$this->load->view('template/base',$result);
                $this->load->view('support/deviceAddtionForm',$result);
   
            }
            else if($output==2)
            {
                $result['assign_device']=$this->New_device_addition->select_query_inventory($installerId);
                $result['destination']=$this->New_device_addition->select_query_live_con($user_id_live);
                $result['message'] = "Phone number  Already Exist";
                //$result['body'] = 'support/deviceAddtionForm';
                //$this->load->view('template/base',$result);
                 $this->load->view('support/deviceAddtionForm',$result);
            }
            else if($output==3)
            {
                //$result['assign_device']=$this->New_device_addition->select_query_inventory();
                //$result['destination']=$this->New_device_addition->select_query_live_con($userId);
                $result['assign_device']=$this->New_device_addition->select_query_inventory($installerId);
                $result['destination']=$this->New_device_addition->select_query_live_con($user_id_live);
                 $result['message'] = "Something Bad Happened";
                $this->load->view('support/deviceAddtionForm',$result);
                //$result['body'] = 'support/deviceAddtionForm';
                //$this->load->view('template/base',$result);
                //$this->load->view('support/deviceAddtionForm',$result);
            }
            else if($output==4)
            {

                $result['message'] = 'Data Inserted Successfully';
                $result['query']=$this->New_device_addition->get_dev_addition_list($groupId);
                //redirect('support/index');
                // $result['body'] = 'support/list_device_addition';
                $this->load->view('support/list_device_addition',$result);
                //$this->load->view('template/base',$result);

            }
            else{
                redirect('support/index');
                //$this->load->view('support/list_device_addition');
            }
         
            //$result['query']=$this->New_device_addition->get_dev_addition_list($groupId);
            //$this->load->view('support/list_device_addition',$result);
            //$this->load->view('support/list_device_addition');
                
       // }
        

            $this->load->view('include/footer');
        
    }

    public function edit()
    {
        $RecordId1 = $this->uri->segment(3);

        //print_r($RecordId1);die();
         $user_id_live = $this->session->userdata['user_id_live'];
          $groupId = $this->session->userdata['group_id'];
         $installerId = $this->session->userdata['installerId'];
        $tt=explode("-",$RecordId1);
       
        $RecordId=$tt[0];
        $datetoupdate=date('Y-m-d',$tt[1]); 
        //$userId = '77727';
        $result['recordId'] = $tt[0];
        $result['datetoupdate'] = date("Y-m-d",$tt[1]);
       

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
            $result['assign_device']=$this->New_device_addition->select_query_inventory($installerId);
            $result['destination']=$this->New_device_addition->select_query_live_con($user_id_live);
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
         $timestr=$this->input->post('time');
         $datestr=$this->input->post('date');
             $datetime=date('Y-m-d H:i:s',strtotime($timestr.' '.$datestr));
            $data = array(
                'id'                =>  $this->input->post('id'),
                'dateupdate'        =>  $this->input->post('dateupdate'),
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
                'source'              => $this->input->post('source'),
                'sealno'              => $this->input->post('sealno'),
                'weight'              => $this->input->post('weight'),
                'actual_start_time'   => $datetime
            );

            //print_r($data);die();

            $records['data'] = $this->SupportModel->update_kpm_services($data);
            $records['data'] = $this->SupportModel->update_kpm_tripData($data);
            
            redirect('/Support/');
    }

    public function vehicleNoChange()
    {
        //$RecordId = $this->uri->segment(3);

        // $userId = '77727';
        // $groupId = '7781';
        $user_id_live = $this->session->userdata['user_id_live'];
          $groupId = $this->session->userdata['group_id'];
         $installerId = $this->session->userdata['installerId'];

        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');

        $result['vehList']=$this->New_device_addition->vehicleNoChange($groupId);
        // $result['vehList_imei']=$this->New_device_addition->vehicleNoChangeImei($result);
        $result['destination']=$this->New_device_addition->select_query_live_con($user_id_live);
            // print_r($this->input->post()); die;
        $this->load->view('support/vehicle_change',$result);
        
      $this->load->view('include/footer');

        // $this->load->view('support/deviceAddtionForm',$result);
        
     
    }
    public function vehicleNoChangeSubmision()
    {
         $user_id_live = $this->session->userdata['user_id_live'];
          $groupId = $this->session->userdata['group_id'];
         $installerId = $this->session->userdata['installerId'];
          $user_name = $this->session->userdata['user_name'];
       // $groupId = '7781';
        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');

         $timestr=$this->input->post('time');
            $datestr=$this->input->post('date');
             $datetime=date('Y-m-d H:i:s',strtotime($timestr.' '.$datestr));

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
            'rate' => $this->input->post('rate'),
            'source' => $this->input->post('source'),
            'sealno' => $this->input->post('sealno'),
            'weight' => $this->input->post('weight'),
             'username' => $user_name,
              'actual_start_time' => $datetime,
             'device_imei' => $this->input->post('hidden_imei')

            );
       // print_r($data); die;
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
    public function rowLogData()
    {
        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        // $sno=$this->input->post('sno');
        // $tt=$this->SupportModel->imei_dd($sno);
        // $result['device_imei']=$tt;
        // $result['device_no']=$sno;
   
         $this->load->view('support/viewrawlogdata');
         $this->load->view('include/footer');
        
        
       // $this->load->view('include/footer');
    }
    public function form_addRawData()
    {
        $this->load->view('include/header');
        $this->load->view('include/headerMenu');
        $this->load->view('include/leftMenu');
        $device_type=$this->input->post('devtype');
        $datatype=$this->input->post('datatype');
        $deviceimei=$this->input->post('deviceimei');
        $dt=$this->input->post('date');
        $date=date('jnY',strtotime($dt));
         //print_r($_POST); die
         $RawdatafromURL = file_get_contents('http://trackingexperts.com/debug/debug/inventoryrawdata.php?device_type='.$device_type.'&date='.$date.'&dev_imei='.$deviceimei.'&datatype='.$datatype);
        // echo 'http://trackingexperts.com/debug/debug/inventoryrawdata.php?device_type='.$device_type.'&date='.$date.'&dev_imei='.$deviceimei.'&datatype='.$datatype;die;
         $result['rawData']=$RawdatafromURL;
          $result['datatype']=$datatype;
           $result['device_type']=$device_type;
              $result['deviceimei']=$deviceimei;
               $result['dt']=$dt;

         //$tt='tarun';
        // $arrayName = array('tt' => $tt );
       // print_r($result); die;
        //$this->load->view('support/viewrawlogdata');
         $this->load->view('support/viewrawlogdata',$result);
        
        
         $this->load->view('include/footer');
    }

    public function newdeviceadditionbackComment()
    {
        $row_id=$_GET['row_id']; 
        $comment=$_GET['comment']; 
        $deviceAdditionBack = $this->New_device_addition->new_device_additionBack($row_id,$comment);
        //print_r($deviceAdditionBack); die;
    }
        
}
