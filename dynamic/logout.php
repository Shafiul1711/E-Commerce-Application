<?php
session_start();
session_unset(); //unsets session variables
session_destroy(); //destroys the session

//redirects
header("Location: login.php");
exit;
?>
