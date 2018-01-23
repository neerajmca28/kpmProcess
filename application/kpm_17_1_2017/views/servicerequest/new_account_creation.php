      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">New Account Creation</span>
            </h1>
          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Basic Information</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="demo-form-wrapper">
                        <form name="myForm" class="form form-horizontal" method="post" action="<?= base_url(); ?>ServiceRequest/AccountCreation" onsubmit="return Check()">
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-1">Sales Manager</label>
                              <div class="col-sm-9 ">
                                <select class="custom-select" id="sales_manager">
                                    <option value="" selected="">-- Select One --</option>
                                    <?php if(isset($SalesManager)) : foreach($SalesManager as $row): ?>
                                    <option value="<?=$row->name ?>" ><?=$row->name ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                              </div>
                          </div>
                           <div class="form-group form-group-md">
                            <label class="col-sm-3 control-label" for="form-control-11">Company Name</label>
                            <div class="col-sm-9">
                              <input id="TxtCompany" name="company" class="form-control" type="text" placeholder="Company Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-3">Potential</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="TxtPotentail" name="potential">
                                  <option value="">-- Select One --</option>
                                  <option value="1-10">1-10</option>
                                  <option value="10-20">10-20</option>
                                  <option value="20-30">20-30</option>
                                  <option value="30-40">30-40</option>
                                  <option value="40-50">40-50</option>
                                  <option value="50-60">50-60</option>
                                  <option value="60-70">60-70</option>
                                  <option value="70-80">70-80</option>
                                  <option value="80-90">80-90</option>
                                  <option value="90-100">90-100</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-4">Type of Organisation</label>
                            <div class="col-sm-9">
                              <select class="custom-select" id="TxtOrganisation">
                                <option value="" name="type_of_org" id="TxtOrganisation">-- Select One --</option>
                                <option value="Individual">Individual</option>
                                <option value="Proprietorship">Proprietorship</option>
                                <option value="Partnership firm">Partnership firm</option>
                                <option value="Public">Public</option>
                                <option value="Private limited">Private limited</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-5">PAN No.</label>
                            <div class="col-sm-9">
                              <input id="form-control-11" class="form-control" type="text" placeholder="PAN No">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Copy of Pan Card</label>
                            <div class="col-sm-9">
                              <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                              <p class="help-block">
                                <small>Unlimited number of files can be uploaded to this field. Allowed types: png gif jpg jpeg.</small>
                              </p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Copy of Address Proof</label>
                            <div class="col-sm-9">
                              <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                              <p class="help-block">
                                <small>Unlimited number of files can be uploaded to this field. Allowed types: png gif jpg jpeg.</small>
                              </p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-6">Contact Person</label>
                            <div class="col-sm-9">
                              <input id="TxtContactPerson" class="form-control" type="text" placeholder="Contact Person">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-7" >Contact Number</label>
                            <div class="col-sm-9">
                              <input id="TxtContactNumber" class="form-control" type="text" placeholder="Contact Number">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-8">Billing Name</label>
                            <div class="col-sm-9">
                              <input id="TxtBillingName" class="form-control" type="text" placeholder="Billing Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-9">Billing Address</label>
                            <div class="col-sm-9">
                              <textarea id="form-control-8" class="form-control" rows="3"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Mode Of Payment</label>
                            <div class="col-sm-9">
                              <select class="custom-select" name="mode_of_payment" onchange="PaymentProcessBYCash(this.value)" >
                                <option value="" >--Select One --</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque"> Cheque</option>
                                <option value="Demo"> Demo</option>
                                <option value="FOC"> FOC</option>
                                <option value="Lease"> Lease</option>
                              </select>
                            </div>
                          </div>
                          <div id="CashCase" style="display:none">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="price" id="lblDprice">Device Price</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="device_price_total1" id="TxtDPricecash">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="rent" id="lblDRent">Rent</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="TxtDTotalREnt1" id="TxtDRentCash">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Rent Status</label>
                              <div class="col-sm-9">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="message" value="none"> Excluding
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="message" value="none"> Including
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Rent Month</label>
                              <div class="col-sm-9">
                                <select class="custom-select" onchange="PaymentProcessBYCash(this.value)" >
                                  <option value="" >--Select One --</option>
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div id="ChequeCase" style="display:none">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="price" id="lblDprice">Device Price</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="device_price" id="TxtDPrice">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="vat" id="lblDvat">Vat(5%)</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="device_price_vat" id="TxtDVat">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="total" id="lblDTotal">Total</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="device_price_total" id="TxtDTotal">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="rent" id="lblDRent">Rent</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="device_rent_Price" id="TxtDRent">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="service_tax" id="lblDServiceTax">Service Tex(14.5%)</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="device_rent_service_tax" id="TxtDServiceTax">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="TxtDTotalREnt" id="lblDrentTotal">Total Rent</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="TxtDTotalREnt" id="TxtDTotalREnt" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Rent Status</label>
                              <div class="col-sm-9">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="message" value="none"> Excluding
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="message" value="none"> Including
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Rent Month</label>
                              <div class="col-sm-9">
                                <select class="custom-select" onchange="PaymentProcessBYCash(this.value)" >
                                  <option value="" >--Select One --</option>
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div id="DemoCase" style="display:none">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="demo" id="demo">Demo</label>
                              <div class="col-sm-9">
                                <select class="custom-select" onchange="PaymentProcessBYCash(this.value)" >
                                  <option value="" >--Select One --</option>
                                  <option value="1 week">1 week</option>
                                  <option value="2 week">2 week</option>
                                  <option value="3 week">3 week</option>
                                  <option value="4 week">4 week</option>
                                  <option value="5 week">5 week</option>
                                  <option value="6 week">6 week</option>
                                  <option value="7 week">7 week</option>
                                  <option value="8 week">8 week</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div id="LeaseCase" style="display:none">
                            <div class="form-group">
                              <label class="col-sm-3 control-label" for="price" id="lblDprice">Amount</label>
                              <div class="col-sm-9">
                                <input class="form-control" type="text" name="device_amount_total" id="TxtDAmount">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Rent Status</label>
                              <div class="col-sm-9">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="message" value="none"> Excluding
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="message" value="none"> Including
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-3">Dimts</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="dimts" onchange="DimtsPayment(this.value)">
                                  <option value="" selected="">--Select One--</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group" id="DimtsCase" style="display:none">
                            <label class="col-sm-3 control-label">Dimts Fee Status</label>
                            <div class="col-sm-9">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="message" value="none"> Excluding
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="message" value="none"> Including
                                </label>
                              </div>
                            </div>
                          </div>  
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-3" >Vehicle Type</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="vehicle_type" id="TxtVehicleType"  >
                                  <option value="">--Select One --</option>
                                  <?php if(isset($VehicleType)) : foreach($VehicleType as $row): ?>
                                    <option value="<?=$row->veh_type ?>" ><?=$row->veh_type ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-3">Immobilizer</label>
                            <div class="col-sm-9">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="message" value="none"> Yes
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="message" value="none"> No
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-3">AC</label>
                            <div class="col-sm-9">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="message" value="none"> Yes
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="message" value="none"> No
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-3">Account Type</label>
                            <div class="col-sm-9">
                                <select class="custom-select">
                                  <option value="">--Select One --</option>
                                  <option value="Lease">Lease</option>
                                  <option value="Paid">Paid</option>
                                  <option value="Demo"> Demo</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-6">Email Id</label>
                            <div class="col-sm-9">
                              <input id="TxtEmailId" class="form-control" type="text" placeholder="Email Id">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-6" id="TxtUserName">User name</label>
                            <div class="col-sm-9">
                              <input id="TxtUserName" class="form-control" type="text" placeholder="User name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-6">Password</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" id="TxtUserPass" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-9">Comment</label>
                            <div class="col-sm-9">
                              <textarea id="form-control-8" class="form-control" rows="3"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="form-control-9"></label>
                            <div class="col-sm-9">
                              <button class="btn btn-primary" type="submit">Submit</button>
                              <button class="btn btn-primary" type="button">Cancel</button>
                            </div>  
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!--<script type="text/javascript">

          function Check()
          {
            if(document.myForm.sales_manager.value=="")
            {
                alert("Please Select Sales Manager") ;
                document.myForm.sales_manager.focus();
                return false;
            }
            if(document.myForm.TxtCompany.value=="")
            {
                alert("Please Enter Company Name") ;
                document.myForm.TxtCompany.focus();
                return false;
            } 
            if(document.myForm.TxtPotentail.value=="")
            {
                alert("Please Enter Potential") ;
                document.myForm.TxtPotentail.focus();
                return false;
            }
            if(document.myForm.TxtOrganisation.value=="")
            {
                alert("Please Enter Organisation") ;
                document.myForm.TxtOrganisation.focus();
                return false;
            }  
            if(document.myForm.TxtContactPerson.value=="")
            {
                alert("Please Enter Contact Person") ;
                document.myForm.TxtContactPerson.focus();
                return false;
            }
            if(document.myForm.TxtContactNumber.value=="")
            {
                alert("Please Enter Contact No. ") ;
                document.myForm.TxtContactNumber.focus();
                return false;
            }
             var TxtContactNumber=document.myForm.TxtContactNumber.value;
            if(TxtContactNumber!="")
            {
              var length=TxtContactNumber.length;
             
                  if(length < 9 || length > 15 || TxtContactNumber.search(/[^0-9\-()+]/g) != -1 )
                  {
                      alert('Please enter valid mobile number');
                      document.myForm.TxtContactNumber.focus();
                      document.myForm.TxtContactNumber.value="";
                      return false;
                  }
             }
            if(document.myForm.TxtBillingName.value=="")
            {
                alert("Please Enter Billing name") ;
                document.myForm.TxtBillingName.focus();
                return false;
            }
           
            if(document.myForm.mode_of_payment.value=="")
            {
                alert("Please Choose Mode") ;
                document.myForm.mode_of_payment.focus();
                return false;
            }
           
           
              if(document.myForm.mode_of_payment.value=="Cash")
              {
                if(document.myForm.TxtDPricecash.value=="")
                {
                    alert("Please Enter Device Price") ;
                    document.myForm.TxtDPricecash.focus();
                    return false;
                }
                if(document.myForm.TxtDRentCash.value=="")
                {
                    alert("Please Enter Rent") ;
                    document.myForm.TxtDRentCash.focus();
                    return false;
                }
              }
             
              if(document.myForm.mode_of_payment.value=="Cheque")
              {
             
                  if(document.myForm.TxtDPrice.value=="")
                  {
                      alert("Please Enter Device Price") ;
                      document.myForm.TxtDPrice.focus();
                      return false;
                  }
                 
                  if(document.myForm.TxtDRent.value=="")
                  {
                      alert("Please Enter Rent") ;
                      document.myForm.TxtDRent.focus();
                      return false;
                  }   
              }
             
              if(document.myForm.mode_of_payment.value=="Demo")
              {
                  if(document.myForm.TxtDemo.value=="")
                  {
                      alert("Please Enter Demo") ;
                      document.myForm.TxtDemo.focus();
                      return false;
                  }
              }
             
              if(document.myForm.mode_of_payment.value=="Lease")
              {
                if(document.myForm.TxtDAmount.value=="")
                {
                    alert("Please Enter Amount") ;
                    document.myForm.TxtDAmount.focus();
                    return false;
                }
              }
             
              if(document.myForm.TxtVehicleType.value=="")
              {
                  alert("Please Enter Vehicle type") ;
                  document.myForm.TxtVehicleType.focus();
                  return false;
              }
              if(document.myForm.TxtEmailId.value=="")
              {
                  alert("Please Enter E-mail ID") ;
                  document.myForm.TxtEmailId.focus();
                  return false;
              }
              if(document.myForm.TxtUserName.value=="")
              {
                  alert("Please Enter Username") ;
                  document.myForm.TxtUserName.focus();
                  return false;
              }
              if(document.myForm.TxtUserPass.value=="")
              {
                  alert("Please Enter Password") ;
                  document.myForm.TxtUserPass.focus();
                  return false;
              }
            }

            function PaymentProcessBYCash(radioValue)
            {
              if(radioValue=="Cash")
              {
                  document.getElementById('ChequeCase').style.display = "none";
                  document.getElementById('CashCase').style.display = "block";
                  document.getElementById('DemoCase').style.display = "none";
                  document.getElementById('LeaseCase').style.display = "none";
              }
              else if(radioValue=="Cheque")
              {
                  document.getElementById('ChequeCase').style.display = "block";
                  document.getElementById('CashCase').style.display = "none";
                  document.getElementById('DemoCase').style.display = "none";
                  document.getElementById('LeaseCase').style.display = "none";
              }
             
              else if(radioValue=="Demo")   
              {
                  document.getElementById('DemoCase').style.display = "block";
                  document.getElementById('ChequeCase').style.display = "none";
                  document.getElementById('CashCase').style.display = "none";
                  document.getElementById('LeaseCase').style.display = "none";
             
              }
              else if(radioValue=="FOC")   
              {
                  document.getElementById('DemoCase').style.display = "none";
                  document.getElementById('ChequeCase').style.display = "none";
                  document.getElementById('CashCase').style.display = "none";
                  document.getElementById('LeaseCase').style.display = "none";
              }
              else if(radioValue=="Lease")   
              {
                  document.getElementById('DemoCase').style.display = "none";
                  document.getElementById('ChequeCase').style.display = "none";
                  document.getElementById('CashCase').style.display = "none";
                  document.getElementById('LeaseCase').style.display = "block";
              }
            }


            function PaymentProcessBYCash12(radioValue)
            {
                if(radioValue=="Cash")
                {
                    document.getElementById('ChequeCase').style.display = "none";
                    document.getElementById('CashCase').style.display = "block";
                    document.getElementById('DemoCase').style.display = "none";
                    document.getElementById('LeaseCase').style.display = "none";
                }
                else if(radioValue=="Cheque")
                {
                    document.getElementById('ChequeCase').style.display = "block";
                    document.getElementById('CashCase').style.display = "none";
                    document.getElementById('DemoCase').style.display = "none";
                    document.getElementById('LeaseCase').style.display = "none";
                }
               
                else if(radioValue=="Demo")   
                {
                    document.getElementById('DemoCase').style.display = "block";
                    document.getElementById('ChequeCase').style.display = "none";
                    document.getElementById('CashCase').style.display = "none";
                    document.getElementById('LeaseCase').style.display = "none";
               
                }
                else if(radioValue=="FOC")   
                {
                    document.getElementById('DemoCase').style.display = "none";
                    document.getElementById('ChequeCase').style.display = "none";
                    document.getElementById('CashCase').style.display = "none";
                    document.getElementById('LeaseCase').style.display = "none";
                }
                else if(radioValue=="Lease")   
                {
                    document.getElementById('DemoCase').style.display = "none";
                    document.getElementById('ChequeCase').style.display = "none";
                    document.getElementById('CashCase').style.display = "none";
                    document.getElementById('LeaseCase').style.display = "block";
                }
            }

            function DimtsPayment(radioValue1)
            {
              if(radioValue1=="Yes")
              {
                  document.getElementById('DimtsCase').style.display = "block";
              }
              else if(radioValue1=="No")
              {
                  document.getElementById('DimtsCase').style.display = "none";
              }
            }           
          </script>  

      <div class="layout-footer">
        <div class="layout-footer-body">
          <small class="version">Version 1.2.0</small>
          <small class="copyright">2016 &copy; Elephant By <a href="http://naksoid.com/">Naksoid</a></small>
        </div>
      </div>
    </div>