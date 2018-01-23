<?php

class SupportModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

  public function update_kpm_services($data){

        //print_r($data);die;

        $matrix_db = $this->load->database('matrix_db', TRUE);

        $data1 = array(

                        'veh_driver_name'   => $data['transport_name'],
                        //'veh_driver_name'   => $data['transport_name'],
                        'thana_name'        => $data['customer_name'],
                        'veh_destination'   => $data['veh_destination'],
                        'driver_contact_no' => $data['driver_mobile_no'],
                        'veh_advance'       => $data['rate'],
                        'veh_phone_number'  => $data['transport_mob_no'],
                        'card_number'       => $data['lr_number'],
							          'veh_departuredate'  => $data['date'],

                    );
         print_r($data1);
         echo '</br>';

        $matrix_db->where('id', $data['id']);

        $matrix_db->update('services', $data1);

        //print_r($result);die;
    }


 
  
      public function show_ServicesTable($data){

      $CI = &get_instance();
        $matrix_db = $this->load->database('matrix_db', TRUE);
        
       $dateupdate=explode('-',$data['id']);
       print_r($data);

        $date=date("Y-m-d",strtotime($datetoupdate));
        echo $date;die;
        $userIdQuery= "select kpm_tripdata.warehouse, kpm_tripdata.tripplan,kpm_tripdata.rate, services.veh_reg,services.thana_name,services.veh_destination,services.veh_driver_name,veh_departuredate,driver_contact_no,veh_phone_number,card_number,veh_advance from services inner join kpm_tripdata on services.id=kpm_tripdata.vehicle_number where services.id='".$data['recordId']."' and trip_start_date='".$date."' ";
        //echo $userIdQuery; die;

        $result = $matrix_db->query($userIdQuery)->result_array();

        //echo '<pre>';print_r($result); die;
        
        return $result;

        
    }


