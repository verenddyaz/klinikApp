<?php
    
include "config.php";

$data=mysqli_fetch_row(mysqli_query($con,"select * from login"));

$headers = "From: idxcomputer.com\r\n";
            @mail("$data[3]","informasi login","berikut data login USERNAME= $data[1], PASSWORD= $data[2]", $headers);

header("location:admlogin.php?qwi=r");

?>