<?php
require 'class/class.phpmailer.php';
             
             
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: false');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin");
header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
             

require('../db/config.php');
include('password.php');


$user = new uploadimage();


$user->check();

class uploadimage{



public function check(){
     
   

    $send=['error'=>0,'msg'=>'','status'=>0];
     if(isset($_POST['clientid']) && isset($_POST['dealerid']) && isset($_POST['eventid'])  && isset($_POST['image']) ){
            $easydb = new easyfeature();
    
    
           if($_POST['clientid']=='' || $_POST['dealerid']=='' || $_POST['eventid']==''  || $_POST['image']=='') {
         $send=['error'=>1,'msg'=>'Field should not be blank','status'=>0];
          echo json_encode($send);
        }else{ 
          
            
            
         $this->checkid($_POST['clientid'],$_POST['dealerid'],$_POST['eventid']);   
           
       // $this->insertdata($_POST['username'],$_POST['password'],$_POST['name']);
        }
  
   } else{
       
      
    $send=['error'=>1,'msg'=>'Post Parameter Not Mached eg:clientid , dealerid , image,eventid,','status'=>0];
    echo json_encode($send);
     
         
  
    }
    
   

}


function checkid($cid,$did,$evid){
      $easydb = new easyfeature();
   
    
    
 $sqlclientcheck="SELECT id FROM apollo_clients WHERE id='$cid'";
  $sqldealercheck="SELECT id FROM apollo_dealer WHERE id='$did'";
    $sqleventcheck="SELECT id FROM apollo_events WHERE id='$evid'";
 
  $chclient=$easydb->checkduplicate($sqlclientcheck);
  $chdealer=$easydb->checkduplicate($sqldealercheck);
    $chevent=$easydb->checkduplicate($sqleventcheck);
 
  if($chclient<1 || $chdealer<1 || $chevent<1){
       $send=['error'=>1,'msg'=>'Please Check your Clientid, eventid and Dealerid','status'=>0];
    echo json_encode($send);
      exit;
  }else{
      $this->checkfolder($cid,$did);
  }
    
    
    
    
    
    
    
}

public function checkfolder($cid,$did){
    
  $filedealer = "../photoupload/".$did;
    $filedealer2 = "../photourl/".$did;
  if(! is_dir($filedealer2)  ) {
    

    mkdir($filedealer2,0755,true); 
    
}
if(! is_dir($filedealer)  ) {
    

    mkdir($filedealer,0755,true); 
    
}
    
   $filedealerclient = "../photoupload/".$did."/".$cid;   
     $filedealerclient2 = "../photourl/".$did."/".$cid;   
   
  if(! is_dir($filedealerclient)  ) {

    mkdir($filedealerclient,0755,true); 
}  
    if(! is_dir($filedealerclient2)  ) {

    mkdir($filedealerclient2,0755,true); 
}  

  $this->insertdata($cid,$did);
    
}



function getRandom() { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < 10; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

public function insertdata($cid,$did){

//$date=date("jS F Y");
$event=$_POST['eventid'];
$venu=$_POST['venu'];
$date=date("Y-m-d");
$ran=$this->getRandom();
    $send=['error'=>0,'msg'=>'','status'=>0];
    try{
        $easydb = new easyfeature();

$filech=$this->createfile($cid,$did,$_POST['image']);

if($filech['status']==1 && $filech['filename'] !==''){
  
          
$fname=$filech['filename'];      
$clsql="SELECT * FROM apollo_clients where id='$cid'";
$cemail=$easydb->fetchrow($clsql,"email");
$sql="INSERT INTO `apollo_upload` VALUES (NULL, '$did', '$cid', '$event','$fname','$date')";
$res=$easydb->insert($sql);
if($res=="Data Has succesfully Recorded"){
    
    
    	$mail = new PHPMailer;
		$mail->IsSMTP();	

		$mail->Host = 'myapollophoto.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->SMTPAuth = false;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'noreply@myapollophoto.com';					//Sets SMTP username
		$mail->Password = 'ApolloPhoto123#@!';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'noreply@myapollophoto.com';			//Sets the From email address for the message
		$mail->FromName = 'Myapollophoto.com';					//Sets the From name of the message
		$mail->AddAddress($cemail);	//Adds a "To" address
								//Sets word wrapping on the body of the message to a given number of characters
								//Sets message type to HTML
		$mail->Subject = 'Thanks From Apollo Photo'; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '
Hello,
	Thank you for visiting Apollo Photo Station.We hope you enjoyed.Please Share Your Photo with title #gothedistance';

		$mail->AltBody = '';

		$result = $mail->Send();						//Send an Email. Return true on success or false on error

    
$send=['error'=>0,'msg'=>$res,'status'=>1,'dealerid'=>$did,'clientid'=>$cid,"eventid"=>$event];
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


function createfile($cid,$did,$imgdata){
    
    
    
    
    
    $filename=$did.$cid.$this->getRandom().".png";
    $filename2=$did.$cid.$this->getRandom().".txt";
    
    $myfile = fopen("../photourl/".$did."/"."$cid"."/".$filename2, "w") or die("Unable to open file!");
    
$data = base64_decode($imgdata); // base64 decoded image data
$source_img = imagecreatefromstring($data);

$file = "../photoupload/".$did."/"."$cid"."/".$filename;
$imageSave = imagejpeg($source_img, $file, 100);
imagedestroy($source_img);
    
    
    if(fwrite($myfile, $imgdata)){
        
           fclose($myfile);
         
         $send=['filename'=>$filename,'status'=>1];
         return $send;
         
    }else{
          $send=['error'=>1,'msg'=>'Try Again','status'=>0];
          echo json_encode($send);
    }
    
 
}


}


?>
