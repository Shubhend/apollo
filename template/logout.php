<?php
// set the expiration date to one hour ago
 unset($_COOKIE['userid']); 
    setcookie('userid', null, -1, '/'); 
setcookie("userid", "", time() - 3600);
 echo '<script>window.location = "../index.php";</script>';
?>
