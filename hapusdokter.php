<?php
include "config.php";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($con, "delete from dokter where iddokter='$id'");
  header("location:index.php?page=dokter");
}
