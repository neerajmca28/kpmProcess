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
                installerid from inventory.challandetail left join inventory.device on challandetail.deviceid=device.device_id left join
                inventory.sim on device.sim_id=sim.sim_id where  device.device_status=64  
                and challandetail.CurrentRecord=1 and challandetail.installerid='".$installerId."'";
              $query = $this->inventory_db->query($sql_sel);
            
            return $query->result_array();
      }

      public function select_query_live_con($userId)
      {
          $CI = &get_instance();
        $this->matrix_db = $CI->load->database('matrix_db', TRUE);
         $sql_sel="select name,id from matrix.pois where sys_user_id='".$userId."' ";
        // echo $sql_sel; die;
              $query = $this->matrix_db->query($sql_sel);
            
            return $query->result_array();
      }

      public function vehicleNoChange($groupId)
      {
          $CI = &get_instance();
          $this->matrix_db = $CI->load->database('matrix_db', TRUE);
          $sql_sel="select veh_reg,id,sys_device_id from services where services.id in (select sys_service_id from group_services where sys_group_id='".$groupId."' and active=1)";
              $query = $this->matrix_db->query($sql_sel);
            
            return $query->result_array();
      }

      // public function vehicleNoChangeImei($vehlistImei)
      // {
      //   //echo '<pre>'; print_r($vehlistImei); die; 
      //     $CI = &get_instance();
      //     $this->matrix_db = $CI->load->database('matrix_db', TRUE);
      //     $sql_sel="select id as device_id from devices where devices.id='".$vehlistImei['sys_device_id']."'";
      //       $query = $this->matrix_db->query($sql_sel);
            
      //       return $query->result_array();
      // }

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
   
}