<?php
  
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: false');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin");
header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies

require('../db/config.php');
$user = new fetch();

$user->checkpost();

class fetch{
    
    
    public function checkpost(){
       
         $send=['error'=>0,'msg'=>'','status'=>0];
     if(isset($_POST['getlist'])){
         
          if($_POST['getlist']=='ccode'){
              
              $this->ccode();
          }
         
          if($_POST['getlist']=='eventlist'){
              $this->eventlist();
              
          }
         
         
         
     }else{
         
           $send=['error'=>1,'msg'=>'Check Parameters  ccode and eventlist','status'=>0];
    echo json_encode($send);
         
     }
        
        
    } 
    
    
      public function ccode(){
       $i=0;
          $easydb = new easyfeature();
  $sql="select * from apollo_ccode";
  
  $res=$easydb->fetch($sql);
  $cobj=array();
  foreach($res as $row){
      
        $cobj[$i]["cid"]=$row['ccode'];
        $cobj[$i]["country"]=$row['country'];
         $i++;
    }
        
        
         $send=['error'=>0,'msg'=>$cobj,'status'=>0];
    echo json_encode($send);
        
        
    } 
    
      public function eventlist(){
        
          $i=0;
          $easydb = new easyfeature();
  $sql="select * from apollo_events";
  
  $res=$easydb->fetch($sql);
  $eobj=array();
  foreach($res as $row){
      
        $eobj[$i]["eid"]=$row['id'];
         $eobj[$i]["name"]=$row['eventname'];
         $i++;
    }
        
        
         $send=['error'=>0,'msg'=>$eobj,'status'=>0];
    echo json_encode($send);
        
    } 
    
    
    
    
}






?>