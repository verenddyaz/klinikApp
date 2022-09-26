<?php
include "config.php";

if (isset($_GET['del']))
    $id = $_GET['del'];

if (isset($_GET['data'])) {
    switch ($_GET['data']) {
        case 'pasien':
            mysqli_query($con, "delete from pasien where id_pasien='$id'");
            header("location:index.php?page=pasien");
            break;

        case 'dokter':
            mysqli_query($con, "delete from dokter where iddokter='$id'");
            header("location:index.php?page=dokter");
            break;
    }
}
