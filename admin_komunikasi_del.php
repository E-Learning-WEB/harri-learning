<?php
	include('con_koneksi.php');
	
	$id_komunikasi 	= $_GET['id_komunikasi'];
	$sql 			= "delete from tbkomunikasi where id_komunikasi='$id_komunikasi'";
	
	mysql_query($sql);
	header('location:admin_komunikasi.php');
?>