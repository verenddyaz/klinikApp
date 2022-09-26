<?php
include "config.php";


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($con, "delete from pasien where id_pasien='$id'");
  header("location:index.php?page=pasien");
}
