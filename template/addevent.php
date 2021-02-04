  <?php 
 // session_start();
  
 if(!isset($_COOKIE['userid'])){
     echo '<script>window.location = "../index.php";</script>';
  }
  ?>
<!DOCTYPE html>
<?php include('../db/config.php'); ?>
<html lang="en">

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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   <?php include('header.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->


            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add Events</h1>
          
        <!-- Default form register -->
<form class="text-center border border-light p-5" action="" Method="Post">

  

  <input type="text" id="defaultRegisterFormEmail" name="eventname" class="form-control mb-4" placeholder="Event Name" required>


    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="date" id="defaultRegisterFormFirstName" name="from" class="form-control" placeholder="From Date" required>
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="date" id="defaultRegisterFormLastName" name="to" class="form-control" placeholder="To Date" required>
        </div>
    </div>

  
 <select name="cid" class="browser-default custom-select form-row mb-4 col" required>
  <option value="" disabled selected>Select Country</option>
  <?php
    $easydb = new easyfeature();
  $sql="select * from apollo_ccode";
  
  $res=$easydb->fetch($sql);

  foreach($res as $row){
  
  ?>
  
  
  <option value="<?php echo $row['id']; ?>"><?php echo $row['country']; ?></option>

  <?php 
  
  } 
  ?>
  
</select>

            
   <input type="text" id="defaultRegisterFormEmail" name="venu" class="form-control mb-4" placeholder="Venue" required>
   

  

    <!-- Sign up button -->
    <button class="btn btn-outline-primary" name="submitadd" type="submit">Add Event</button>

    <!-- Social register -->
  
    <hr>

    <!-- Terms of service -->
   

</form>
<!-- Default form register -->




<?php

function checkduplicate($username){
      $easydb = new easyfeature();
  $sql="select * from apollo_events where eventname='$username'";
  
  $res=$easydb->checkduplicate($sql);
  if($res>0){
      
     return 0;
  }else{
   
   
   return 1;
    
  }
    
    
}


 if(isset($_POST['submitadd'])){
   
     $date=date("Y-m-d");
     $event=$_POST['eventname']."(".$_POST['venu'].")";
      $from=$_POST['from'];
      $to=$_POST['to'];
      $cid=$_POST['cid'];
       $venu=$_POST['venu'];
       
       
        if(checkduplicate($event)==1){
           
               
$sql="INSERT INTO `apollo_events` VALUES (NULL, '$event', '$date', '$from', '$to','$venu','$cid')";
$res=$easydb->insert($sql);
if($res=="Data Has succesfully Recorded"){
    
    echo "<script type='text/javascript'>alert('$res');</script>";
    
}
           
           
           
           
           
       }else{
echo "<script type='text/javascript'>alert('Fill All Fields');</script>";
           
       }
       
       
     
 }



?>


<?php 


 if(isset($_POST['submitupdate'])){
   
     $date=date("Y-m-d");
       $eventid=$_POST['eventid'];
     $event=$_POST['eventname'];
   
      $from=date_format(date_create($_POST['from']),"Y-m-d");;
      $to=  date_format(date_create($_POST['to']),"Y-m-d");;
      $cid=$_POST['cid'];
       $venu=$_POST['venu'];
       
   if(! $event==''){
           
               
//$sql="INSERT INTO `apollo_events` VALUES (NULL, '$event', '$date', '$from', '$to','$venu','$cid')";
$sql="UPDATE apollo_events SET eventname='$event' , countryid='$cid',  venu='$venu' , fromd='$from', tod='$to'  WHERE id='$eventid' ";

$res=$easydb->update($sql);
if($res=="Data Has succesfully Updated"){
    
    echo "<script type='text/javascript'>alert('$res');</script>";
    
}
           
           
           
           
           
       }else{
echo "<script type='text/javascript'>alert('Fill All Fields');</script>";
           
       }
       
       
     
 }






?>





  <div class="card shadow mb-4" id="helloEventList">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Event Records</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Venu</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Country</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Name</th>
                      <th>Venue</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Country</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php 
                      
                        $easydb = new easyfeature();
  $sql2="select * from apollo_events";
  
  $res2=$easydb->fetch($sql2);

  foreach($res2 as $row){
  
                      
                      ?>
                      
                      
                    <tr id="<?php echo $row['id']; ?>">
                      <td id="eventname"><?php echo $row['eventname']; ?></td>
                      <td id="venu"><?php echo $row['venu']; ?></td>
                      <td id="fromd"><?php echo $row['fromd']; ?></td>
                      <td id="tod"><?php echo $row['tod']; ?></td>
                      <td><?php  
                      $cid=$row['countryid'];
                       $sqlusercheck="SELECT * FROM apollo_ccode WHERE id='$cid' ";
                       $country=$easydb->fetchrow($sqlusercheck,'country');
                      
                      echo $country ?></td>
                      <td>
                          
                          <div class="text-center">
  <a onclick="edit(<?php echo $row['id']; ?>)" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">
    Edit</a>
</div>
                          
                      </td>
                    </tr>
         
         <?php } ?>
         
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>




















<?php






?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>
    function edit(id){
        
        $("#eventid").val(id);
          $("#update #eventname").val($("#"+id +" #eventname").text()) ;
         $("#update #venu").val($("#"+id +" #venu").text()) ;
         $("#update #fromd").val($("#"+id +" #fromd").text()) ;
               $("#update #tod").val($("#"+id +" #tod").text()) ;
      
        
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
  <!--- popup form -->

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
       <div class="modal-content">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
<form id="update" class="text-center border border-light p-5" action="" Method="Post" style="background: whitesmoke;">

  <input type="hidden" name="eventid" id="eventid" required>

  <input type="text" id="eventname" name="eventname" class="form-control mb-4" placeholder="Event Name" required>


    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="date" id="fromd" name="from" class="form-control" placeholder="From Date" required>
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="date" id="tod" name="to" class="form-control" placeholder="To Date" required>
        </div>
    </div>

  
 <select name="cid" class="browser-default custom-select form-row mb-4 col" required>
  <option value="" disabled selected>Select Country</option>
  <?php
    $easydb = new easyfeature();
  $sql="select * from apollo_ccode";
  
  $res=$easydb->fetch($sql);

  foreach($res as $row){
  
  ?>
  
  
  <option value="<?php echo $row['id']; ?>"><?php echo $row['country']; ?></option>

  <?php 
  
  } 
  ?>
  
</select>

            
   <input type="text" id="venu" name="venu" class="form-control mb-4" placeholder="Venu" required>
   

  

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="submitupdate" type="submit">Update Event</button>

    <!-- Social register -->
  
    <hr>

    <!-- Terms of service -->
   

</form>
</div>
  </div>
</div>









  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
