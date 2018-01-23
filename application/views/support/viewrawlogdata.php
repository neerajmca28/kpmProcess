  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">View Raw Log Data</span>
               
            </h1>
            
          </div>
<?php  //print_r($message); die;
         // if(isset($message))
         //  {
         //    echo '<div><h5><font color="red">'.$message.'</font></h5></div>';
         //  }
          //die;
          ?>


             <div class="row">
            <div class="col-md-8">
              <div class="demo-form-wrapper">
   <?php

        echo form_open('support/form_addRawData');
       //echo $tt; die;
        ?>
        <form data-toggle="validator" method="post"  name="myformlisting"  id="myformlisting" class="form form-horizontal" >
 
                   
                      <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Device Type:*</label>
                 
                    <select name="devtype" id="demo-select2-3" class="form-control">RawdatafromURL
                    
                  <option role="presentation">Select</option>
                  <option role="presentation" <?php if ($_POST['devtype']=="Pointer") echo "selected";?>  value="Pointer">Pointer</option>
                  <option role="presentation" <?php if ($_POST['devtype']=="FleeteyeBSTPLITG") echo "selected";?>  value="FleeteyeBSTPLITG">FleeteyeBSTPLITG</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="BSTPLBSTPLITG") echo "selected";?> value="BSTPLBSTPLITG">BSTPLBSTPLITG</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="GeoTracker") echo "selected";?> value="GeoTracker">GeoTracker</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="AVL") echo "selected";?> value="AVL">AVL</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="AEM") echo "selected";?>  value="AEM">AEM</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="K10") echo "selected";?>  value="K10">K10</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="Argus") echo "selected";?> value="Argus">Argus</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="BSTPL") echo "selected";?>  value="BSTPL">BSTPL</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="fleeteye") echo "selected";?>  value="fleeteye">fleeteye</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="fleeteyeNEW") echo "selected";?>  value="fleeteyeNEW">fleeteyeNEW</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="atlanta_vts3mini") echo "selected";?>  value="atlanta_vts3mini">atlanta_vts3mini</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="FastTrac") echo "selected";?>  value="FastTrac">FastTrac</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="Atlanta") echo "selected";?> value="Atlanta">Atlanta</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="EIT") echo "selected";?>  value="EIT">EIT</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="Securitarian") echo "selected";?>  value="Securitarian">Securitarian</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="TelTonika") echo "selected";?>  value="TelTonika">TelTonika</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="VTS3") echo "selected";?>  value="VTS3">VTS3</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="VTS3_bhopal") echo "selected";?>   value="VTS3_bhopal">VTS3_bhopal</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="Gtrac_visiontec_nrxen") echo "selected";?>   value="Gtrac_visiontec_nrxen">Gtrac_visiontec_nrxen</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="TrakM8") echo "selected";?>  value="TrakM8">TrakM8</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="Vector") echo "selected";?>  value="Vector">Vector</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="astra") echo "selected";?> value="astra">astra</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="JM01") echo "selected";?>  value="JM01">JM01</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="Flipcart") echo "selected";?>  value="Flipcart">Flipcart</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="ERM") echo "selected";?>  value="ERM">ERM</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="ITriangular") echo "selected";?>   value="ITriangular">ITriangular</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="FastTracAC") echo "selected";?>   value="FastTracAC">FastTracAC</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="TK110") echo "selected";?>  value="TK110">TK110</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="T360101A") echo "selected";?>   value="T360101A">T360101A</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="ATrac") echo "selected";?>  value="ATrac">ATrac</option>
                  <option role="presentation"  <?php if ($_POST['devtype']=="Gtrac_GPS103B") echo "selected";?>   value="Gtrac_GPS103B">Gtrac_GPS103B</option>
                  <option role="presentation"   <?php if ($_POST['devtype']=="JR10J") echo "selected";?>  value="JR10J">JR10J</option>
                <option role="presentation"   <?php if ($_POST['devtype']=="JT600C_solar") echo "selected";?>  value="JT600C_solar">JT600C_solar</option>
                </select>
                     
                  

                     
                    </select>

                  </div>
                <div class="containerform">
                     <label class="col-sm-3 control-label" for="form-control-5" ></label>
                     <span style="margin-right:400px">
                     <input type="radio" id="format" name="datatype" value="format"  <?php if (isset($_POST['datatype']) && $_POST['datatype']=="format") echo "checked";?>/>Format data
                 
                    <input type="radio" id="dataRaw" name="datatype" value="raw" <?php if (isset($_POST['datatype']) && $_POST['datatype']=="raw") echo "checked";?>/>
                    Raw data</span>
                  </div>


                     <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-5">Device IMEI.*</label>
                    
                    <input type="text" name="deviceimei" value="<?php echo $deviceimei; ?>" class="form-control" id="devimei">
                    </div>
              <div class="containerform">
                    <label class="col-sm-3 control-label" for="form-control-2"  > Date:*</label>
                    
                      <input type="text" class="form-control" name="date" id="datepicker1"  value="<?php echo date('Y-m-d');?>"  required />
                    </div>
                  
     
                  <div class="form-group" style="margin-left: 215px;">
                   <button class="btn btn-success" type="submit">submit</button>
                    <button class="btn btn-success" type="reset">Cancel</button>
                  </div>

      </form>
          

          </div>
            <textarea rows="18" cols="150" name="rawlog" value=""><?=$rawData;?></textarea></div>
        
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
   if(document.myForm.devimei.value=="")
  {
      alert("Please Enter IMEI") ;
      document.myForm.customer_name_id.focus();
      return false;
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
