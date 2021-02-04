<?php
  
             
             
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: false');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin");
header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies

require('../db/config.php');
include('password.php');

$user = new adduser();

$user->check();

class adduser{
 

public function check(){
     

    $send=['error'=>0,'msg'=>'','status'=>0];
     if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) ){
         
           if($_POST['username']=='' || $_POST['password']=='' || $_POST['name']=='') {
         $send=['error'=>1,'msg'=>'Field should not be blank','status'=>0];
          echo json_encode($send);
        }else{ 
            
           
        $this->insertdata($_POST['username'],$_POST['password'],$_POST['name']);
        }
  
   } else{
       
      
    $send=['error'=>1,'msg'=>'Post Parameter Not Mached eg:username , password and name','status'=>0];
    echo json_encode($send);
     
         
  
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

public function insertdata($username,$password,$name){
    
//$date=date("jS F Y");
$date=date("Y-m-d");
$password=md5($password);
    $send=['error'=>0,'msg'=>'','status'=>0];
    try{
        $easydb = new easyfeature();


 $sqlusercheck="SELECT username FROM appuser WHERE username='$username'";
  
  $resch=$easydb->checkduplicate($sqlusercheck);
  
  if($resch>0){
      
       $send=['error'=>1,'msg'=>'User Already Registered','status'=>0];
       echo json_encode($send);
  }else{
      
$token=$this->getRandom();      
      
$sql="INSERT INTO `appuser` VALUES (NULL, '$name', '$username', '$password', '$token','$date')";
$res=$easydb->insert($sql);
if($res=="Data Has succesfully Recorded"){
$send=['error'=>0,'msg'=>$res,'status'=>1];
    echo json_encode($send);
}else{
    $send=['error'=>1,'msg'=>'Try Again','status'=>0];
    echo json_encode($send);
    
}
  
}
      
    }
    
    catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
    
  
    
    
}





    
}


?>
