<?php
session_start();
unset($_SESSION['status']);
unset($_SESSION['level']);
echo "<script>window.location='index.php';</script>";
 ?>