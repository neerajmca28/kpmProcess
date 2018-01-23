  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">New device Mapping</span>
               
            </h1>
            
          </div>
<?php  //print_r($message); die;
         if(isset($message))
          {
            echo '<div><h5><font color="red">'.$message.'</font></h5></div>';
          }
          //die;
          ?>


             <div class="row">
            <div class="col-md-8">
              <div class="demo-form-wrapper">
   <?php

        echo form_open('support/form_NewDeviceAddition');
        ?>
        <form data-toggle="validator" method="post"  name="myformlisting"  id="myformlisting" class="form form-horizontal" >
 
              <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2"  >Dispatch Date:*</label>
                    
                      <input type="text" class="form-control" name="date" id="datepicker1" value="" onkeydown="return false"  required />
                    </div>

					<div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2"  >Trip Time:*</label>
                    
               <!--      
                <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:ii">
                    <input class="form-control date-picker" name="dateStart" id="dateStart" size="16" type="text" value="<?= $startdate; ?>" >
                    <span class="add-on"><i class="icon-th"></i></span> 

                </div> -->
                 <!--  <input type="text" class="form-control demo-timepicker-5" name="actual_dateTime" id="datepicker2" value="" required /> -->



                <input id="demo-timepicker-5" name="time" class="form-control" type="text" onkeydown="return false"  required>
                  <span class="icon icon-clock-o input-icon"></span>
                  <!-- <div class="right-item"> <input type="text" name="date" id="date" value="<?php echo date('Y-m-d H:i:s');?>" class="form-control form_date"></div>
 -->
              </div>
                  
          <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-3">Customer Name:*</label>
                    
                      <input type="text"  class="form-control" name="customer_name" id="customer_name_id" required >
            
                  </div>
             <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Truck No:*</label>
               
                      <input type="text" class="form-control" name="truck_no" id="truck_no_id" required >
                   
                  </div>
              
                     <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Device IMEI.*</label>
                    
                    <select id="demo-select2-3" name="device_imei"  class="form-control" >
                    <option value=''>--Select IMEI</option>
                   
                    <?php foreach($assign_device as $row){ ?>
                       <option value="<?php echo $row['device_imei'];?>" ><?php echo $row['device_imei'];?></option>
                      <?php } ?>
                    </select>
                    </div>

					<?php
                   $user_id_live = $this->session->userdata['user_id_live'];
                   $group_id = $this->session->userdata['group_id'];
                   if(($user_id_live=='77727') && ($group_id=='7781'))
                   {
                   ?>
                     <div class="containerform">
                   <label class="col-sm-3 control-label" for="form-control-2">Source:*</label>

                   <select name="source" id="demo-select2-2" class="form-control">



                       <option value="KPM" ><?php echo "KPM";?></option>

                   </select>

                 </div>
                  <?php }
                 else
                   {?>

                     <div class="containerform">
                   <label class="col-sm-3 control-label" for="form-control-2">Source:*</label>

                   <select name="source" id="demo-select2-2" class="form-control">
                     <option value=''>--Select Source--</option>

                     <?php foreach($destination as $row){ ?>{?>

                       <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                     <?php } ?>
                   </select>

                 </div>
                  <?php }?>
					
                    
                  
                  </div>

            
                    <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2">Destination:*</label>
                 
                    <select name="destination" id="demo-select2-1" class="form-control">
                      <option value=''>--Select Destination--</option>
                   
                      <?php foreach($destination as $row){ ?>{?>

                        <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                      <?php } ?>
                    </select>
                  
                  </div>
                 <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-3">Ware House:*</label>
                 
                      <input type="text" name="warehouse" id="warehouse_id" class="form-control" required >
                
                  </div>
               <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Transport Name:* </label>
                    
                      <input type="text" name="transport_name" id="transport_name_id" class="form-control" value="" required>
                    
                  </div>
                <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Transport Mob No:*</label>
                    
                      <input type="value" name="transport_mob_no" id="transport_mob_no_id"  class="form-control" value="" required >
                    </div>
                  


           <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2">LR Number:</label>
                
                      <input type="text"  name="lr_number" id="lr_number_id"  class="form-control" value="">
                    </div>
                  
                <div class="containerform">
                  <label class="col-sm-3 control-label" for="form-control-3">Driver Mob No:</label>
                      <input type="value" name="driver_mobile_no" id="driver_mobile_no_id" class="form-control">
                    
                  </div>
               <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Trip Plan:</label>
            
                            <select name="trip" id="trip_id"  class="form-control">
                     <option value="Monthly">Monthly</option>
                    <option value="Trip">Trip</option>
                    <option value="Fix">Fix</option>
                         </select>
                   
                  </div>
                <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Rate:</label>
                  
                      <input  type="text" name="rate" id="rate_id"  class="form-control" value="">
             
                  </div>
				     <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Seal No.:</label>
                  
                      <input  type="text" name="sealno" id="sealno"  class="form-control" value="">
             
                </div>
                <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Weight:</label>
                  
                      <input  type="text" name="weight" id="weight"  class="form-control" value="">
             
                </div>

                  <div class="form-group" style="margin-left: 215px;">
                   <button class="btn btn-success" type="submit">submit</button>
                    <button class="btn btn-success" type="reset">Cancel</button>
                  </div>
      </form>
           
          </div>
          </div>
          </div>
          

          </div>
          
          </div>
          </div>

          <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">
function Check()
{
  if(document.myForm.datepicker1.value=="")
  {
      alert("Please Enter Date") ;
      document.myForm.datepicker1.focus();
      return false;
  }
   if(document.myForm.customer_name_id.value=="")
  {
      alert("Please Enter Customer Name") ;
      document.myForm.customer_name_id.focus();
      return false;
  }
  if(document.myForm.truck_no_id.value=="")
  {
      alert("Please Enter Truck No") ;
      document.myForm.truck_no_id.focus();
      return false;
  }
  if(document.myForm.device_imei_id.value=="")
  {
      alert("Please Select Device IMEI") ;
      document.myForm.device_imei_id.focus();
      return false;
  }
  if(document.myForm.destination_id.value=="")
  {
      alert("Please Enter Destination") ;
      document.myForm.destination_id.focus();
      return false;
  }
  if(document.myForm.warehouse_id.value=="")
  {
      alert("Please Enter Ware House") ;
      document.myForm.warehouse_id.focus();
      return false;
  }
  if(document.myForm.transport_name_id.value=="")
  {
      alert("Please Enter Transport Name") ;
      document.myForm.transport_name_id.focus();
      return false;
  }
  if(document.myForm.transport_mob_no_id.value=="")
  {
      alert("Please Enter Contact No. ") ;
      document.myForm.transport_mob_no_id.focus();
      return false;
  }
  var TxtContactNumber=document.myForm.transport_mob_no_id.value;
  if(TxtContactNumber!="")
    {
        var length=TxtContactNumber.length;
  
        if(length < 9 || length > 11 || TxtContactNumber.search(/[^0-9\-()+]/g) != -1 )
        {
            alert('Please enter valid mobile number');
            document.myForm.transport_mob_no_id.focus();
            document.myForm.transport_mob_no_id.value="";
            return false;
        }
    }
 }
</script>

<script>
var j = jQuery.noConflict();
j(function()
{
    j( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });
   
    /*j( "#ToDate" ).datepicker({ dateFormat: "yy-mm-dd" });*/

});

</script>
