<?php

class Device_replace extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
     public function getReplaceDeviceList($WhereQuery)
    {

        $sql = "SELECT device_change.*, addclient.UserName AS username FROM device_change LEFT JOIN addclient ON device_change.user_id = addclient.Userid WHERE ". $WhereQuery."  order by id desc ";
        $query = $this->db->query($sql);
        $fp=fopen(log_path,'a+');
        $string=date('d-m-Y H')." ".$sql."\r";         
        fwrite($fp,$string);        
        fclose($fp);
        return $query->result_array();
        
    }
    public function popup_details($row_id,$tablename) 
    {
        $CI = &get_instance();
        $this->inventory_db = $CI->load->database('inventory_db', TRUE);
        $SELECT="SELECT device_change.*,addclient.UserName AS sys_username ";
        $FROM="FROM device_change";
        $join="left join addclient on device_change.rdd_username=addclient.Userid";
        $WHERE = "where device_change.id=".$row_id;
        $SQL=$SELECT ." ". $FROM ." ".$join." ". $WHERE; 
        $query = $this->db->query($SQL);
        $fp=fopen(log_path,'a+');
        $string=date('d-m-Y H')." ".$SQL."\r";         
        fwrite($fp,$string);        
        fclose($fp);
        return $query->result_array(); 
    }

    public function device_changeBack($row_id,$comment)
    {
      $SELECT4="SELECT support_comment FROM device_change where id=? limit 1" ;
      $query4=$this->db->query($SELECT4, array($row_id));
      $query_device_change= $query4->result_array();

     $Updateapprovestatus="update device_change set support_comment='".$query_device_change[0]["support_comment"]."<br/>".date("Y-m-d H:i:s")." - " .$comment."',device_change_status='2' where id=".$row_id;
      $query=$this->db->query($Updateapprovestatus);
      $fp=fopen(log_path,'a+');
      $string=date('d-m-Y H')." ".$Updateapprovestatus."\r";         
      fwrite($fp,$string);        
      fclose($fp);
      if($query==1) 
      {
            echo "Successfully Commented.";
      }
    }
    public function device_changeForwardBack($row_id,$comment)
    {
      $SELECT4="SELECT forward_back_comment FROM device_change where id=? limit 1" ;
      $query4=$this->db->query($SELECT4, array($row_id));
      $query_device_change= $query4->result_array();

     $Updateapprovestatus="update device_change  set forward_back_comment='".$query_device_change[0]["forward_back_comment"]."<br/>".date("Y-m-d H:i:s")." - " .$comment."' where id=".$row_id;
      $query=$this->db->query($Updateapprovestatus);
      $fp=fopen(log_path,'a+');
      $string=date('d-m-Y H')." ".$Updateapprovestatus."\r";         
      fwrite($fp,$string);        
      fclose($fp);
      if($query==1) 
      {
            echo "Successfully Commented.";
      }
    }
    
  public function checkGroupDevice($row_id,$device_imei,$rdd_device_imei,$user_id,$reg_no,$mobile_no)
  {
          $flag=0;
          $CI = &get_instance();
          $matrix_db=$this->matrix_db = $CI->load->database('matrix_db', TRUE);
          $matrix_db->trans_begin();

          $device_imei=trim($device_imei);
          $rdd_device_imei=trim($rdd_device_imei);
          $mobile_no=trim($mobile_no);
          $reg_no=trim($reg_no);
          $SELECT5="SELECT id FROM matrix.devices where imei='".$device_imei."' limit 1";
          //echo $SELECT5; die;
          $fp=fopen(log_path,'a+');
          $string=date('d-m-Y H')." ".$SELECT5."\r";         
          fwrite($fp,$string);        
          fclose($fp);
          $query5=$matrix_db->query($SELECT5);
          $query_dev_id_old= $query5->result_array();
          if(count($query_dev_id_old)>0)
          {
            $query_dev_id_old=$query_dev_id_old[0]['id'];
          }
          else
          {
             $flag=1;
          }
          $SELECT6="SELECT id FROM matrix.devices where imei='".$rdd_device_imei."'  limit 1" ;
          $fp=fopen(log_path,'a+');
          $string=date('d-m-Y H')." ".$SELECT6."\r";         
          fwrite($fp,$string);        
          fclose($fp);
          $query6=$matrix_db->query($SELECT6);
          $query_dev_id_new= $query6->result_array();
          if(count($query_dev_id_new)>0)
          {
             $query_dev_id_new=$query_dev_id_new[0]['id'];
          }
          else
          {
             $flag=1;
          }
         
          $SELECT7="SELECT id FROM matrix.services where sys_device_id='".$query_dev_id_old."' limit 1" ;
             $fp=fopen(log_path,'a+');
                    $string=date('d-m-Y H')." ".$SELECT7."\r";         
                    fwrite($fp,$string);        
                    fclose($fp);
          //echo $SELECT7; die;
          $query7=$matrix_db->query($SELECT7);
          $query_service_id_old= $query7->result_array();
          if(count($query_service_id_old)>0)
          {
             $query_service_id_old=$query_service_id_old[0]['id'];
          }
          else
          {
             $flag=1;
          }
         
          $SELECT7="SELECT id FROM matrix.services where sys_device_id='".$query_dev_id_new."' limit 1" ;
            $fp=fopen(log_path,'a+');
            $string=date('d-m-Y H')." ".$SELECT7."\r";         
            fwrite($fp,$string);        
            fclose($fp);
          $query7=$matrix_db->query($SELECT7);
          $query_service_id_new= $query7->result_array();
          if(count($query_service_id_new)>0)
          {
            $query_service_id_new=$query_service_id_new[0]['id'];
          }
          else
          {
             $flag=1;
          }
         
          //echo $query_service_id_old; die;
          $SELECT8="SELECT sys_group_id FROM matrix.tbl_history_devices where sys_service_id='".$query_service_id_old."' limit 1" ;
          //echo $SELECT8; die;
            $fp=fopen(log_path,'a+');
            $string=date('d-m-Y H')." ".$SELECT8."\r";         
            fwrite($fp,$string);        
            fclose($fp);
          $query8=$matrix_db->query($SELECT8);
          $query_group_id_old= $query8->result_array();
          if(count($query_group_id_old)>0)
          {
                $query_group_id_old=$query_group_id_old[0]['sys_group_id'];
          }
          else
          {
             $flag=1;
          }
        
          $SELECT9="SELECT sys_group_id FROM matrix.tbl_history_devices where sys_service_id='".$query_service_id_new."' limit 1" ;
          //echo $SELECT9; die;
            $fp=fopen(log_path,'a+');
            $string=date('d-m-Y H')." ".$SELECT9."\r";         
            fwrite($fp,$string);        
            fclose($fp);
          $query9=$matrix_db->query($SELECT9);
          $query_group_id_new= $query9->result_array();
          if(count($query_group_id_new)>0)
          {
               $query_group_id_new=$query_group_id_new[0]['sys_group_id'];
          }
          else
          {
             $flag=1;
          }
         
      if($flag!=1)
      {
         if($query_group_id_old==$query_group_id_new)
          {
             // echo 'tt'; die;
              $device_placed="client office";
              $reason="reasong here";
              $date=date('Y-m-d H:i:s');
              $SELECT10="SELECT current_mapped_status FROM matrix.device_mapping where device_imei='".$device_imei."' limit 1" ;
              $query10=$matrix_db->query($SELECT10);
              $fp=fopen(log_path,'a+');
              $string=date('d-m-Y H')." ".$SELECT10."\r";         
              fwrite($fp,$string);        
              fclose($fp);
              $DeviceStatus= $query10->result_array();
              if(count($DeviceStatus)>0)
              {
                 $DeviceStatus=$DeviceStatus[0]['current_mapped_status'];
              }
              else
              {
                 $flag=2;
              }
              $SELECT10="SELECT device_for_repaired FROM matrix.devices where imei='".$device_imei."' limit 1" ;
              $query10=$matrix_db->query($SELECT10);
              $OldDeviceRepairedStatus= $query10->result_array();
              $fp=fopen(log_path,'a+');
              $string=date('d-m-Y H')." ".$SELECT10."\r";         
              fwrite($fp,$string);        
              fclose($fp);
              if(count($OldDeviceRepairedStatus)>0)
              {
                 $OldDeviceRepairedStatus=$OldDeviceRepairedStatus[0]['device_for_repaired'];
              }
              else
              {
                 $flag=2;
              }
              $SELECT11="SELECT current_mapped_status FROM matrix.services where sys_device_id='".$query_dev_id_old."' limit 1" ;
              $query11=$matrix_db->query($SELECT11);
              $CurrentMappingStatus= $query11->result_array();
              $fp=fopen(log_path,'a+');
              $string=date('d-m-Y H')." ".$SELECT11."\r";         
              fwrite($fp,$string);        
              fclose($fp);
              if(count($CurrentMappingStatus)>0)
              {
                  $CurrentMappingStatus=$CurrentMappingStatus[0]['current_mapped_status'];
              }
              else
              {
                 $flag=2;
              }

              $SELECT12="SELECT ffc_status FROM matrix.devices where imei='".$rdd_device_imei."' limit 1" ;
              $query12=$matrix_db->query($SELECT12);
              $FFcStatusNewDevice= $query12->result_array();
              //print_r($FFcStatusNewDevice); die;
              
              $fp=fopen(log_path,'a+');
              $string=date('d-m-Y H')." ".$SELECT12."\r";         
              fwrite($fp,$string);        
              fclose($fp);
              if(count($FFcStatusNewDevice)>0)
              {
                  $FFcStatusNewDevice=$FFcStatusNewDevice[0]['ffc_status'];
              }
              else
              {
                 $flag=2;
              }


              if($flag==2)
              {
                echo "There is some problem";
              }
              else
              {
                 
                  if($DeviceStatus==1)
                  {
                      $strQueries = "update matrix.device_mapping set repair_with_IMEI='".$rdd_device_imei."',reason='" .$reason."',device_placed='".$device_placed."',current_mapped_status=1,mapped_date='".$date."',last_updated_date='".$date."' where vehID='".$query_service_id_old."'";

                      $query=$matrix_db->query($strQueries);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);
          

                      $strQueries1 = "update matrix.device_mapping set repair_with_IMEI='',reason='Device UnMapped',device_placed='',current_mapped_status=0,unmapped_date='".$date."',last_updated_date='".$date."' where vehId='".$query_service_id_new."'";
                      $query=$matrix_db->query($strQueries1);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries1."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);

                      $strQueries2 = "insert into matrix.history_device_mapping(vehID,device_imei,mobileno,repair_with_IMEI,current_mapped_status,reason,device_placed,mapped_date,last_updated_date) values('".$reg_no."','".$device_imei."','".$mobile_no."','".$rdd_device_imei."','1','".$reason."','".$device_placed."','".$date."','".$date."')";
                      $query=$matrix_db->query($strQueries2);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries2."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);

                      $strQueries3 = "insert into matrix.history_device_mapping(vehID,device_imei,mobileno,repair_with_IMEI,current_mapped_status,reason,device_placed,unmapped_date,last_updated_date) values('','".$rdd_device_imei."','','','0','Device Unmapped','','".$date."','".$date."') ";
                      $query=$matrix_db->query($strQueries3);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries3."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);
                       $sqlupdate1="UPDATE matrix.services set sys_device_id=CONCAT(sys_device_id,'010'),current_mapped_status=1 where sys_device_id='".$query_dev_id_old."'";
                      // echo $sqlupdate1; die;
                      $query=$matrix_db->query($sqlupdate1);//later
                        $fp=fopen(log_path,'a+');
                        $string=date('d-m-Y H')." ".$sqlupdate1."\r";         
                        fwrite($fp,$string);        
                        fclose($fp);
                      
                      $strQueries4 = "UPDATE matrix.services set sys_device_id='".$query_dev_id_old."',current_mapped_status=0 where id='".$query_service_id_new."'";
                      //echo $strQueries4; die;
                      $query=$matrix_db->query($strQueries4);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries4."\r";
                      fwrite($fp,$string);        
                      fclose($fp);
                      $query_dev_id_old_replaced=$query_dev_id_old.'010';
                      $strQueries5 = "update matrix.services set sys_device_id='".$query_dev_id_new."',current_mapped_status=1 where sys_device_id='".$query_dev_id_old_replaced."' and veh_reg='".$reg_no."'";
                      //echo $strQueries5; die;
                      $query=$matrix_db->query($strQueries5);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries5."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);

                      $strQueries6 = "update matrix.devices set device_for_repaired='1' where id='".$query_dev_id_old."'";
                      $query=$matrix_db->query($strQueries6);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries6."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);

                      $strQueries7 = "update matrix.devices set device_for_repaired='0' where id='".$query_service_id_new."'";
                      $query=$matrix_db->query($strQueries7);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries7."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);
                  }
                  else if ($DeviceStatus == 0)
                  {
                     $strQueries= "update matrix.device_mapping set repair_with_IMEI='".$rdd_device_imei."',reason='".$reason."',device_placed='".$device_placed."',current_mapped_status=1,mapped_date='".$date."',last_updated_date='".$date."' where vehId='".$query_service_id_new."'";
                     //echo $strQueries; die;
                      //$query=$matrix_db->query($strQueries);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);

                      $strQueries= "insert into matrix.history_device_mapping(vehID,device_imei,mobileno,repair_with_IMEI,current_mapped_status,reason, device_placed,mapped_date,last_updated_date) values('".$reg_no."','".$rdd_device_imei."','".$mobile_no."','".$rdd_device_imei."','1','".$reason."','".$device_placed."','".$date."','".$date."')";
                      $query=$matrix_db->query($strQueries);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);
                      //echo $FFcStatusNewDevice; die;
                      if ($device_imei !=$rdd_device_imei)
                      {

                          $strQueries= "update matrix.device_mapping set repair_with_IMEI='',reason='Device unmapped',device_placed='',current_mapped_status=0,                 unmapped_date='".$date."',last_updated_date='".$date."' where vehId='".$rdd_device_imei."'";
                          $query=$matrix_db->query($strQueries);
                          $fp=fopen(log_path,'a+');
                          $string=date('d-m-Y H')." ".$strQueries."\r";         
                          fwrite($fp,$string);        
                          fclose($fp);

                          $strQueries= "insert into matrix.history_device_mapping(vehID,device_imei,mobileno,repair_with_IMEI,current_mapped_status,reason,device_placed,mapped_date,last_updated_date) values('','".$rdd_device_imei."','','','0','".$reason."','".$device_placed."','".$date."','".$date."')";
                          $query=$matrix_db->query($strQueries);
                          $fp=fopen(log_path,'a+');
                          $string=date('d-m-Y H')." ".$strQueries."\r";         
                          fwrite($fp,$string);        
                          fclose($fp);
                      }
                      if ($OldDeviceRepairedStatus == "1")
                      {

                          $strQueries = "update matrix.services set sys_device_id='".$query_dev_id_old."',current_mapped_status=1 where sys_device_id='".$query_dev_id_new ."'";
                           $query=$matrix_db->query($strQueries);
                           $fp=fopen(log_path,'a+');
                          $string=date('d-m-Y H')." ".$strQueries."\r";         
                          fwrite($fp,$string);        
                          fclose($fp);

                          $strQueries1 = "update matrix.devices set device_for_repaired='0' where id='".$query_dev_id_new."'";
                            $query=$matrix_db->query($strQueries1);
                          //echo $strQueries1; die;
                          
                          $fp=fopen(log_path,'a+');
                          $string=date('d-m-Y H')." ".$strQueries1."\r";         
                          fwrite($fp,$string);        
                          fclose($fp);
                      }
                      else
                      { 
                           $query_dev_id_old_replaced=$query_dev_id_old.'010';
                           $strQueries ="update matrix.services set sys_device_id='".$query_dev_id_old_replaced."',current_mapped_status=0 where sys_device_id='".$query_dev_id_old."'";
                            $query=$matrix_db->query($strQueries);
                            $fp=fopen(log_path,'a+');
                            $string=date('d-m-Y H')." ".$strQueries."\r";         
                            fwrite($fp,$string);        
                            fclose($fp);

                           $strQueries ="update matrix.services set sys_device_id='".$query_dev_id_old."',current_mapped_status=1 where id='".$query_service_id_new."'";
                            $query=$matrix_db->query($strQueries);
                            $fp=fopen(log_path,'a+');
                            $string=date('d-m-Y H')." ".$strQueries."\r";         
                            fwrite($fp,$string);        
                            fclose($fp);

                           $strQueries ="update matrix.services set sys_device_id='".$query_dev_id_new."',current_mapped_status=0 where sys_device_id='".$query_dev_id_old_replaced."' and veh_reg='".$reg_no."'";
                            $query=$matrix_db->query($strQueries);
                            $fp=fopen(log_path,'a+');
                            $string=date('d-m-Y H')." ".$strQueries."\r";         
                            fwrite($fp,$string);        
                            fclose($fp);
                      }
                      if ($CurrentMappingStatus == "1")
                      {
                            $strQueries="update matrix.devices set device_for_repaired='1' where id='".$query_dev_id_old."'";
                            //echo $strQueries; die;
                            $query=$matrix_db->query($strQueries);
                            $fp=fopen(log_path,'a+');
                            $string=date('d-m-Y H')." ".$strQueries."\r";         
                            fwrite($fp,$string);        
                            fclose($fp);
                      }

                  }

                 //Update Devcie FFC Status thinking
                 $strQueries= "update matrix.devices set ffc_status='0' where id='".$query_dev_id_new."'";
                 $query=$matrix_db->query($strQueries);
                 $fp=fopen(log_path,'a+');
                  $string=date('d-m-Y H')." ".$strQueries."\r";         
                  fwrite($fp,$string);        
                  fclose($fp);

                  //FFC Replaced device should be FFC
                  if ($FFcStatusNewDevice == 1)
                  {
                      $strQueries= "update matrix.devices set ffc_status='1' where id='".$query_dev_id_old."'";
                      $query=$matrix_db->query($strQueries);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$strQueries."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);
                  }
              }

            //-----------------------------transaction close------------------------------//

              if ($matrix_db->trans_status() === true)
              {   
                     $matrix_db->trans_commit();
                     $Updateapprovestatus="update internalsoftware.device_change set final_status=1 ,close_date='".date("Y-m-d H:i:s")."',req_close_by='".$_SESSION['user_name']."' where id='" .$row_id."'";
                      //echo $Updateapprovestatus; die;
                      $query = $this->db->query($Updateapprovestatus);
                      $fp=fopen(log_path,'a+');
                      $string=date('d-m-Y H')." ".$Updateapprovestatus."\r";         
                      fwrite($fp,$string);        
                      fclose($fp);
                      echo 'Successfully Submitted';  
                       
              }
              else
              {   
                     $matrix_db->trans_rollback();  
                     echo 'something bad happened';      
              }

        }
        else
        {
            // echo 'tt'; die;
            echo $errMessage="Can't Replace Devices of Different Group.";
            // return $errMessage;
        }
      }
      else
      {
        echo "There is some problem";
      }
    }

}