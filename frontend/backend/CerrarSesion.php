<?php
session_start();
session_destroy();
header("location: ../Frm_Login.php");
exit;
?>