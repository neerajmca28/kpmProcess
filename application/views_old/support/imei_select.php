
    <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Imei Select Form</span>
               
            </h1>
            
          </div>
<?php  //print_r($message); die;
         // if(isset($data))
         //  { 
         //    echo '<div><h5><font color="red">'.$data.'</font></h5></div>';
         //  }
         //  //die;
          ?>
             <div class="row">
            <div class="col-md-8">
              <div class="demo-form-wrapper">

   <?php 
   //print_r($device_imei); 
   //print_r($device_no); die;
        echo form_open('support/imeit'); 
        ?>
        <form data-toggle="validator" method="post"  name="myformlisting" id="myformlisting" onsubmit="return validateForm()" class="form form-horizontal" >
            <div class="containerform">
            <label class="col-sm-3 control-label" for="form-control-2"  >Device Sno</label>
             <input name="sno" class="form-control" value="<?php if(isset($device_no)){echo $device_no;}else{} ?>"" type="text">
               </div>
                <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-3">Device Imei</label>
             
                     <input name="imei" class="form-control" value="<?php  if(isset($device_imei)){ echo $device_imei;}else{} ?>" type="text">
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

<script>
var j = jQuery.noConflict();
j(function()
{
    j( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });
   
    /*j( "#ToDate" ).datepicker({ dateFormat: "yy-mm-dd" });*/

});

</script>