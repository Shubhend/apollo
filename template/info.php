  <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 mb-0 text-gray-900"><Strong>Dashboard</Strong></h1>
             </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            
            
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <a href="tables.php" style="text-decoration:none">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Visitors</div>
                      <?php 
                           $easydb = new easyfeature();
  $sql="select * from apollo_upload group by clientid ";
  
  $resc=$easydb->checkduplicate($sql);
 
                      
                      ?>
                      
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resc; ?></div>
                    </div>
                    </a>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pictures</div>
                         <?php 
                           $easydb = new easyfeature();
  $sql="select * from apollo_upload  ";
  
  $resu=$easydb->checkduplicate($sql);
 
                      
                      ?>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resu; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <a href="adddealer.php#helloDealerList" style="text-decoration:none">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dealers</div>
                         <?php 
                           $easydb = new easyfeature();
  $sql="select * from apollo_dealer ";
  
  $resd=$easydb->checkduplicate($sql);
 
                      
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resd; ?></div>
                    </div>
                    </a>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                <a href="addevent.php#helloEventList" style="text-decoration:none">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Events</div>
                      <div class="row no-gutters align-items-center">
                          
                             <?php 
                           $easydb = new easyfeature();
  $sql="select * from apollo_events ";
  
  $resev=$easydb->checkduplicate($sql);
 
                      
                      ?>
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $resev; ?></div>
                        </div>
                        <div class="col">
                        </div>
                      </div>
                    </div>
                    </a>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Venues</div>
                      <div class="row no-gutters align-items-center">
                             <?php 
                           $easydb = new easyfeature();
  $sql="select * from apollo_events group by venu ";
  
  $resven=$easydb->checkduplicate($sql);
 
                      
                      ?>
                          
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $resven; ?></div>
                        </div>
                        <div class="col">
                         
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>

      </div>