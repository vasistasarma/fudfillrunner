<?php
session_start();

session_unset();
session_destroy();
$_SESSION['fud_fill'] = array();

echo '<script> document.location="login.php"; </script>';
?>