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
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    
     <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet">
     
      <link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css" rel="stylesheet">
  
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
    <div class="col-sm-1" align="left"></div>
    <div class="col-sm-3" align="left"><h3 style="color: #000"><strong>View photos and Download Photos</strong></h3></div>
    <div class="col-sm-1" align="left"></div>
</div>
<?php
 $easydb = new easyfeature();
if($_GET['type']=='visitor'){

    $clid=$_GET['clientid'];
    //echo $clid;
     $sql ="select * from apollo_upload where clientid='$clid' "; 
   //  echo $easydb->fetchrow($sql,"name");
    
}else{
    $elid=$_GET['eventid'];
     $sql ="select * from apollo_upload where eventid='$elid' "; 
    
}
   ?>
    
    
    

<!--<div class="row">
    <div class="col-sm-3" align="right"><p style="color: #000"><strong>Event Name:</strong></p></div>
    <div class="col-sm-3" align="left">aaaaaa</div>
    <div class="col-sm-3" align="right"><p style="color: #000"><strong>Dealer Name:</strong></p></div>
    <div class="col-sm-3" align="left">aaaaaa</div>
</div>-->

<?php 
  $res2=$easydb->fetch($sql);

  foreach($res2 as $row){

?>

<div class="row" style="margin-bottom: 10px">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" style="background-color:#E1E1E1">
            <div class="row">
                <div class="col-sm-2" style="margin-top: 3px;margin-bottom: 3px">
                    <a href="../photoupload/<?php echo $row['dealerid']."/".$row['clientid']."/",$row['image']; ?>" target="_blank">
                      <img src="../photoupload/<?php echo $row['dealerid']."/".$row['clientid']."/",$row['image']; ?>" alt="Forest" style="width:130px">
                    </a>
                </div>
             
                <div class="col-sm-2" style="margin-top: 15px">
                    <a download="image.png" href="../photoupload/<?php echo $row['dealerid']."/".$row['clientid']."/",$row['image']; ?>" style="text-decoration: none;color: #000;cursor: pointer" ><img src="download.png" style="width: 40px;height:40px"></a>
                </div>
                </a>
            </div>
        </div>
        <div class="col-sm-1"></div>
</div>
<?php } ?>



<script>
    function edit(id,did){
        
        $("#eventid").val(id);
      
        
    }
    
    
    
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
  
  
  	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="./media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="./resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="./resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	

$(document).ready(function() {
    
 
    
    
	$('#example').DataTable( {
	  responsive: true,
	      dom: 'Bfrtip',
   buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ] ,
        select: true,
		initComplete: function () {
			this.api().columns().every( function () {
				var column = this;
				var select = $('<select style="margin-left:40px;margin-right:10px" id="'+this.header().textContent +'"><option  value="">'+this.header().textContent +'</option></select>')
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

  // $("#Download").hide();
	</script>
  
  
 
  
  
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
       <div class="modal-content">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>







</div>
  </div>
</div>



  
  
  
  
  
  
  
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
