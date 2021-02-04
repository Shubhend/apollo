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
        
         $did=$_POST['dealerid'];

    $send=['error'=>0,'msg'=>'','status'=>0];
     if(isset($_POST['age']) && isset($_POST['mobileno']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['event']) && isset($_POST['dealerid'])  ){
         
           if($_POST['age']=='' || $_POST['mobileno']=='' || $_POST['name']==''  || $_POST['email']==''  || $_POST['event']=='' || $_POST['dealerid']='' ) {
               
               
         $send=['error'=>1,'msg'=>'Field should not be blank','status'=>0];
          echo json_encode($send);
          
          
          
        }else{ 
              
            if(! is_numeric($_POST['age'])){
                 $send=['error'=>1,'msg'=>'Age should be numeric','status'=>0];
          echo json_encode($send);
          exit;
            }
            
            if(! is_numeric($_POST['mobileno']) ||  strlen($_POST['mobileno'])<10){
                 $send=['error'=>1,'msg'=>'Mobile No. should be numeric and 10 digits','status'=>0];
          echo json_encode($send);
          exit;
            }
            
           
        $this->eventcheck($_POST['event'],$did);
        
        //$this->checkemail($_POST['email'],$did);
        }
  
   } else{
       
      
    $send=['error'=>1,'msg'=>'Post Parameter Not Mached eg:age , mobileno,email,event, name and dealerid','status'=>0];
    echo json_encode($send);
     
         
  
    }
    
   

}

function checkemail($email,$did,$eid){
            $no=$_POST['mobileno'];
    $easydb = new easyfeature();

 $sqlusercheck="SELECT email,mobileno FROM apollo_clients WHERE email='$email' AND mobileno='$no' " ;
  
  $resch=$easydb->checkduplicate($sqlusercheck);
  
  if($resch>0){
      $sqlusercheckemail="SELECT * FROM apollo_clients WHERE email='$email' ";
      $cid=$easydb->fetchrow($sqlusercheckemail,"id");
      
      
       
       $send=['error'=>1,'msg'=>'Client Already Registered','status'=>0,'clientid'=>$cid,"eventid"=>$eid];
    echo json_encode($send);
      
     exit;
      
  }else{
         //$this->insertdata($_POST['name'],$_POST['age'],$_POST['email'],$_POST['mobileno'],$_POST['dealerid']);
   
        //var_dump(0);exit;
    
       // $this->eventcheck($_POST['event'],$did);
     
       
       $this->insertdata($_POST['name'],$_POST['age'],$_POST['email'],$_POST['mobileno'],$did,$eid);
      
  }
    
    
}



public function getevent($eventname){
       $easydb = new easyfeature();
     $sqlusercheck="SELECT * FROM apollo_events WHERE eventname='$eventname'";
  $resch=$easydb->checkduplicate($sqlusercheck);
    
    
}

public function eventcheck($eventname,$did){
    
    
    
       
     $easydb = new easyfeature();
     $sqlusercheck="SELECT * FROM apollo_events WHERE eventname='$eventname'";
  
  $resch=$easydb->checkduplicate($sqlusercheck);
  $date=date("Y-m-d");
  if($resch>0){
       $eid=$this->giveid("apollo_events","eventname",$eventname,"id");
       
       $this->checkemail($_POST['email'],$did,$eid);
       // $this->insertdata($_POST['name'],$_POST['age'],$_POST['email'],$_POST['mobileno'],$did,$eid);
  }else{
            
              $send=['error'=>1,'msg'=>'Event  Not Mached','status'=>0];
    echo json_encode($send);
      
            
   //  $sql="INSERT INTO `apollo_events` VALUES (NULL, '$eventname','$date')";
   //  $res=$easydb->insert($sql);
   //   if($res){
      
  //   $eid= $this->giveid("apollo_events","eventname",$eventname,"id");
      
 //     $this->checkemail($_POST['email'],$did,$eid);
      
      
      // $this->insertdata($_POST['name'],$_POST['age'],$_POST['email'],$_POST['mobileno'],$did,$eid);
          
   //   }else{
          
          
    //  }
      
  }
    
    
   
    
}

public function giveid($dbtable,$name,$value,$para){
     $easydb = new easyfeature();
     $sqlusercheck="SELECT * FROM ".$dbtable." WHERE ".$name."='$value'";
     $id=$easydb->fetchrow($sqlusercheck,$para);
     return $id;
    
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

public function insertdata($name,$age,$email,$mobileno,$dealerid,$eid){
   
  
    
//$date=date("jS F Y");
$date=date("Y-m-d");
$password=md5($password);
    $send=['error'=>0,'msg'=>'','status'=>0];
    try{
        $easydb = new easyfeature();
      
$token=$this->getRandom();      
      
$sql="INSERT INTO `apollo_clients` VALUES (NULL, '$dealerid','$name', '$age', '$email', '$mobileno','$date')";
$res=$easydb->insert($sql);
if($res=="Data Has succesfully Recorded"){
       
$cid= $this->giveid("apollo_clients","email",$email,"id");
    
$send=['error'=>0,'msg'=>$res,'status'=>1,'eventid'=>$eid,'dealerid'=>$dealerid,'clientid'=>$cid];
    echo json_encode($send);
}else{
    $send=['error'=>1,'msg'=>'Try Again','status'=>0];
    echo json_encode($send);
    
}
  

      
    }
    
    catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
    
  
    
    
}





    
}


?>
