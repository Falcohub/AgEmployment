<?php
session_start();
session_destroy();
header("location: ../frontend/Frm_Login.php");
exit;
?>