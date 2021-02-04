<!DOCTYPE html>
<html lang="en">
    <?php include('../db/config.php'); ?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Apollo Tyres</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./media/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<style type="text/css" class="init">
	@import "https://fonts.googleapis.com/css?family=Quicksand";
*,
*::before,
*::after {
  box-sizing: border-box;
}
	
	.display{
	background-color:#c3cfe2;
	border-radius: 12px
	}
	
	
html {
  background-color: #FAFAFA;
}
	
	body {
  font-family: "Quicksand", sans-serif;
  font-weight: 500;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
	}
	
	tr{
	font-size: 0.9em
	}
	
	td{
	font-size: 0.8em
	}
	#Select {
	border: 1.2px solid #027aed;
	border-radius: 5px;
	text-decoration:none;
	background-color: white;
	padding: 5px;
	color:black
	}
	</style>

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

 <?php include('header.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">




        <!-- Begin Page Content -->
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
                    <a href="tables.php">
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
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dealers</div>
                         <?php 
                           $easydb = new easyfeature();
  $sql="select * from apollo_dealer ";
  
  $resd=$easydb->checkduplicate($sql);
 
                      
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resd; ?></div>
                    </div>
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
      <!-- End of Main Content -->






<dic class="row">
<div class="chartContainer" style="height: 300px; width: 100%;"></div>
</div>

	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$(".chartContainer").CanvasJSChart({
				title: {
					text: "Column Chart - CanvasJS"
				},				
				data: [
				{			 
					type: "column",
					dataPoints: [
						{ x: 10, y: 71 },
						{ x: 20, y: 55},
						{ x: 30, y: 50 },
						{ x: 40, y: 65 },
						{ x: 50, y: 95 },
						{ x: 60, y: 68 },
						{ x: 70, y: 28 },
						{ x: 80, y: 34 },
						{ x: 90, y: 14}
					]
				}
				]
			});
		});
	</script>




      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  

</body>

</html>
