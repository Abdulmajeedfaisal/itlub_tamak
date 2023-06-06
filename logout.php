
<?php
 
setcookie('user_id', '', time() - 1, '/');
$url = 'login.php';
header('Location: ' . $url); 

?>