public function update_kpm_tripData($data){

        print_r($data);die;

       $CI = &get_instance();
        $this->matrix_db = $CI->load->database('matrix_db', TRUE);
        

       $dateupdate=explode('-',$data['id']);

   $SQL="update matrix.kpm_tripdata set to_location= '".$data['veh_destination']."',trip_start_date='".$data['date']."',contact_number='".$data['transport_mob_no']."',client_name='".$data['transport_name']."',client_company_name='".$data['customer_name']."',LR_Number='".$data['lr_number']."',driver_number='".$data['driver_mobile_no']."',warehouse='".$data['warehouse']."', tripplan='".$data['trip']."' , rate= '".$data['rate']."' where vehicle_number='".$dateupdate[0]."' and trip_start_date='".$data['date']."' "; 
   //echo $SQL; die;
                       
        $query=$this->matrix_db->query($SQL);
    }



    public function new_device_additionclose($data)
    {
       
       //echo '<pre>'; print_r($data); die;
        $dimts='yes';
         $vehicle_no= $data['truck_no']; 
         $CI = &get_instance();
        $this->inventory_db = $CI->load->database('inventory_db', TRUE);
        $resultDevice_inv = "select itgc_id,device_imei,sim.phone_no,device_status,item_master.item_name from inventory.device left join inventory.sim on device.sim_id =sim.sim_id left join inventory.item_master on item_master.item_id=device.device_type  where device_imei='".$data['device_imei']."'";
        //echo $resultDevice_inv; die;
        $query = $this->inventory_db->query($resultDevice_inv);
        //echo '<pre>'; print_r($query->result_array()); die;
             $query_arr= $query->result_array();
            $device_id=$query_arr[0]['itgc_id'];
            $phone_no=$query_arr[0]['phone_no']; 
             $dev_imei=$data['device_imei']; 


          if($dimts=='yes')
          {
            $dtms=1;
          } 
          else
          {
            $dtms=0;
          }

         // $xml = simplexml_load_file('http://203.115.101.30/inventory/getimeisim.php?ItgcID='.$device_id);
         //  $i=0;
         //  foreach ($xml as $k)
         //  {
         //     $arr[$i]=$k;
         //     ++$i;
         //  }
         //    $phone_no=$arr[0][0]; 
         //    $dev_imei=$arr[1][0]; 

        //$detailsCheck = $this->New_device_addition->new_device_additionclose($phone_no,$dev_imei,$vehicle_no);
        $CI = &get_instance();
        $this->matrix_db = $CI->load->database('matrix_db', TRUE);
        
         $SELECT1="SELECT * FROM matrix.devices where ffc_status='0' AND imei='".$dev_imei."'";
         //echo $SELECT1; die;
         $query=$this->matrix_db->query($SELECT1);
         $query1= $query->result_array();
         //echo '<pre>'; print_r($query); die;

         $SELECT2="SELECT * FROM matrix.mobile_simcards where ffc_status='0' AND mobile_no='".$phone_no."'";         
         $query=$this->matrix_db->query($SELECT2);
         $query2= $query->result_array();
        // print_r($SELECT2); die;

 
      
      $t=0;
      if(count($query1)>0)
      {
          //print_r($query1->result_array()) ; die;
          $t=1;
          return $t;
          //echo $error= "IMEI ".$dev_imei." Already Exist";
      }
      else
      {
          if(count($query2)>0)
          {
               $t=2;
               return $t;
              //echo $error= "SIM ".$phone_no." Already Exist";
          }
          else
          {
         
          }
      }
      //echo $t; die;



        if($t==1)
        {
            // if($detailsCheck[0]['imei']==$dev_imei)
            // {
                //echo "IMEI ".$dev_imei." Already Exist";
                 //echo $error= "IMEI ".$dev_imei." Already Exist"; 
                       // echo '<script language="javascript">';
                       //      echo 'alert(IMEI "'.$dev_imei.'" Already Exist)';  //not showing an alert box.
                       //      echo '</script>';  

            //}
        }
        else
        {
            if($t==2)
            {
                    //echo "SIM ".$phone_no." Already Exist";
                    //echo $error= "SIM ".$phone_no." Already Exist";
                          // echo '<script language="javascript">';
                          //   echo 'alert(SIM "'.$phone_no.'" Already Exist)';  //not showing an alert box.
                          //   echo '</script>';  

            }
            else
            {
                if($t==3)
                {
                     

                }
                else
                {
                    $logText="";
                    $flag=0;

                    $CI = &get_instance();
                    //$this->matrix_db = $CI->load->database('matrix_db', TRUE);
                    $matrix_db = $this->load->database('matrix_db', TRUE);
                     $post_data = array(
                                           // 'group_id' => $userId,
                                            'imei' =>  $dev_imei,
                                            'mobile_no'=>$phone_no,
                                            'device_id' =>  $device_id,
                                            'veh_reg' => $vehicle_no,
                                            //'sales_user_id' => $sales_id,
                                            'device_status' => 2,
                                        );
                    $matrix_db->trans_begin();
                    $userId='7781';
                     $sql_req_dev="insert into matrix.requested_device(group_id,imei,mobile_no,device_id,veh_reg,sales_user_id,device_status) values('".$userId."','".$dev_imei."','".$phone_no."','".$device_id."','".$vehicle_no."','','2')";
                     //echo $sql_req_dev; die;
                     $fp=fopen(log_path,'a+');
                     $string=date('d-m-Y H')." ".$sql_req_dev."\r";         
                     fwrite($fp,$string);        
                     fclose($fp);
                      $query_sql_req_dev=$matrix_db->query($sql_req_dev);
         
                     $SELECT3="SELECT ffc_status FROM matrix.mobile_simcards where mobile_no='".$phone_no."' limit 1";
                     //echo $SELECT3; die;
                     $query=$matrix_db->query($SELECT3);
                      $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$SELECT3."\r";         
                        fwrite($fp,$string);        
                        fclose($fp);
                     $query3= $query->result_array();
                     if(count($query3)>0)
                     {
                         //$matrix_db->where('mobile_no', $phone_no);
                         $sql_sim_del="delete from mobile_simcards where mobile_no='".$phone_no."'";
                         $query1=$matrix_db->query($sql_sim_del);
                         //$matrix_db->delete('matrix.mobile_simcards'); 
                        $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$sql_sim_del."\r";         
                        fwrite($fp,$string);        
                        fclose($fp);
    
                     }
                        $date=date('Y-m-d H:i:s'); 
                        $sql="insert into mobile_simcards(network,mobile_no,created,last_updated) values(2,'".$phone_no."','".$date."','".$date."')";
                        //echo $sql;die;
                        $query1=$matrix_db->query($sql);
                        $sim_id=$matrix_db->insert_id();
                        $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$sql."\r";         
                        fwrite($fp,$string);        
                        fclose($fp);

    

                        //$logText1=$date;
                     $logText1 = "--------------------------------------\nDate: ".date('Y-m-d H:i:s')."\nNotes: \n**Created**\n--------------------------------------\n";           
                     //------------------------devices--------------------//            
                     $SELECT4="SELECT ffc_status FROM matrix.devices where imei='".$dev_imei."' limit 1";
                     $query=$matrix_db->query($SELECT4);
                     $fp=fopen(log_path,'a+');
                     $string=date('d-m-Y H')." ".$SELECT4."\r";         
                     fwrite($fp,$string);        
                     fclose($fp);
                     $query4= $query->result_array();
                     //echo count($query4); die;
                     if(count($query4)>0)
                     {
                         // $matrix_db->where('imei', $dev_imei);
                        // $matrix_db->delete('matrix.devices'); 
                        $sql_dev_del="delete from matrix.devices where imei='".$dev_imei."'";
                         $query1=$matrix_db->query($sql_dev_del);
                         $fp=fopen(log_path,'a+');
                          $string=date('d-m-Y H')." ".$sql_dev_del."\r";         
                          fwrite($fp,$string);        
                          fclose($fp);
                     }

                      $sql1="insert into matrix.devices(sys_user_id,sys_type,sys_simcard,imei,serial_no,fleet_key,heartbeat_type,odometer_offset,hours_offset,`log`,notes) values('3114','15','".$sim_id."','".$dev_imei."','".$dev_imei."','Shggg123',0,'54718','43200','".$logText1."','')";
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$sql1."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);
                    $query1=$matrix_db->query($sql1);
                    $sys_device_id=$matrix_db->insert_id();

                    $SELECT_services='SELECT sys_device_id FROM matrix.services where sys_device_id=? limit 1';
                     $query=$matrix_db->query($SELECT_services, array($sys_device_id));
                     $query_sys_device_id= $query->result_array();

                     if(count($query_sys_device_id)>0)
                     {
                            
                            echo $error= "Device ".$sys_device_id." Already Exist";
                     }
                     else
                     {
                        $veh_icon='http://www.trackingexperts.com/images/icons/vehicles/60x60/lorry-blue.PNG';
                        $veh_type_val=1;
                        $veh_type_item='Truck';
                        
                        $logText2 = "--------------------------------------\nDate: ".date('Y-m-d H:i:s')."\nNotes: \n**Created**\n--------------------------------------\n";    
                        
                        $sql2="insert into matrix.services(sys_user_id,sys_sage_reference,sys_created,sys_renewal_due,sys_renewal_cost,sys_device_id,veh_reg,veh_icon_1,veh_icon_2,veh_body,veh_chasis,veh_year,veh_seats,veh_avempg,veh_costpermile,veh_wd_auth_start,veh_wd_auth_end,veh_we_auth_start,veh_we_auth_end,veh_sun_auth_start,veh_sun_auth_end,veh_type,`log`,veh_type_name,is_dimts,Ac_lastchecked,veh_driver_name,thana_name,veh_destination,driver_contact_no,veh_advance,veh_phone_number,card_number,veh_departuredate) values(77727,345,'".$date."','0001-01-01 00:00:00','0.0','".$sys_device_id."','".$vehicle_no."','".$veh_icon."','','','','','0','0.0','0.0','00:00','00:00','00:00','00:00','00:00','23:59','".$veh_type_val. "','".$logText2."','".$veh_type_item."','".$dtms."','".$date."','".$data['transport_name']."','".$data['customer_name']."','".$data['destination']."','".$data['driver_mobile_no']."','".$data['rate']."','".$data['transport_mob_no']."','".$data['lr_number']."','".$data['date']."')";

                        $query=$matrix_db->query($sql2);
                         $serviceid=$matrix_db->insert_id();
                          $fp=fopen(log_path,'a+');
                        
                        $string=date('d-m-Y H')." ".$sql2."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);





                         //------------------------------------group_services-------------------------//

                      $sql="select sys_service_id from matrix.group_services where sys_service_id='".$serviceid."'";
                      //echo $sql; die;
                      $query=$matrix_db->query($sql);
                      $queryselect= $query->result_array();
                      if(count($queryselect)>0)
                      {
                        $errMessage="Service Id already Exist in group_services.";
                        $flag=1;
                      }
                      if($flag!=1)
                      {
                        $sql3="insert into matrix.group_services(sys_service_id,sys_group_id,sys_added_date) values('".$serviceid."','1998','".$date."')";
                        $query=$matrix_db->query($sql3);
                         $fp=fopen(log_path,'a+');
                
                        $string=date('d-m-Y H')." ".$sql3."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);
                      }

        
                         $logText3=$date;
                        $update_services="update matrix.services set log=CONCAT(log,'".$logText3."') where id='" .$serviceid."'";
                        $query=$matrix_db->query($update_services);
                        $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$update_services."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);

                        //---------------------------------tbl_history_devices----------------------//
                         $sql4="insert into matrix.tbl_history_devices (`sys_group_id`,`sys_service_id`) values('1998','".$serviceid."')";
                        $query_tbl_history_devices=$matrix_db->query($sql4);
                        $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$sql4."\r";         
                        fwrite($fp,$string);        
                        fclose($fp);
                        if($userId=="" || $userId==0)
                        {
                                $flag=2;
                        }
                        else
                        {
                             $SELECT5="select name from matrix.group where id='".$userId."'";
                             //echo $SELECT5; die;
                             $query5=$matrix_db->query($SELECT5, array($userId));
                             $queryselect= $query5->result_array();
                             //$groupName=$queryselect[0]['name'];
                        }
                    
                        
                    if($userId!=1998)
                     {
                        $sql6="insert into matrix.group_services(sys_service_id,sys_group_id,sys_added_date) values('".$serviceid."','".$userId."','".$date."')";
                        //echo $sql6;die;
                        $query_group_services=$matrix_db->query($sql6);
                        $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$sql6."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);


                        $logText4 = "--------------------------------------\nDate: ".date('Y-m-d H:i:s')."\nNotes: \n**Created**\n--------------------------------------\n";
                        $update_services="update matrix.services set log=CONCAT(log,'".$logText4."') where id='" .$serviceid."'";
                        //echo $update_services; die;
                        $query=$matrix_db->query($update_services);
                            $fp=fopen(log_path,'a+');
                
                        $string=date('d-m-Y H')." ".$update_services."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);


                        $sql7="insert into matrix.tbl_history_devices(`sys_group_id`,`sys_service_id`) values('".$userId."','".$serviceid."')";
                         //echo  $sql7; die;
                        $query=$matrix_db->query($sql7);
                        $fp=fopen(log_path,'a+');
                      
                        $string=date('d-m-Y H')." ".$sql7."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);



                         $sql8="insert into matrix.device_mapping(device_id,device_imei,sys_simcard,vehID,NewVehID,repair_with_IMEI,reason,device_placed,current_mapped_status) values('".$sys_device_id."','".$dev_imei."','".$sim_id."','".$serviceid."','','','','',1)";
                        $query=$matrix_db->query($sql8);
                        $fp=fopen(log_path,'a+');
                
                        $string=date('d-m-Y H')." ".$sql8."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);
                       }

                       $sql="select sys_service_id from matrix.latest_telemetry where sys_service_id='".$serviceid."'";
                      $query=$matrix_db->query($sql);
                      $queryselect= $query->result_array();
                      if(count($queryselect>0))
                      {
                        $errMessage="Service Id already Exist in latest_telemetry.";
                        $flag=3;
                      }
                     
                       $sql9="insert into matrix.latest_telemetry (sys_service_id,sys_msg_type,sys_proc_time,sys_proc_host,sys_geofence_id,sys_device_id,gps_time,jny_distance,jny_duration,jny_idle_time,jny_leg_code,jny_device_jny_id,des_movement_id,des_vehicle_id,tel_hours,tel_input_0,tel_input_1,tel_input_2,tel_input_3,tel_temperature,tel_voltage,tel_odometer) values('".$serviceid."','0',date_add(now(),interval -330 minute),'None','0','".$sys_device_id."',now(),'0.0','0','0','0','0','0','0','0',false,false,false,false,'0.0','0.0','0')";

                      $query_lat_tele=$matrix_db->query($sql9);
                        $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$sql9."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);

                      $sql="select sys_service_id from matrix.lastspeed_row where sys_service_id='".$serviceid."'";
                      $query=$matrix_db->query($sql);
                      $queryselect= $query->result_array();
                      if(count($queryselect>0))
                      {
                        $errMessage="Service Id already Exist in lastspeed_row.";
                        $flag=4;
                      }

                        $sql10="insert into matrix.lastspeed_row(sys_service_id,sys_msg_type,sys_proc_time,sys_proc_host,sys_geofence_id,sys_device_id,gps_time,jny_distance,jny_duration,jny_idle_time,jny_leg_code,jny_device_jny_id,des_movement_id,des_vehicle_id,tel_hours,tel_input_0,tel_input_1,tel_input_2,tel_input_3,tel_temperature,tel_voltage,tel_odometer) values('".$serviceid."','0',date_add(now(),interval -330 minute),'None','0','".$sys_device_id."','".$date."','0.0','0','0','0','0','0','0','0',false,false,false,false,'0.0','0.0','0')";
                        
                      $query_lastspeed_row=$matrix_db->query($sql10);
                        $fp=fopen(log_path,'a+');
                
                        $string=date('d-m-Y H')." ".$sql10."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);
                             
    
             

                $sqltrip="INSERT INTO `kpm_tripdata` (`vehicle_number`, `veh_reg`, `to_location`, `Topoi_lat`, `Topoi_long`, `To_exit_Datetime`, `To_entry_Datetime`, `trip_start_date`, `from_location`, `frompoi_lat`, `frompoi_long`, `From_exit_Datetime`, `From_entry_Datetime`, `total_Km`, `from_poiid`, `to_poiid`, `loaded_empty`, `driver_code`, `contact_number`, `client_name`, `client_company_name`, `email_id`, `LR_Number`, `driver_name`, `driver_number`, `status`, `current_time`, `add_type`,warehouse,tripplan,rate) 

                VALUES ('".$serviceid."', '".$data['truck_no']."', '".$data['destination']."', '00.00000000', '00.00000000', NULL, NULL, '".$data['date']."', 'Khanna paper mills', '00.00000000', '00.00000000', NULL, NULL, '0', '0', '0', '1', '0', '".$data['transport_mob_no']."', '".$data['transport_name']."', '".$data['customer_name']."', '', '".$data['lr_number']."', NULL, '".$data['driver_mobile_no']."', 1, '".$date."', 'new', '".$data['warehouse']."', '".$data['trip']."', '".$data['rate']."')";


                // $update_query="update kpm_tripdata set to_location= '".$data['destination']."',trip_start_date='".$data['date']."',contact_number='".$data['transport_mob_no']."',client_name='".$data['transport_name']."',client_company_name='".$data['customer_name']."',LR_Number='".$data['lr_number']."',driver_number='".$data['driver_mobile_no']."',add_type='old',warehouse='".$data['warehouse']."', tripplan='".$data['trip']."' , rate= '".$data['rate']."' where vehicle_number='".$data['serviceid']."' and trip_start_date='".$data['date']."' ";

                    $query = $matrix_db->query($sqltrip);
                         $fp=fopen(log_path,'a+');
                         $string=date('d-m-Y H')." ".$sqltrip."\r";         
                         fwrite($fp,$string);        
                         fclose($fp);   

        
                 }

                 // if($flag==1 || $flag==2 || $flag==3 || $flag==4)
                    // {        
                    //  echo 'rr'; 

                            
                                 
                    //          // $this->matrix_db->trans_rollback();
                    //          // echo 'tt'; die;   
                               
                      
                          

                    // }
                // else
                //  {
            //-----------------------------transaction close------------------------------//
                     if ($matrix_db->trans_status() === FALSE)
                           {   
                            $matrix_db->trans_rollback();  
                            //echo 'something bad happened'; 
                            // echo '<script language="javascript">';
                            // echo 'alery(Something bad happened)';  //not showing an alert box.
                            // echo '</script>'; 
                            $t=3;
                            return $t;    
                      }
                      else
                      {
                          $matrix_db->trans_commit();
                       
                  
                          
                           $CI = &get_instance();
                          $this->inventory_db = $CI->load->database('inventory_db', TRUE);
                          //$sql="UPDATE `inventory`.`device` SET `device_status`=65 WHERE device_imei='".$dev_imei."'";
                          //$query = $this->inventory_db->query($sql);
                         //$query = $this->inventory_db->insert_id();
                         if($query)
                         {
                            $t=4;
                            //return $t;
                             // echo '<script language="javascript">';
                             //  echo 'alery(Successfully Added)';  //not showing an alert box.
                             //  echo '</script>';
                            return $t;
                         }
                        

                      }

                   // }
                }
                    
            }

        }
    }
   

    //---------Done Process for Internal DB-------------     

  

    public function changeVehicle($data)
    {
        

            $CI = &get_instance();
                    //$this->matrix_db = $CI->load->database('matrix_db', TRUE);
            $matrix_db = $this->load->database('matrix_db', TRUE);
             //echo '<pre>'; print_r($data); die;
            $matrix_db->trans_begin();

             $select_veh_reg_old="select services.veh_reg from matrix.services where sys_device_id='".$data['device_no_old']."'";
              //echo $select_veh_reg_old; die;
              $query = $matrix_db->query($select_veh_reg_old);
              //$query1 = $matrix_db->query($select_veh_reg_old1);
              $query_arr= $query->result_array();
             // print_r($query_arr); die;
              $old_veh_reg=$query_arr[0]['veh_reg']; 
              //echo $old_veh_reg=$select_veh_reg_old; die;
              $fp=fopen(log_path,'a+');
              $string=date('d-m-Y H')." ".$select_veh_reg_old."\r";         
              fwrite($fp,$string);        
              fclose($fp);   


              $ins_change_vehicle_history="INSERT INTO matrix.change_vehicle_history(service_id,group_id,old_veh_number,new_veh_number,reason,`date`,updated_by) values('".$data['device_no_old']."','".$data['groupId']."','" . $old_veh_reg."','".$data['device_no_new']."','Chnage by KPM office','".date('Y-m-d H:i:s')."','Kaushal')";
              //echo $ins_change_vehicle_history; die;
              $query = $matrix_db->query($ins_change_vehicle_history);
              $fp=fopen(log_path,'a+');
              $string=date('d-m-Y H')." ".$ins_change_vehicle_history."\r";         
              fwrite($fp,$string);        
              fclose($fp);  
              //echo $ins_change_vehicle_history; die;


            $date=date('Y-m-d');
            $update_query="update matrix.services set veh_reg='".$data['device_no_new']."',veh_driver_name='".$data['transport_name']."',thana_name='".$data['customer_name']."',veh_destination='".$data['destination']."',driver_contact_no='".$data['driver_mobile_no']."',veh_advance='".$data['rate']."',veh_phone_number='".$data['transport_mob_no']."',card_number='".$data['lr_number']."',veh_departuredate='".$data['date']."' where id='".$data['device_no_old']."'";
           //echo $update_query; die;


                        $query=$matrix_db->query($update_query);
                        // $serviceid=$matrix_db->insert_id();
                          $fp=fopen(log_path,'a+');
                        
                        $string=date('d-m-Y H')." ".$update_query."\r";         
                         fwrite($fp,$string);        
                          fclose($fp);


     $sqltrip="INSERT INTO `kpm_tripdata` (`vehicle_number`, `veh_reg`, `to_location`, `Topoi_lat`, `Topoi_long`, `To_exit_Datetime`, `To_entry_Datetime`, `trip_start_date`, `from_location`, `frompoi_lat`, `frompoi_long`, `From_exit_Datetime`, `From_entry_Datetime`, `total_Km`, `from_poiid`, `to_poiid`, `loaded_empty`, `driver_code`, `contact_number`, `client_name`, `client_company_name`, `email_id`, `LR_Number`, `driver_name`, `driver_number`, `status`, `current_time`, `add_type`,warehouse,tripplan,rate) 

                VALUES ('".$data['device_no_old']."', '".$data['device_no_new']."', '".$data['destination']."', '00.00000000', '00.00000000', NULL, NULL, '".$data['date']."', 'Khanna paper mills', '00.00000000', '00.00000000', NULL, NULL, '0', '0', '0', '1', '0', '".$data['transport_mob_no']."', '".$data['transport_name']."', '".$data['customer_name']."', '', '".$data['lr_number']."', NULL, '".$data['driver_mobile_no']."', 1, '".$date."', 'new', '".$data['warehouse']."', '".$data['trip']."', '".$data['rate']."')";

                    $query = $matrix_db->query($sqltrip);
                         $fp=fopen(log_path,'a+');
                         $string=date('d-m-Y H')." ".$sqltrip."\r";         
                         fwrite($fp,$string);        
                         fclose($fp); 

            if ($matrix_db->trans_status() === FALSE)
            {   
                 
                      $t=3;
                      $matrix_db->trans_rollback(); 
                      return $t;  
            }
            else
            {
                 $matrix_db->trans_commit();
                 $t=4;
                 return $t;
            }
    }
    public function imei_dd($data)
    {
        //print_r($data); die;
        $CI = &get_instance();
        $this->inventory_db = $CI->load->database('inventory_db', TRUE);
        $sql="select device_imei from inventory.device where device_sno='".$data."' ";
        $query =$this->inventory_db->query($sql);
        $query_arr= $query->result_array();
        //print_r($query_arr); die;
         return $device_id=$query_arr[0]['device_imei'];

    }

}
