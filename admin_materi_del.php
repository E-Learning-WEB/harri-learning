<?php
	include('con_koneksi.php');
	
	$id_materi 	= $_GET['id_materi'];
	$sql 		= "delete from tbmateri where id_materi='$id_materi'";
	
	mysql_query($sql);
	header('location:admin_materi.php');
?>