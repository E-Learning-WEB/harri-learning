<?php
	include('con_koneksi.php');
	
	$id_anggota = $_GET['id_anggota'];
	$sql 		= "delete from tbanggota where id_anggota='$id_anggota'";
	
	mysql_query($sql);
	header('location:admin_user.php');
?>