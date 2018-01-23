
<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
        <h1 class="title-bar-title">
        <span class="d-ib">Change Vehicle Number</span>
        </h1>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="demo-form-wrapper">
        <?php 
          echo form_open('support/vehicleNoChangeSubmision');?>
        <form data-toggle="validator" method="post"  name="myformlisting"  id="myformlisting" class="form form-horizontal" >
 
             <div class="containerform">
              <label class="col-sm-3 control-label" for="form-control-1">Old Vehicle No.:</label>
                               <select name="device_no_old"  class="form-control"  id="demo-select2-1"  required >
                      <option value=''>-- Select Vehicle No.--</option>
                      <?php foreach($vehList as $row){ ?>{?>
                       <option value="<?php echo $row['id'];?>" ><?php echo $row['veh_reg'];?></option>
                       <?php } ?>
                </select>
                    </div>
            <div class="containerform">
                <label class="col-sm-3 control-label" for="form-control-2">New Vehicle No.</label>
           
                      <input type="text" class="form-control" name="device_no_new" id="device_no_new" required >
                      
              
          </div>
           <div class="containerform">
                <label class="col-sm-3 control-label" for="form-control-3"  >Date:*</label>
     
                      <input type="text" class="form-control" name="date" id="datepicker1" value="" required />
             
          </div>
   <div class="containerform">
              <label class="col-sm-3 control-label" for="form-control-4">Customer Name:*</label>
             
                      <input type="text"  class="form-control" name="customer_name" id="customer_name_id" required >
            
          </div>
             <div class="containerform">
               <label class="col-sm-3 control-label" for="form-control-5">Destination:*</label>
                                  <select name="destination" id="demo-select2-2"  class="form-control" required>
                      <option value=''>--Select Destination--</option>
                      <?php foreach($destination as $row){ ?>{?>
                      <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                       <?php } ?>
                    </select>
                </div>
       
             <div class="containerform">
              <label class="col-sm-3 control-label" for="form-control-6">Ware House:*</label>
       
                  <input type="text" name="warehouse" id="warehouse_id" class="form-control" required >
                        </div>
           <div class="containerform">
                <label class="col-sm-3 control-label" for="form-control-7">Transport Name:* </label>
             
                      <input type="text" name="transport_name" id="transport_name_id" class="form-control" value="" required>
                      </div>
             <div class="containerform">
               <label class="col-sm-3 control-label" for="form-control-8">Transport Mob No:*</label>
       
                   <input type="value" name="transport_mob_no" id="transport_mob_no_id"  class="form-control" value="" required >
            
          </div>
           <div class="containerform">
                <label class="col-sm-3 control-label" for="form-control-9">LR Number:</label>
              
                      <input type="text"  name="lr_number" id="lr_number_id"  class="form-control" value="">
                </div>
          
        <div class="containerform">
                <label class="col-sm-3 control-label" for="form-control-10">Driver Mob No:</label>
          
                      <input type="value" name="driver_mobile_no" id="driver_mobile_no_id" class="form-control">
                </div>
          
        <div class="containerform">
                <label class="col-sm-3 control-label" for="form-control-11">Trip Plan:</label>
             
                  <select name="trip" id="trip_id"  class="form-control">
                     <option value="Monthly">Monthly</option>
                    <option value="Trip">Trip</option>
                    <option value="Fix">Fix</option>
                   </select>
                </div>
          
             <div class="containerform">
                <label class="col-sm-3 control-label" for="form-control-12">Rate:</label>
                
                      <input  type="text" name="rate" id="rate_id"  class="form-control" value="">
               
          </div>

         <div class="form-group" style="margin-left: 215px;">
                <button class="btn btn-success" type="submit">Change</button>
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