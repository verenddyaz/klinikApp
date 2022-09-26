<?php
session_start();
unset($_SESSION['kosong']);
unset($_SESSION['level']); 
header("location:admlogin.php");
