 <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-sm-10">
              <h1 class="title-bar-title">
               
              <span class="d-ib">Total Vehicle List</span>
             
            </h1>

            </div>
         
      </div>
      <?php  //print_r($message); die;
         if(isset($message))
          { 
            echo '<div><h5><font color="red">'.$message.'</font></h5></div>';
          }
          //die;
          ?>

        <p align="right"><a href="<?php echo base_url().'support/asTotalDevices' ?>" class="btn btn-warning faq_title">total devices</a><a href="<?php echo base_url().'support/stock' ?>" class="btn btn-warning faq_title">Unmapped</a><a href="<?php echo base_url().'support/installed' ?>"  class="btn btn-warning faq_title">Installed</a><a href="<?php echo base_url().'support/reacedAtDestination' ?>" class="btn btn-warning faq_title">Reached At Destination</a><a href="<?php echo base_url().'support/asNewDevices' ?>" class="btn btn-warning faq_title">New Devices</a></p>

 <div>&#160;</div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
      <!--   <strong>Device Addition List</strong> -->
                </div>
                <div class="card-body">
                  <table id="demo-datatables-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                    <tr>
        <!--<th>SL.No</th>-->
        <th>Date</th>
        <th>Customer Name</th>
        <th>Truck No</th>
        <th>Device Imei</th>
        
        <th></th>
    <th>Destination</th>
        <th>Transport Name</th>
        <th>Transport Mob No</th>
        <th>LR Number</th>
        <th>Driver Mob No</th>
        <th></th>
        <th></th>
<!--         <th>Edit</th> -->
      </tr>
                    </thead>
                    <tfoot>
                       <tr>
        <!--<th>SL.No</th>-->
        <th>Date</th>
        <th>Customer Name</th>
        <th>Truck No</th>
        <th>Device Imei</th>
       
        <th></th>
     <th>Destination</th>
        <th>Transport Name</th>
        <th>Transport Mob No</th>
        <th>LR Number</th>
        <th>Driver Mob No</th>
        <th></th>
        <th></th>
 <!--        <th>Edit</th> -->
      </tr>
                    </tfoot>
                
                   <tbody>
                      <?php $k=0;
                      
                      //echo '<pre>'; print_r($query); die;
                  foreach($query as $row){ 

                    //$roweditid=$row["id"]."-".strtotime($row["veh_departuredate"]);
                    ?>
                      <tr>
                 <!--<td><?php echo $i+1;?></td>-->
                  <td><?php echo $row["veh_departuredate"];?></td>
                  <td><?php echo $row["thana_name"];?></td>
                  <td><?php echo $row["veh_reg"];?></td>
                  <td><?php echo $row["device_imei"];?></td>
                 
                 <td></td>
          <td><?php echo $row["veh_destination"];?></td>
                  <td><?php echo $row["veh_driver_name"];?></td>
                  <td><?php echo $row["veh_phone_number"];?></td>
                  <td><?php echo $row["card_number"];?></td>
                  <td><?php echo $row["driver_contact_no"];?></td>
                 <td></td>
                  <td></td>
                 
            <!--   <td><a href="<?php echo base_url().'index.php/support/edit/'.$roweditid; ?>" class="btn btn-warning faq_title">Edit</a> </td> -->
                       
                      </tr>
                    <?php }?>
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
         
   <div id="modalGridSystemLg" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">View New device Addition</h4>
          </div>
          <div class="modal-body" id="popop1">
          </div>
        </div>
      </div>
    </div>
   