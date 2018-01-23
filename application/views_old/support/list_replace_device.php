<div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-sm-10">
              <h1 class="title-bar-title">
 
              <span class="d-ib"> Device Change List </span>
            </h1>
          </div>
          <div class="col-sm-2">
                              <form name="myformlisting" method="post">
                               <select id="Showrequest" name="Showrequest" class="form-control" onchange="form.submit();">
                                  <option value="5" <?php if ($id=="5") echo "selected";?>>Pending</option>
                                  <option value="1" <?php if ($id=="1") echo "selected";?>>Closed</option>
                                  <option value="4" <?php if ($id=="4") echo "selected";?>>Action Taken</option>
                                  <option value="2" <?php if ($id=="2") echo "selected";?>>All</option>
                                </select>
                              </form>
                              </div>
          </div>
          <div>&#160;</div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-body">
            
                  <table id="demo-datatables-1" class="table table-striped table-nowrap dataTable"  cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>SL.No</th>
                        <th>Date</th>
                        <th>Account Manager</th>
                        <th>User Name</th>
                        <th>Company Name</th>
                        <th>Vehicle Number</th>
                        <th>Replaced Device Type</th>
                         <th>Device IMEI</th>
                        <th>Replaced Device IMEI</th>
                        <th>Reason</th>
                        <th>Installer</th>
                        <th>View Detail</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>SL.No</th>
                        <th>Date</th>
                        <th>Account Manager</th>
                        <th>User Name</th>
                        <th>Company Name</th>
                        <th>Vehicle Number</th>
                        <th>Replaced Device Type</th>
                         <th>Device IMEI</th>
                        <th>Replaced Device IMEI</th>
                        <th>Reason</th>
                        <th>Installer</th>
                        <th>View Detail</th>
                      </tr>
                    </tfoot>
              
                    <tbody>
                      <?php 
                      $n=0;
                    //echo '<pre>';  print_r($query); die;
                      foreach($query as $row): ?>
                      <tr>
                        <td><?= $n+1; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td><?= $row['sales_manager']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['client']; ?></td>
                        <td><?= $row['reg_no']; ?></td>
                        <td><?= $row['rdd_device_type']; ?></td>
                        <td><?= $row['device_imei']; ?></td>
                        <td><?= $row['rdd_device_imei']; ?></td>
                        <td style="word-break:break-all;"><?= $row['rdd_reason']; ?></td>
                        <td><?= $row['inst_name']; ?></td>
                        <td>
                          <?php if($id == 5 || $id == 4){ 
                            ?>

                            <a href="#" onclick="showRecordForReplaceDevice(<?php echo $row["id"];?>,'device_change','popop1');" data-toggle="modal" data-target="#modalGridSystemLg" class="btn btn-warning faq_title">View</a>                           
                            <a href="#" onclick="clientAddFinalReplaceDev(<?php echo $row["id"];?>,'<?php echo $row["device_imei"];?>','<?php echo $row["rdd_device_imei"];?>','<?php echo $row["user_id"];?>','<?php echo $row["reg_no"];?>','<?php echo $row["mobile_no"];?>')" class="btn btn-warning faq_title">Done</a>
                            <a href="#" onclick="backComment_device_change(<?php echo $row["id"];?>)" class="btn btn-warning faq_title">Back</a>
                            <? if( $row["forward_comment"]!="" && $row["forward_req_user"]!="" ){ ?>
                               <a href=""  data-toggle="modal" data-target="#modalGridSystemLg" onclick="forwardbackComment_device_change(<?php echo $row["id"];?>); " class="btn btn-warning faq_title">Forward Back</a>
                          <?php } }?>

                          <?php if($id == 1 || $id == 2): ?>
                            
                             <a href="#" onclick="showRecordForReplaceDevice(<?php echo $row["id"];?>,'device_change','popop1');" data-toggle="modal" data-target="#modalGridSystemLg" class="btn btn-warning faq_title">View</a>                        
                            
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php $n++;endforeach; ?>
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
 
    <script type="text/javascript">
        // function backComment_device_change(row_id)
        // {
        //   //alert('tt');
        //    var retVal = prompt("Write Comment : ", "Comment");
        //   if (retVal)
        //   {
        //       back_addComment(row_id,retVal);
        //       return true;
        //   }
        //   else
        //     return false;
        // }

        // function back_addComment(row_id,retVal)
        // {
        //   var data_string = 'rowid='+ row_id +'&comment='+ retVal;
        //   $.ajax({
        //     type:"POST",
        //      url: Path+ "index.php/Backend_api/change_devicebackComment",
        //     data:data_string,
        //     success:function(msg){
        //       alert(msg)
        //    location.reload(true);    
        //     }
        //   });
        // }


        // function forwardbackComment_device_change(row_id)
        // {
        //   //alert('tt');
        //    var retVal = prompt("Write Comment : ", "Comment");
        //   if (retVal)
        //   {
        //     forward_backaddComment2(row_id,retVal);
        //       return true;
        //   }
        //   else
        //     return false;
        // }

        // function forward_backaddComment2(row_id,retVal)
        // {
        //   var data_string = 'rowid='+ row_id +'&comment='+ retVal;
        //   $.ajax({
        //     type:"POST",
        //      url: Path+ "index.php/Backend_api/change_deviceforwardbackComment",
        //     data:data_string,
        //     success:function(msg){
        //       alert(msg)
        //    location.reload(true);    
        //     }
        //   });
        // }
    
    
    </script>
   
  
  
    