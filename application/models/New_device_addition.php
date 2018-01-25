<?php

class New_device_addition extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
      public function select_query_inventory($installerId)
      {
          $CI = &get_instance();
        $this->inventory_db = $CI->load->database('inventory_db', TRUE);
         $sql_sel="select device.device_id, device.device_sno,device.device_imei, device.itgc_id, sim.sim_no, device.dispatch_date,
                installerid from inventory.ChallanDetail left join inventory.device on ChallanDetail.deviceid=device.device_id left join
                inventory.sim on device.sim_id=sim.sim_id where  device.device_status=64   
                and ChallanDetail.CurrentRecord=1 and ChallanDetail.installerid='".$installerId."'";
              $query = $this->inventory_db->query($sql_sel);

              //print_r($query);die;
            //and ChallanDetail.branchid=1
            return $query->result_array();
      }

      public function select_query_live_con($userId)
      {//echo $userId;die;
          $CI = &get_instance();
        $this->matrix_db = $CI->load->database('matrix_db', TRUE);
         $sql_sel="select name,id from matrix.pois where sys_user_id='  ".$userId."' ";
              $query = $this->matrix_db->query($sql_sel);
            
            return $query->result_array();
      }

      public function vehicleNoChange($groupId)
      {
          $CI = &get_instance();
          $this->matrix_db = $CI->load->database('matrix_db', TRUE);

          //echo "select veh_reg,services.id,sys_device_id,imei from services left join devices on services.sys_device_id=devices.id  where services.id in (select sys_service_id from group_services where sys_group_id='".$groupId."' and active=1)";die;
          $sql_sel="select veh_reg,services.id,sys_device_id,imei from services left join devices on services.sys_device_id=devices.id  where services.id in (select sys_service_id from group_services where sys_group_id='".$groupId."' and active=1)";
              $query = $this->matrix_db->query($sql_sel);
            
            return $query->result_array();
      }

    public function get_dev_addition_list($group_id) 
    {
        $CI = &get_instance();
        $matrix_db=$this->matrix_db = $CI->load->database('matrix_db', TRUE);
     
        
    $SELECT="select services.id as id,services.veh_reg,devices.imei,services.thana_name,services.veh_destination,services.veh_driver_name,veh_departuredate,driver_contact_no,veh_phone_number,card_number,veh_advance from matrix.services left join matrix.devices on services.sys_device_id =devices.id   where services.id in (select sys_service_id from group_services where sys_group_id='".$group_id."'  and active=1)";
    //echo $SELECT; die;
  

       $query = $matrix_db->query($SELECT);
       $fp=fopen(log_path,'a+');
       $string=date('d-m-Y H')." ".$SELECT."\r";         
       fwrite($fp,$string);        
       fclose($fp);
       return $query->result_array(); 
    }  

    public function get_dev_unmapped_list($group_id) 
    {
        $CI = &get_instance();
        $matrix_db=$this->matrix_db = $CI->load->database('matrix_db', TRUE);
   
      $SELECT="select * from kpm_tripdata where sys_group_id='".$group_id."' and destination_date>'2012-01-01 12:28:54' and unmap=1";
      //echo $SELECT; die;
  

       $query = $matrix_db->query($SELECT);
       $fp=fopen(log_path,'a+');
       $string=date('d-m-Y H')." ".$SELECT."\r";         
       fwrite($fp,$string);        
       fclose($fp);
       return $query->result_array(); 
    }

    public function get_dev_reached_dest_list($group_id) 
    {
        $CI = &get_instance();
        $matrix_db=$this->matrix_db = $CI->load->database('matrix_db', TRUE);
   
      $SELECT="select * from kpm_tripdata where sys_group_id='".$group_id."' and destination_date>'2012-01-01 12:28:54' and unmap=0";
      //echo $SELECT; die;
  

       $query = $matrix_db->query($SELECT);
       $fp=fopen(log_path,'a+');
       $string=date('d-m-Y H')." ".$SELECT."\r";         
       fwrite($fp,$string);        
       fclose($fp);
       return $query->result_array(); 
    }

    public function get_dev_total_list($group_id,$installerId) 
    {
        $CI = &get_instance();
        $matrix_db=$this->matrix_db = $CI->load->database('matrix_db', TRUE);
   
      // $SELECT1="select services.id as id,services.veh_reg,devices.imei,services.thana_name,services.veh_destination,services.veh_driver_name,veh_departuredate,driver_contact_no,veh_phone_number,card_number,veh_advance from matrix.services left join matrix.devices on services.sys_device_id =devices.id   where services.id in (select sys_service_id from group_services where sys_group_id='".$group_id."'  and active=0)";
      // $SELECT1="select * from kpm_tripdata where sys_group_id='".$group_id."' and destination_date>'2012-01-01 12:28:54' and unmap=1";
      //echo $SELECT; die;

           $SELECT1="select * from kpm_tripdata where sys_group_id='".$group_id."' GROUP BY device_imei";
       $query1 = $matrix_db->query($SELECT1)->result_array();
       
       $array=array();
       for ($x = 1; $x <= count($query1); $x++)
        {
               $arr1=array(
                          'id' => $query1[$x]['id'],
                          'veh_reg' => $query1[$x]['veh_reg'],
                          'imei' => $query1[$x]['device_imei'],
                          'thana_name' => $query1[$x]['client_name'],
                          'veh_destination' => $query1[$x]['to_location'],
                          'veh_driver_name' => $query1[$x]['driver_name'],
                          'veh_departuredate' => $query1[$x]['trip_start_date'],
                          'driver_contact_no' => $query1[$x]['driver_number'],
                           'veh_phone_number' => $query1[$x]['contact_number'],
                          'card_number' => $query1[$x]['LR_Number'],
                           'veh_advance' => ''
                          );
              array_push($array, $arr1);
        }
                return $array; 
       //return $query->result_array();

      // $SELECT2="select services.id as id,services.veh_reg,devices.imei,services.thana_name,services.veh_destination,services.veh_driver_name,veh_departuredate,driver_contact_no,veh_phone_number,card_number,veh_advance from matrix.services left join matrix.devices on services.sys_device_id =devices.id   where services.id in (select sys_service_id from group_services where sys_group_id='".$group_id."'  and active=1)";
      // //echo $SELECT; die;
      //  $query2 = $matrix_db->query($SELECT2)->result_array(); 
      //   for ($x = 1; $x <= count($query2); $x++)
      //   {
      //          $arr2=array(
      //                     'id' => $query2[$x]['id'],
      //                     'veh_reg' => $query2[$x]['veh_reg'],
      //                     'imei' => $query2[$x]['imei'],
      //                     'thana_name' => $query2[$x]['thana_name'],
      //                     'veh_destination' => $query2[$x]['veh_destination'],
      //                     'veh_driver_name' => $query2[$x]['veh_driver_name'],
      //                     'veh_departuredate' => $query2[$x]['veh_departuredate'],
      //                     'driver_contact_no' => $query2[$x]['driver_number'],
      //                      'veh_phone_number' => $query2[$x]['veh_phone_number'],
      //                     'card_number' => $query2[$x]['card_number'],
      //                      'veh_advance' => $query2[$x]['veh_advance']
      //                     );
      //         array_push($array, $arr2);
      //   }

      // $SELECT4="select * from kpm_tripdata where sys_group_id='".$group_id."' and destination_date>'2012-01-01 12:28:54' and unmap=0";
      // //echo $SELECT; die;
      //  $query4 = $matrix_db->query($SELECT4)->result_array(); 
      //   for ($x = 1; $x <= count($query4); $x++)
      //   {
      //          $arr4=array(
      //                     'id' => $query4[$x]['id'],
      //                     'veh_reg' => $query4[$x]['veh_reg'],
      //                     'imei' => $query4[$x]['device_imei'],
      //                     'thana_name' => $query4[$x]['client_name'],
      //                     'veh_destination' => $query4[$x]['to_location'],
      //                     'veh_driver_name' => $query4[$x]['driver_name'],
      //                     'veh_departuredate' => $query4[$x]['destination_date'],
      //                     'driver_contact_no' => $query4[$x]['driver_number'],
      //                      'veh_phone_number' => $query4[$x]['contact_number'],
      //                     'card_number' => $query4[$x]['LR_Number'],
      //                      'veh_advance' => ''
      //                     );
      //         array_push($array, $arr4);
      //   }

   

      //  $CI = &get_instance();
      //   $this->inventory_db = $CI->load->database('inventory_db', TRUE);
      //    $sql_sel="select device.device_id, device.device_sno,device.device_imei, device.itgc_id, sim.sim_no, device.dispatch_date,
      //           installerid from inventory.ChallanDetail left join inventory.device on ChallanDetail.deviceid=device.device_id left join
      //           inventory.sim on device.sim_id=sim.sim_id where  device.device_status=64   
      //           and ChallanDetail.CurrentRecord=1 and ChallanDetail.installerid='".$installerId."'";
      //         $query3 = $this->inventory_db->query($sql_sel)->result_array();
      // //echo $SELECT; die;
      //  // $query2 = $matrix_db->query($SELECT2)->result_array(); 
      //   for ($x = 1; $x <= count($query3); $x++)
      //   {
      //          $arr3=array(
      //                     'id' => '',
      //                     'veh_reg' => '',
      //                     'imei' => $query3[$x]['device_imei'],
      //                     'thana_name' => '',
      //                     'veh_destination' =>'',
      //                     'veh_driver_name' => '',
      //                     'veh_departuredate' => '',
      //                     'driver_contact_no' => '',
      //                      'veh_phone_number' => '',
      //                     'card_number' => '',
      //                      'veh_advance' => ''
      //                     );
      //         array_push($array, $arr3);
      //   }


       // echo '<pre>';print_r($array); die;

      
       //return $query->result_array(); 
    }          
   
}