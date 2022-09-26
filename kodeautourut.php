<?php
$my['host'] = "localhost";
$my['user'] = "root";
$my['pass'] = "";
$my['dbs'] = "klinikdb";

$koneksi = mysql_connect($my['host'], $my['user'], $my['pass']);
if (! koneksi) {
	echo "error connection!".mysql_error();
}
mysql_select_db($my['dbs'])
	or die ("Database Not Found".mysql_error());

function kdurut($tabel, $inisial) {
	$struktur = mysql_query("SELECT no_urut FROM $tabel where tgl_daftar=curdate()");
	$field = mysql_field_name($struktur,0);
	$panjang = mysql_field_len($struktur,0);

	$qry = mysql_query("SELECT max(".$field.") FROM ".$tabel." where tgl_daftar=CURDATE()");
	$row = mysql_fetch_array($qry);
	if ($row[0]=="") {
		$angka=0;
	}
	else {
		$angka = substr($row[0], strlen($inisial));
	}

	$angka++;
	$angka =strval($angka);
	$tmp ="";
	for ($i=1; $i <= ($panjang-strlen($inisial)-strlen($angka)); $i++) {
			$tmp=$tmp."0";
	}
	return $inisial.$tmp.$angka;
}
