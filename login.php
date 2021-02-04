<?php
ini_set('session.cookie_path', 'myapollophoto.com');
session_start();
  if($_SESSION["userihd"]="dfsdgsdg"){
  setcookie("userid", $_GET['email'], time() + (86400 * 30), "myapollophoto.com"); // 86400 = 1 day
  $_SESSION["userid"]=$_GET['email'];
   echo '<script>
    window.location = "template/";
</script>';
    
}else{
    
      echo '<script>
    window.location = "template/";
</script>';
    
}

?>