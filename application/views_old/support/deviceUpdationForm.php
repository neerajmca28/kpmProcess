        <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Device Updation</span>
               
            </h1>
            
          </div>
             <div class="row">
            <div class="col-md-8">
              <div class="demo-form-wrapper">
        <?= $formEdit ? form_open('support/form_Save') : form_open('support/form_Update'); ?>
        <?php if (isset($message)) { ?>
        <CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
        <?php } ?>
        <form data-toggle="validator" method="post"  name="myformlisting"  id="myformlisting" class="form form-horizontal" >
  
                  <?php 
                  //echo '<pre>'; print_r($id); die;
                  foreach($id as $key): //print_r($id);die;?>

                  
                  <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2"  >Dispatch Date:*</label>
               
                      <input type="text" class="form-control" name="date" id="datepicker1" value="<?php echo $key['veh_departuredate']; ?>" required />
                 
                  </div>

                  <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2"  >Trip Time:*</label>
                    
               <!--      
                <div class="controls input-append date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:ii">
                    <input class="form-control date-picker" name="dateStart" id="dateStart" size="16" type="text" value="<?= $startdate; ?>" >
                    <span class="add-on"><i class="icon-th"></i></span> 

                </div> -->
                 <!--  <input type="text" class="form-control demo-timepicker-5" name="actual_dateTime" id="datepicker2" value="" required /> -->
                <input id="demo-timepicker-5" name="time" class="form-control" type="text" required>
                  <span class="icon icon-clock-o input-icon"></span>

              </div>
                 <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-3">Customer Name:*</label>
                   
                      <input type="hidden" class="form-control" name="id" id="datepicker1" value="<?php print_r($recordId); ?>" required />
                      <input type="hidden" class="form-control" name="dateupdate" id="datepicker1" value="<?php print_r($datetoupdate); ?>" required />
                      <input type="text"  class="form-control" name="customer_name" id="customer_name_id" value="<?php echo $key['thana_name']; ?>" required >
                   
                  </div>
                  <br>
                <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Truck No:*</label>
                
                      <input type="text" class="form-control" readonly name="truck_no" id="truck_no_id" required value="<?php echo $key['veh_reg']; ?>">
                  
                  </div>


                  <div class="containerform">
                  <label class="col-sm-3 control-label" for="form-control-2">Source:*</label>
                       <select name="source" id="demo-select2-2" class="form-control">
                      <?php foreach($destination as $row){ 
                       ?>
                          <option value="<?=$row['name'];?>"<?php if($row['name']==$key['from_location']){echo 'selected';}?> ><?php echo $row['name'];?></option>
                      <?php } ?>
                     
                    </select>                
                  </div>


                <div class="containerform">
                  <label class="col-sm-3 control-label" for="form-control-2">Destination:*</label>
                       <select name="destination" id="demo-select2-1" class="form-control">
                      <?php foreach($destination as $row){ 
                       ?>
                          <option value="<?=$row['name'];?>"<?php if($row['name']==$key['veh_destination']){echo 'selected';}?> ><?php echo $row['name'];?></option>
                      <?php } ?>
                     
                    </select>                
                  </div>
                  <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-3">Ware House:*</label>
                   
                      <input type="text" name="warehouse" id="warehouse_id" value="<?php echo $key['warehouse']; ?>" class="form-control" required >
            
                  </div>
             <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Transport Name:* </label>
                  
                      <input type="text" name="transport_name" id="transport_name_id" class="form-control" required value="<?php echo $key['veh_driver_name']; ?>">
                    
                  </div>
              <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Transport Mob No:*</label>
                  
                      <input type="value" name="transport_mob_no" id="transport_mob_no_id"  class="form-control"  required value="<?php echo $key['veh_phone_number']; ?>" >
                  
                  </div>
              <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2">LR Number:</label>
                    
                      <input type="text"  name="lr_number" id="lr_number_id"  class="form-control" value="<?php echo $key['card_number'] ?>">
                    </div>
                  
                  <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-3">Driver Mob No:</label>
                
                      <input type="text" name="driver_mobile_no" id="driver_mobile_no_id" class="form-control" value="<?php echo $key['driver_contact_no']; ?>">
                 
                  </div>
              <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-4">Trip Plan:</label>
                   <select name="trip" id="trip_id"  class="form-control">
                     <option value="Monthly" <? if($key['tripplan']=='Monthly') {?> selected="selected" <? } ?>>Monthly</option>
                    <option value="Trip" <? if($key['tripplan']=='Trip') {?> selected="selected" <? } ?>>Trip</option>
                    <option value="Fix" <? if($key['tripplan']=='Fix') {?> selected="selected" <? } ?>>Fix</option>
                         </select>
            
                  </div>
               <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Rate:</label>
                    
                      <input  type="text" name="rate" id="rate_id"  value="<?php echo $key['rate'] ?>" class="form-control" value="">
              
                  </div>
                   <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Seal No.:</label>
                    
                      <input  type="text" name="sealno" id="sealno"  value="<?php echo $key['seal_no'] ?>" class="form-control" value="">
              
                  </div>
                   <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Weight:</label>
                    
                      <input  type="text" name="weight" id="weight"  value="<?php echo $key['weight'] ?>" class="form-control" value="">
              
                  </div>

                  <div class="form-group" style="margin-left: 274px;">

                  <?php if($formEdit) { ?>
                  <button class="btn btn-success" type="submit">SAVE</button>
                  <?php } else { ?>
                  <button class="btn btn-success" type="submit">UPDATE</button>

                  <?php }  ?>

                  <button class="btn btn-success" type="cancel">Cancel</button>
                  </div>
         
                  <?php endforeach; ?>
           
                
            </div>
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

 <div id="successModalAlert" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <span class="text-success icon icon-check icon-5x"></span>
              <h3 class="text-success">Success</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                <br>Animi ducimus id itaque totam saepe reiciendis corporis consectetur.</p>
              <div class="m-t-lg">
                <button class="btn btn-success" data-dismiss="modal" type="button">Continue</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

