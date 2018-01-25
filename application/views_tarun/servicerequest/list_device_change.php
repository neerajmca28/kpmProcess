      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">DataTables</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
            <p class="title-bar-description">
              <small>The tables presented below use <a href="https://datatables.net/" target="_blank">DataTables</a> plugin, the styling of which is completely rewritten in SASS, without modifying however anything in JavaScript.</small>
            </p>
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
                  <strong>Basic Table (+Bootstrap Responsive Table)</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>SL.No</th>
                        <th>Date</th>
                        <th>Account Manager</th>
                        <th>Company</th>
                        <th>Potential</th>
                        <th>Device Price</th>
                        <th>Rent</th>
                        <th>Mode of Payment</th>
                        <th>Vehicle_type</th>
                        <th>View Detail</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>SL.No</th>
                        <th>Date</th>
                        <th>Account Manager</th>
                        <th>Company</th>
                        <th>Potential</th>
                        <th>Device Price</th>
                        <th>Rent</th>
                        <th>Mode of Payment</th>
                        <th>Vehicle_type</th>
                        <th>View Detail</th>
                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach($query as $row): ?>
                      <tr>
                        <td><?= $row->id; ?></td>
                        <td><?= $row->date; ?></td>
                        <td><?= $row->contact_person; ?></td>
                        <td><?= $row->company; ?></td>
                        <td><?= $row->potential; ?></td>
                        <td><?= $row->device_price; ?></td>
                        <td><?= $row->device_rent_Price; ?></td>
                        <td><?= $row->mode_of_payment; ?></td>
                        <td><?= $row->vehicle_type; ?></td>
                        <td>
                          <button class="btn btn-warning" type="button">Oh Hi, Folks!</button>
                        </td>
                        <td><button>DEF</button></td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="layout-footer">
        <div class="layout-footer-body">
          <small class="version">Version 1.2.0</small>
          <small class="copyright">2016 &copy; Elephant By <a href="http://naksoid.com/">Naksoid</a></small>
        </div>
      </div>
    </div>