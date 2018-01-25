 <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-sm-10">
              <h1 class="title-bar-title">
               
              <span class="d-ib">Tripped LR Details</span>
             
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

      <p align="right"><a href="<?php echo base_url().'index.php/support/lr_closed/'.$row->lr_id; ?>" class="btn btn-warning faq_title">CLOSED TRIP</a> </p>

 <div>&#160;</div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
      <!--   <strong>Device Addition List</strong> -->
                </div>
                <div class="card-body">
                  <table id="demo-datatables-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Vehicle Number</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>LR Number</th>
                        <th>Email Id</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                       <tr>
                        <th>Date</th>
                        <th>Vehicle Number</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>LR Number</th>
                        <th>Email Id</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                
                   <tbody>
                      <?php $k=0;
                      $matrix_db = $this->load->database('matrix_db', TRUE);
                      $sql ="SELECT kpm_lr_details.id as lr_id,kpm_tripdata.to_location as tolocation,kpm_lr_details.destination as destination,kpm_lr_details.l_r_number as l_r_number,kpm_lr_details.email_id as email,kpm_tripdata.* FROM kpm_lr_details LEFT JOIN kpm_tripdata ON kpm_lr_details.mapped_veh=kpm_tripdata.id WHERE l_r_status=1";
                      $result = $matrix_db->query($sql);

                      //echo "<pre>";print_r($result);die;
                      if ($result->num_rows() > 0) {
                        foreach ($result->result() as $row)  { //echo "<pre>"; print_r($row);?>
                         
                     
                      <tr>
                 <!--<td><?php echo $i+1;?></td>-->
                  <td><?php echo $row->trip_start_date; ?></td>
                  <td><?php echo $row->veh_reg; ?></td>
                  <td><?php echo $row->tolocation;?></td>
                  <td><?php echo $row->destination;?></td>
                  <td><?php echo $row->l_r_number;?></td>
                  <td><?php echo $row->email;?></td>
                 
                 
                 
              <td><a onclick="return cofirmation()" href="<?php echo base_url().'index.php/support/lr_close/'.$row->lr_id; ?>" class="btn btn-warning faq_title">CLOSE</a> </td>
                       
                      </tr>
                    <?php }}?>
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

    <script type="text/javascript">
      function cofirmation(){
        var pass = confirm("Are you sure want to close!");
        
        if (pass == true) {
            return true;
        } else {
            return false;
        }
      }
    </script>
   