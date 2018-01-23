var Path="http://localhost/internal/";
function Show_record(RowId,tablename,DivId)
{
$.ajax({
    type:"GET",
    //url:"userInfo.php?action=getrowSales",
    url: Path+ "index.php/Backend_api/device_addition_view",
     data:"RowId="+RowId+"&tablename="+tablename,
    success:function(msg){
      //alert(msg);
    document.getElementById("popop1").innerHTML = msg;
            
    }
  });

}
function backComment(row_id)
{
  var retVal = prompt("Write Comment : ", "Comment");
  if (retVal)
  {
      addComment1(row_id,retVal);
      return ture;
  }
  else
    return false;
}

function addComment1(row_id,retVal)
{
$.ajax({
    type:"GET",
    //url:"userInfo.php?action=newdeviceadditionbackComment",
     url: Path+ "index.php/Backend_api/newdeviceadditionbackComment",
     
     data:"row_id="+row_id+"&comment="+retVal,
    success:function(msg){
       alert(msg);
    location.reload(true);    
    }
  });
}

function by_imei_no()
{
  var imei_no = document.getElementById('imei_no').checked;
  if(imei_no == true)
    {   
        document.getElementById('chk_1_box').style.display = "block";
        document.getElementById('chk_2_box').style.display = "none";
        document.getElementById('chk_3_box').style.display = "none";
    }
    else
    {
        document.getElementById('chk_1_box').style.display = "none";
        document.getElementById('chk_2_box').style.display = "none";
        document.getElementById('chk_3_box').style.display = "none";
    }
   
}

function by_sim_no()
{
  var sim_no = document.getElementById('sim_no').checked;

  if(sim_no == true)
    {   
        document.getElementById('chk_1_box').style.display = "none";
        document.getElementById('chk_2_box').style.display = "block";
        document.getElementById('chk_3_box').style.display = "none";
        document.getElementById('imei_no').checked==false;
        document.getElementById('veh_no').checked==false;
    }
    else
    {
        document.getElementById('chk_1_box').style.display = "none";
        document.getElementById('chk_2_box').style.display = "none";
        document.getElementById('chk_3_box').style.display = "none";
      
    }
   
}
function by_veh_no()
{
  var veh_no = document.getElementById('veh_no').checked;

  if(veh_no == true)
    {   
        document.getElementById('chk_1_box').style.display = "none";
        document.getElementById('chk_2_box').style.display = "none";
        document.getElementById('chk_3_box').style.display = "block";
        document.getElementById('imei_no').checked==false;
        document.getElementById('sim_no').checked==false;
    }
    else
    {
       document.getElementById('chk_1_box').style.display = "none";
        document.getElementById('chk_2_box').style.display = "none";
        document.getElementById('chk_3_box').style.display = "none";
      
    }
   
}

function showRecordForReplaceDevice(RowId,tablename,DivId)
{
$.ajax({
    type:"GET",
    url: Path+ "index.php/Backend_api/device_change_view",
    data:"RowId="+RowId+"&tablename="+tablename,
    success:function(msg){
      //alert(msg);
    document.getElementById("popop1").innerHTML = msg;
            
    }
  });
}

// function update_replaceDevice(RowId)
// {
//   //alert(RowId);
//   //return false;
//   //alert(Path+ "index.php/Backend_api/device_addition_view");
// $.ajax({
//     type:"GET",
//     //url:"userInfo.php?action=getrowSales",
//     url: Path+ "index.php/Backend_api/replace_device",
//      data:"RowId="+RowId,
//     success:function(msg){
//       //alert(msg);
//     document.getElementById("popop1").innerHTML = msg;
            
//     }
//   });

// }

function clientAddFinalReplaceDev(row_id,device_imei,rdd_device_imei,user_id,reg_no,mobile_no)
{
  var x = confirm("Are you sure you want to Replace this?");
  if (x)
  {
       approve_replace(row_id,device_imei,rdd_device_imei,user_id,reg_no,mobile_no);
       return true;
  }
  else
    return false;
}
function approve_replace(row_id,device_imei,rdd_device_imei,user_id,reg_no,mobile_no)
{
$.ajax({
    type:"GET",
        url: Path+ "index.php/Backend_api/replace_device",
        data : { row_id : row_id, device_imei :device_imei, rdd_device_imei :rdd_device_imei, user_id :user_id,reg_no :reg_no,mobile_no:mobile_no},
        success:function(msg){
                alert(msg);
                location.reload(true);    
    }
  });
}
function forwardbackComment(row_id)
{
   var retVal = prompt("Write Comment : ", "Comment");
  if (retVal)
  {
  addComment2(row_id,retVal);
      return true;
  }
  else
    return false;
}

function addComment2(row_id,retVal)
{
  //alert(user_id);
  //return false;
$.ajax({
    type:"GET",
    url: Path+ "index.php/Backend_api/newdeviceadditionforwardbackComment",
     
     data:"row_id="+row_id+"&comment="+retVal,
    success:function(msg){
       alert(msg);
       
     
    location.reload(true);    
    }
  });
}
 function clientAddFinal(row_id,device_id,userId,vehicle_no,sales_id,dimts)
{
  //alert(dimts);
  var x = confirm("Are you sure you want to Close this?");
  if (x)
  {
      //alert('tt');
       approve_add(row_id,device_id,userId,vehicle_no,sales_id,dimts);
       return true;
  }
  else
    return false;
}
function approve_add(row_id,device_id,userId,vehicle_no,sales_id,dimts)
{

$.ajax({
    type:"GET",
      //url: <?= base_url(); ?>backend_api/new_device_additionclose,
      url: Path+ "index.php/Backend_api/new_device_additionclose",
     // data:"device_id="+device_id & "row_id="+ row_id,
        data : { device_id : device_id, row_id :row_id, userId :userId, vehicle_no :vehicle_no,sales_id :sales_id,dimts :dimts },
      success:function(msg){
      alert(msg);
    location.reload(true);    
    }
  });
}

function backComment_device_change(row_id)
{
      //alert(row_id);
      var retVal = prompt("Write Comment : ", "Comment");
      if (retVal)
          {
              back_addComment(row_id,retVal);
              return true;
          }
          else
            return false;
        }

        function back_addComment(row_id,retVal)
        {
          var data_string = 'rowid='+ row_id +'&comment='+ retVal;
          //alert(data_string);
          $.ajax({
            type:"POST",
             url: Path+ "index.php/Backend_api/change_devicebackComment",
            data:data_string,
            success:function(msg){
              alert(msg)
           location.reload(true);    
            }
          });
        }


  function forwardbackComment_device_change(row_id)
  {
      //alert('tt');
      var retVal = prompt("Write Comment : ", "Comment");
      if (retVal)
      {
          forward_backaddComment2(row_id,retVal);
          return true;
      }
     else
        return false;
 }

function forward_backaddComment2(row_id,retVal)
{
      var data_string = 'rowid='+ row_id +'&comment='+ retVal;
      $.ajax({
      type:"POST",
      url: Path+ "index.php/Backend_api/change_deviceforwardbackComment",
            data:data_string,
            success:function(msg){
              alert(msg)
           location.reload(true);    
            }
          });
}
    
  