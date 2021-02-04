<!DOCTYPE html>
<?php include('../db/config.php'); ?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Apollo tyres</title>

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
          <h1 class="h3 mb-4 text-gray-800">Add Country</h1>
          
        <!-- Default form register -->
<form class="text-center border border-light p-5" action="" Method="Post">

  

  <input type="text" id="defaultRegisterFormEmail" name="dealername" class="form-control mb-4" placeholder="Country Code" required>

 <input type="text" id="defaultRegisterFormEmail" name="dealeruser" class="form-control mb-4" placeholder="Country Name" required>





   

  

    <!-- Sign up button -->
    <button class="btn btn-outline-primary" name="submitadd" type="submit">Add Country</button>

    <!-- Social register -->
  
    <hr>

    <!-- Terms of service -->
   

</form>
<!-- Default form register -->




<?php
function checkduplicate($username,$con){
      $easydb = new easyfeature();
  $sql="select * from apollo_ccode where ccode='$username' AND country='$con' ";
  
  $res=$easydb->checkduplicate($sql);
  if($res>0){
      
     return 0;
  }else{
   
   
   return 1;
    
  }
    
    
}

function getRandom() { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < 40; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 




 if(isset($_POST['submitadd'])){
   
     $date=date("Y-m-d");
     $event=$_POST['dealername'];
      $from=$_POST['dealeruser'];
      $to=$_POST['dealerpass'];
      $cid=$_POST['status'];
    
       $ran=getRandom();
      
       if(checkduplicate($event,$from)==1){
           
               
$sql="INSERT INTO `apollo_ccode` VALUES (NULL, '$event', '$from','$date')";
$res=$easydb->insert($sql);
if($res=="Data Has succesfully Recorded"){
    
    echo "<script type='text/javascript'>alert('$res');</script>";
    
}
           
           
           
           
           
       }else{
echo "<script type='text/javascript'>alert('Duplicate Data Exist');</script>";
           
       }
       
       
     
 }



?>


<?php 


 if(isset($_POST['submitupdate'])){
   
     $date=date("Y-m-d");
       $eventid=$_POST['eventid'];
        $date=date("Y-m-d");
     $event=$_POST['dealername'];
      $from=$_POST['dealeruser'];
      $to=$_POST['dealerpass'];
      $cid=$_POST['status'];
    
       $ran=getRandom();
       
       
      if(! $event=='' ){
           
               
//$sql="INSERT INTO `apollo_events` VALUES (NULL, '$event', '$date', '$from', '$to','$venu','$cid')";
$sql="UPDATE apollo_ccode SET ccode='$event' , country='$from'  WHERE id='$eventid' ";

$res=$easydb->update($sql);
if($res=="Data Has succesfully Updated"){
    
    echo "<script type='text/javascript'>alert('$res');</script>";
    
}
           
           
           
           
           
       }else{
echo "<script type='text/javascript'>alert('Fill All Fields');</script>";
           
       }
       
       
     
 }






?>




  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Country Code Records</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                       <th>Code</th>
                      <th>Country</th>
                      <th>Date</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Code</th>
                      <th>Country</th>
                      <th>Date</th>
                      <th>Action</th>
                   
                    </tr>
                  </tfoot>
                  <tbody>
            
                      <?php 
                      
                        $easydb = new easyfeature();
  $sql2="select * from apollo_ccode";
  
  $res2=$easydb->fetch($sql2);

  foreach($res2 as $row){
  
                      
                      ?>
                      
                      
                  <tr id="<?php echo $row['id']; ?>">
                      <td id="name"><?php echo $row['ccode']; ?></td>
                      <td id="username"><?php echo $row['country']; ?></td>
                      <td id="password"><?php echo $row['date']; ?></td>
                     
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


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>
    function edit(id){
        
        $("#eventid").val(id);
        $td=$("#"+id +" #name").text();
        
       $("#update #dealername").val($("#"+id +" #name").text()) ;
         $("#update #dealeruser").val($("#"+id +" #username").text()) ;
      
       
       
      
        
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
        
        
<form id="update" class="text-center border border-light p-5" action="" Method="Post">

  <input type="hidden" name="eventid" id="eventid"/ required>

  <input type="text"  id="dealername" name="dealername" class="form-control mb-4" placeholder="code" required>

 <input type="text"  id="dealeruser" name="dealeruser" class="form-control mb-4" placeholder="country" required>




   

  

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="submitupdate" type="submit">Update</button>

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
