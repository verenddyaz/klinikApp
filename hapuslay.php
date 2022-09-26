<?php
include "config.php";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($con, "delete from layanan where idlayanan='$id'");
  header("location:index.php?page=layanan");
}
