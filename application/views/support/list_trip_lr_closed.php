<div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-sm-10">
              <h1 class="title-bar-title">
 
              <span class="d-ib">LR Trip Details Closed</span><br>
            </h1>
          </div>
          
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-body">
            
                  <table id="demo-datatables-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Vehicle No.</th>
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
                        <th>Source</th>
                        <th>Destination</th>
                        <th>LR Number</th>
                        <th>Email Id</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                
                   <tbody>
                    <?php

                      foreach ($result as $row)  { ?>
                         
                     
                      <tr>
                        <td><?php echo $row["trip_start_date"]; ?></td>
                        <td><?php echo $row["veh_reg"]; ?></td>
                        <td><?php echo $row["tolocation"]; ?></td>
                        <td><?php echo $row["destination"]; ?></td>
                        <td><?php echo $row["l_r_number"]; ?></td>
                        <td><?php echo $row["email"];?></td>
                        <td><a style="pointer-events: none;cursor: default;" href="<?php echo base_url().'index.php/support/lr_close/'.$row->lr_id; ?>" class="btn btn-warning faq_title">CLOSED</a> </td>
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
            <h4 class="modal-title">View Device Change</h4>
          </div>
          <div class="modal-body" id="popop1">
          </div>
        </div>
      </div>
    </div>