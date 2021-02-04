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

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  
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
      <?php include('info.php'); ?>
      <!-- End of Main Content -->



<div class="row">
    <form class="text-center border border-light p-4" method="get" Style="margin-left: 10px">
            <h1 class="h4 mb-0 text-gray-700" align="left"><Strong>Search from Date</Strong></h1>
            <br />
    <div class="row">
        <div class="col-sm-4">
            <!-- First name -->
            <input type="date" id="defaultRegisterFormFirstName" name="from" class="form-control" placeholder="From Date" required>
        </div>
        <div class="col-sm-4">
            <!-- Last name -->
            <input type="date" id="defaultRegisterFormLastName" name="to" class="form-control" placeholder="To Date" required>
        </div>
        <div class="col-sm-4">
            <button class="btn btn-info mb-0 btn-block" name="submitadd" type="submit">Search</button>
        </div>
    </div>
    </form>
        </hr>  
    	<div class="container-fluid" Style="margin-top: 7px;margin-left:15px;margin-right:15px;">
		<div class="demo-html"></div>
		 <div class="row" id="sel">
		    
		 </div>
		 
		<section Style="margin-top: 40px;">
		    
			<table id="example" class="display" Style="margin-bottom:20px;">
				<thead>
					<tr>
					    <th>Event Name</th>
						<th>Event Photos</th>
						<th>Venue Name</th>
						<th>Venue photos</th>
						<th>Dealer Name</th>
						<th>Dealer Photos</th>
						<th>Date</th>
							<th>View</th>
					</tr>
				</thead>
				<tbody>
				
				  <?php 
                      
                        $easydb = new easyfeature();
                        $id=$_GET['id'];
                        if(isset($_GET['from']) && isset($_GET['to'])){
                              $sql2="select * from apollo_upload where date between '$_GET[from]' AND '$_GET[to]' ";
                        }else{
                              $sql2="select * from apollo_upload where eventid='$id' group by dealerid";
                        }
                        

  
  $res2=$easydb->fetch($sql2);

  foreach($res2 as $row){
  
                      
                      ?>
				<tr>
				    	<th><?php $sql ="select * from apollo_clients where id='$row[clientid]' "; echo $easydb->fetchrow($sql,"name"); ?></th>
				    	<th><?php $sql2 ="select * from apollo_upload where eventid='$row[eventid]' "; echo $easydb->checkduplicate($sql2); ?></th>
				    	
				    		<th><?php $sql ="select * from apollo_events where id='$row[eventid]' "; echo $easydb->fetchrow($sql,"venu"); ?></th>	
				    	<th><?php $sql2 ="select * from apollo_upload where eventid='$row[eventid]' "; echo $easydb->checkduplicate($sql2); ?></th>
				    	
						<th><?php $sql ="select * from apollo_dealer where id='$row[dealerid]' "; echo $easydb->fetchrow($sql,"name"); ?></th>
						<th><?php $sql2 ="select * from apollo_upload where dealerid='$row[dealerid]' "; echo $easydb->checkduplicate($sql2); ?></th>
				    
				    	<th><?php echo $row['date']; ?></th>
				    	<th style="pointer: cursor" onclick="location.href='viewPhotos.php?eventid=<?php echo $row['eventid']; ?>'">View Data/Download</th>
				    
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</section>
	</div>
    
</div>



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
  
  
  	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="./media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="./resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="./resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	

$(document).ready(function() {
	$('#example').DataTable( {
	  responsive: true,
		initComplete: function () {
			this.api().columns().every( function () {
				var column = this;
				var select = $('<select style="margin-left:18px;margin-right:8px" id="Select"><option  value="">'+this.header().textContent +'</option></select>')
					.appendTo( $("#sel") )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
					} );

				column.data().unique().sort().each( function ( d, j ) {
					select.append( '<option value="'+d+'" Style="background-color:white;color: black">'+d+'</option>' )
				} );
			} );
		}
	} );
} );


	</script>
  
  
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  

</body>

</html>
