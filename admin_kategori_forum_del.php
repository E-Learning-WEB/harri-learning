<?php
	include('con_koneksi.php');
	
	$id_kategori 	= $_GET['id_kategori'];
	$sql 			= "delete from tbkforum where id_kategori='$id_kategori'";
	
	mysql_query($sql);
	header('location:admin_kategori_forum.php');
?>