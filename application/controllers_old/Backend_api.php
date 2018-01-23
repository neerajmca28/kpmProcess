<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_api extends CI_Controller 
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->view('include/header');
		$this->load->view('include/headerMenu');
	     $this->load->view('include/leftMenu');

		$this->load->view('support/list_device_addition');
		 $this->load->view('include/footer');
	}

	public function device_addition_view()
	{
		$row_id=$_GET['RowId']; 
		$tablename=$_GET['tablename'];
		$popupDetails['query'] = $this->New_device_addition->popup_details($row_id,$tablename);
		
		//$this->load->view('include/header');
		//$this->load->view('include/headerMenu');
	    // $this->load->view('include/leftMenu');

		 $this->load->view('support/ajax_list_device_addition',$popupDetails);
		 //$this->load->view('include/footer');
	}
	
	public function new_device_additionclose()
	{
		 $row_id=$_GET['row_id'];
	 	 $device_id=$_GET['device_id']; 
	 	 $userId=$_GET['userId']; 
	 	 $vehicle_no=$_GET['vehicle_no'];  
	 	 $sales_id=$_GET['sales_id']; 
	 	  $dimts=$_GET['dimts']; 
	 	  if($dimts=='yes')
	 	  {
	 	  	$dtms=1;
	 	  } 
	 	  else
	 	  {
	 	  	$dtms=0;
	 	  }

	 	 $xml = simplexml_load_file('http://203.115.101.30/inventory/getimeisim.php?ItgcID='.$device_id);
		  $i=0;
		  foreach ($xml as $k)
		  {
		  	 $arr[$i]=$k;
		  	 ++$i;
		  }
		    $phone_no=$arr[0][0]; 
		    $dev_imei=$arr[1][0]; 

		$detailsCheck = $this->New_device_addition->new_device_additionclose($phone_no,$dev_imei,$vehicle_no);
		if($detailsCheck==1)
		{
			// if($detailsCheck[0]['imei']==$dev_imei)
			// {
				//echo "IMEI ".$dev_imei." Already Exist";
				 echo $error= "IMEI ".$dev_imei." Already Exist";

			//}
		}
		else
		{
			if($detailsCheck==2)
			{
					//echo "SIM ".$phone_no." Already Exist";
					echo $error= "SIM ".$phone_no." Already Exist";

			}
			else
			{
				if($detailsCheck==3)
				{
						//echo "SIM ".$phone_no." Already Exist";
						//echo $error= "Vehicle ".$vehicle_no." Already Exist";

				}
				else
				{
					$logText="";
					$flag=0;

					$CI = &get_instance();
		    	  	//$this->matrix_db = $CI->load->database('matrix_db', TRUE);
		    	  	$matrix_db = $this->load->database('matrix_db', TRUE);
		    	  	 $post_data = array(
									        'group_id' => $userId,
									        'imei' =>  $dev_imei,
									        'mobile_no'=>$phone_no,
									        'device_id' =>  $device_id,
									        'veh_reg' => $vehicle_no,
									        'sales_user_id' => $sales_id,
									        'device_status' => 2,
									    );
		    	  	$matrix_db->trans_begin();
		    	  	
		    	  	 $sql_req_dev="insert into matrix.requested_device(group_id,imei,mobile_no,device_id,veh_reg,sales_user_id,device_status) values('".$userId."','".$dev_imei."','".$phone_no."','".$device_id."','".$vehicle_no."','".$sales_id."','2')";
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

		    	  	  $sql1="insert into devices(sys_user_id,sys_type,sys_simcard,imei,serial_no,fleet_key,heartbeat_type,odometer_offset,hours_offset,`log`,notes) values('3114','15','".$sim_id."','".$dev_imei."','".$dev_imei."','Shggg123',0,'54718','43200','".$logText1."','')";
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
						
						$sql2="insert into services(sys_user_id,sys_sage_reference,sys_created,sys_renewal_due,sys_renewal_cost,sys_device_id,veh_reg,veh_icon_1,veh_icon_2,veh_body,veh_chasis,veh_year,veh_seats,veh_avempg,veh_costpermile,veh_wd_auth_start,veh_wd_auth_end,veh_we_auth_start,veh_we_auth_end,veh_sun_auth_start,veh_sun_auth_end,veh_type,`log`,veh_type_name,is_dimts,Ac_lastchecked) values(3114,345,'".$date."','0001-01-01 00:00:00','0.0','".$sys_device_id."','".$vehicle_no."','".$veh_icon."','','','','','0','0.0','0.0','00:00','00:00','00:00','00:00','00:00','23:59','".$veh_type_val. "','".$logText2."','".$veh_type_item."','".$dtms."','".$date."')";

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
		     	  	  	$sql3="insert into group_services(sys_service_id,sys_group_id,sys_added_date) values('".$serviceid."','1998','".$date."')";
						$query=$matrix_db->query($sql3);
						 $fp=fopen(log_path,'a+');
				
					    $string=date('d-m-Y H')." ".$sql3."\r";         
					     fwrite($fp,$string);        
					      fclose($fp);
		     	  	  }

		
						 $logText3=$date;
						$update_services="update services set log=CONCAT(log,'".$logText3."') where id='" .$serviceid."'";
						$query=$matrix_db->query($update_services);
						$fp=fopen(log_path,'a+');
					    $string=date('d-m-Y H')." ".$update_services."\r";         
					     fwrite($fp,$string);        
					      fclose($fp);

						//---------------------------------tbl_history_devices----------------------//
						 $sql4="insert into tbl_history_devices (`sys_group_id`,`sys_service_id`) values('1998','".$serviceid."')";
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
						$sql6="insert into group_services(sys_service_id,sys_group_id,sys_added_date) values('".$serviceid."','".$userId."','".$date."')";
						//echo $sql6;die;
		    	  		$query_group_services=$matrix_db->query($sql6);
		    	  		$fp=fopen(log_path,'a+');
					    $string=date('d-m-Y H')." ".$sql6."\r";         
					     fwrite($fp,$string);        
					      fclose($fp);


						$logText4 = "--------------------------------------\nDate: ".date('Y-m-d H:i:s')."\nNotes: \n**Created**\n--------------------------------------\n";
						$update_services="update services set log=CONCAT(log,'".$logText4."') where id='" .$serviceid."'";
						//echo $update_services; die;
						$query=$matrix_db->query($update_services);
							$fp=fopen(log_path,'a+');
				
					    $string=date('d-m-Y H')." ".$update_services."\r";         
					     fwrite($fp,$string);        
					      fclose($fp);


						$sql7="insert into tbl_history_devices(`sys_group_id`,`sys_service_id`) values('".$userId."','".$serviceid."')";
		    	  		 //echo  $sql7; die;
						$query=$matrix_db->query($sql7);
						$fp=fopen(log_path,'a+');
					  
					    $string=date('d-m-Y H')." ".$sql7."\r";         
					     fwrite($fp,$string);        
					      fclose($fp);



						 $sql8="insert into device_mapping(device_id,device_imei,sys_simcard,vehID,NewVehID,repair_with_IMEI,reason,device_placed,current_mapped_status) values('".$sys_device_id."','".$dev_imei."','".$sim_id."','".$serviceid."','','','','',1)";
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
		     	  	 
		     	  	   $sql9="insert into latest_telemetry (sys_service_id,sys_msg_type,sys_proc_time,sys_proc_host,sys_geofence_id,sys_device_id,gps_time,jny_distance,jny_duration,jny_idle_time,jny_leg_code,jny_device_jny_id,des_movement_id,des_vehicle_id,tel_hours,tel_input_0,tel_input_1,tel_input_2,tel_input_3,tel_temperature,tel_voltage,tel_odometer) values('".$serviceid."','0',now(),'None','0','".$sys_device_id."',date_add(now(),interval -330 minute),'0.0','0','0','0','0','0','0','0',false,false,false,false,'0.0','0.0','0')";

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

		    	  	    $sql10="insert into lastspeed_row(sys_service_id,sys_msg_type,sys_proc_time,sys_proc_host,sys_geofence_id,sys_device_id,gps_time,jny_distance,jny_duration,jny_idle_time,jny_leg_code,jny_device_jny_id,des_movement_id,des_vehicle_id,tel_hours,tel_input_0,tel_input_1,tel_input_2,tel_input_3,tel_temperature,tel_voltage,tel_odometer) values('".$serviceid."','0',now(),'None','0','".$sys_device_id."',date_add(now(),interval -330 minute),'0.0','0','0','0','0','0','0','0',false,false,false,false,'0.0','0.0','0')";
		    	  	    
		    	  	  $query_lastspeed_row=$matrix_db->query($sql10);
		    	  	  	$fp=fopen(log_path,'a+');
				
					    $string=date('d-m-Y H')." ".$sql10."\r";         
					     fwrite($fp,$string);        
					      fclose($fp);

					 
		
		    	 }
		    	 // if($flag==1 || $flag==2 || $flag==3 || $flag==4)
		    		// {		
		    		// 	echo 'rr'; 

		    		 	    
			    	  	         
			    	//   	    // $this->matrix_db->trans_rollback();
			    	//   	    // echo 'tt'; die;   
			    	  	       
			    	  
			    	  	  

			    	// }
			    // else
			    // 	{
			//-----------------------------transaction close------------------------------//
					 if ($matrix_db->trans_status() === FALSE)
			    	       {   
			    	  	    $matrix_db->trans_rollback();  
			    	  	    echo 'something bad happened';      
			    	  }
			    	  else
			    	  {
			    	  	  $matrix_db->trans_commit();
			    	   
			    	  	   	$Updateapprovestatus="update internalsoftware.new_device_addition set final_status=1 ,close_date='".date("Y-m-d H:i:s")."',req_close_by='".$_SESSION['user_name']."' where id='" .$row_id."'";
					   //echo $Updateapprovestatus; die;
						$query = $this->db->query($Updateapprovestatus);

						$fp=fopen(log_path,'a+');
				
					    $string=date('d-m-Y H')." ".$Updateapprovestatus."\r";         
					     fwrite($fp,$string);        
					      fclose($fp);
					      	  echo 'Successfully Submitted';

			    	  }

			       // }
				}
					
			}

		}
	}
	public function newdeviceadditionbackComment()
	{
		$row_id=$_GET['row_id']; 
		$comment=$_GET['comment']; 
		$deviceAdditionBack = $this->New_device_addition->new_device_additionBack($row_id,$comment);
		//print_r($deviceAdditionBack); die;
	}
	public function newdeviceadditionforwardbackComment()
	{
		$row_id1=$_GET['row_id']; 
		$comment1=$_GET['comment']; 
		$deviceAdditionBack = $this->New_device_addition->new_device_additionForwardBack($row_id1,$comment1);
	}
	public function change_devicebackComment()
	{
		 $row_id1=$_POST['rowid']; 
		 $comment1=$_POST['comment'];
		$deviceAdditionBack = $this->Device_replace->device_changeBack($row_id1,$comment1);
	}
	public function change_deviceforwardbackComment()
	{
		$row_id1=$_POST['rowid']; 
		$comment1=$_POST['comment']; 
		$deviceAdditionBack = $this->Device_replace->device_changeForwardBack($row_id1,$comment1);
	}
	public function device_change_view()
	{
		$row_id=$_GET['RowId']; 
		$tablename=$_GET['tablename'];
		$popupDetails['query'] = $this->Device_replace->popup_details($row_id,$tablename);
		//echo '<pre>'; print_r($popupDetails); die;
		 $this->load->view('support/ajax_device_replace',$popupDetails);
	}
	public function replace_device()
	{
	 	 $row_id=$_GET['row_id']; 
	 	 $device_imei=$_GET['device_imei']; 
	 	 $rdd_device_imei=$_GET['rdd_device_imei']; 
	 	 $user_id=$_GET['user_id'];  
	  	 $reg_no=$_GET['reg_no']; 
	  	 $mobile_no=$_GET['mobile_no']; 
	 	 $groupList['query'] = $this->Device_replace->checkGroupDevice($row_id,$device_imei,$rdd_device_imei,$user_id,$reg_no,$mobile_no);	
	}

}
