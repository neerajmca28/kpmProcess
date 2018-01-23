
    <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">New Device Addition</span>
               
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

              <font color="red"><span><?php echo form_error('date'); ?></span>
               <span><?php echo form_error('transport_name'); ?></span>
               <span><?php echo form_error('truck_no'); ?></span>
                <span><?php echo form_error('device_imei'); ?></span>
                 <span><?php echo form_error('destination'); ?></span>
                 <span><?php echo form_error('warehouse'); ?></span>
                <span><?php echo form_error('transport_name'); ?></span>
                 <span><?php echo form_error('transport_mob_no'); ?></span></font>
   <?php 

        echo form_open('support/form_NewDeviceAddition'); 
        ?>
        <form data-toggle="validator" method="post"  name="myformlisting"  id="myformlisting" onsubmit="return validateForm()" class="form form-horizontal" >
 
                  <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2"  >Date:*</label>
                    
                      <input type="text" class="form-control" name="date" id="datepicker1" value=""  />
                    
                  </div>
               <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-3">Customer Name:*</label>
                    
                      <input type="text"  class="form-control" name="customer_name" id="customer_name_id"  >
                    
                  </div>
                  <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Truck No:*</label>
             
                      <input type="text" class="form-control" name="truck_no" id="truck_no_id"  >
                    </div>
                 
                 
              <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Device IMEI:*</label>
                   
                    <select id="demo-select2-2" name="device_imei" class="form-control" >
                     <option value=''>--Select IMEI--</option>
                    <?php foreach($assign_device as $row){ ?>{?>

                       <option value="<?php echo $row['device_imei'];?>" ><?php echo $row['device_imei'];?></option>
                      <?php } ?>
                    </select>
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
                   
                      <input type="text" name="warehouse" id="warehouse_id" class="form-control"  >
                    </div>
         
                 <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Transport Name:* </label>
          
                      <input type="text" name="transport_name" id="transport_name_id" class="form-control" value="" >
                    </div>
              
           <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Transport Mob No:*</label>
                   
                      <input type="value" name="transport_mob_no" id="transport_mob_no_id"  class="form-control" value=""  >
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
function validateForm()
{
  //alert('tt');
  // if(document.myformlisting.datepicker1.value=="")
  // {
  //     alert("Please Enter Date") ;
  //     document.myformlisting.datepicker1.focus();
  //     return false;
  // }
  //  if(document.myformlisting.customer_name_id.value=="")
  // {
  //     alert("Please Enter Customer Name") ;
  //     document.myformlisting.customer_name_id.focus();
  //     return false;
  // }
  // if(document.myformlisting.truck_no_id.value=="")
  // {
  //     alert("Please Enter Truck No") ;
  //     document.myformlisting.truck_no_id.focus();
  //     return false;
  // }
  // if(document.myformlisting.device_imei_id.value=="")
  // {
  //     alert("Please Select Device IMEI") ;
  //     document.myformlisting.device_imei_id.focus();
  //     return false;
  // }
  // if(document.myformlisting.destination_id.value=="")
  // {
  //     alert("Please Enter Destination") ;
  //     document.myformlisting.destination_id.focus();
  //     return false;
  // }
  // if(document.myformlisting.warehouse_id.value=="")
  // {
  //     alert("Please Enter Ware House") ;
  //     document.myformlisting.warehouse_id.focus();
  //     return false;
  // }
  // if(document.myformlisting.transport_name_id.value=="")
  // {
  //     alert("Please Enter Transport Name") ;
  //     document.myformlisting.transport_name_id.focus();
  //     return false;
  // }
  // if(document.myformlisting.transport_mob_no_id.value=="")
  // {
  //     alert("Please Enter Contact No. ") ;
  //     document.myformlisting.transport_mob_no_id.focus();
  //     return false;
  // }
  // var TxtContactNumber=document.myformlisting.transport_mob_no_id.value;
  // if(TxtContactNumber!="")
  //   {
  //       var length=TxtContactNumber.length;
  
  //       if(length < 9 || length > 11 || TxtContactNumber.search(/[^0-9\-()+]/g) != -1 )
  //       {
  //           alert('Please enter valid mobile number');
  //           document.myformlisting.transport_mob_no_id.focus();
  //           document.myformlisting.transport_mob_no_id.value="";
  //           return false;
  //       }
  //   }
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
