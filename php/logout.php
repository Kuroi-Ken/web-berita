<?php
session_start();
session_unset();
session_destroy();

// Blok cache sepenuhnya
header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache");
header("Expires: 0");

// Redirect ke login
header("Location: ../login.php");
exit();