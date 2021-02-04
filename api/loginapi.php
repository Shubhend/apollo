<?php
  
             
             
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: false');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin");
header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies

require('../db/config.php');
include('password.php');

$user = new loginapi();

$user->check();

class loginapi{
    

    
    private $userid;
    private $password;
    
public function check(){
     

    $send=['error'=>0,'msg'=>'','status'=>0];
     if(isset($_POST['userid']) && isset($_POST['password'])){
           if($_POST['userid']=='' || $_POST['password']==''){
         $send=['error'=>1,'msg'=>'Field should not be blank','status'=>0];
          echo json_encode($send);
        }else{ 
        
        $this->checkdata($_POST['userid'],$_POST['password']);
        }
  
   } else{
       
      
    $send=['error'=>1,'msg'=>'Post Parameter Not Mached eg:userid and password','status'=>0];
    echo json_encode($send);
     
         
  
    }
    
   

}


	public function isValidUsername($username){
		if (strlen($username) < 3) return false;
		if (strlen($username) > 17) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}

public function checkdata($userid,$password){
    

    $send=['error'=>0,'msg'=>'','status'=>0];
    try{
        $easydb = new easyfeature();
  $sql="select * from apollo_dealer where username='$userid'";
  
  $res=$easydb->checkduplicate($sql);
  if($res<1){
      
       $send=['error'=>1,'msg'=>'User not Registered','status'=>0];
       echo json_encode($send);
  }else{
      
      
        $sqli="SELECT * FROM apollo_dealer WHERE username='$userid' AND password='$password' ";
  
       $resch=$easydb->checkduplicate($sqli);
    
      if($resch>0){
             $id=$easydb->fetchrow($sqli,"id");
             $sus=$easydb->fetchrow($sqli,"status");
             if($sus==1){
                   $send=['error'=>1,'msg'=>'User Suspended','status'=>0];
       echo json_encode($send);
       exit;
             }
             
            
            $send=['error'=>0,'msg'=>'Success','status'=>1,'id'=>$id];
       echo json_encode($send);
      }else{
            $send=['error'=>1,'msg'=>'Wrong Password','status'=>0];
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
