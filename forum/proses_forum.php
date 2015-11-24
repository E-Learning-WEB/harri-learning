<?php
session_start();

//kirim komentar forum
if(isset($_POST['kirimkomentarforum']))
	{
	include '../con_koneksi.php';
	$id_anggota = $_SESSION['id_anggota'];
	$isi 		= mysql_real_escape_string($_POST['isi']);
	$waktu 		= time();
	
	$tipe = 0;
	$id_komentar = $_POST['id_komentar'];
	
	$sql = "Insert into tbkomunikasi set 	tipe = $tipe,
										 	id_komentar = '$id_komentar',
										 	id_anggota = '$id_anggota',
										 	waktu = '$waktu',
										 	isi = '$isi'";
	mysql_query($sql);		
	
	$pesan = include 'redir_fin.php';
	$redirect = header("refresh:3;url=http://localhost/htpro/forum/topik.php?id=$_POST[id_komentar]");					
	}

//hapus komentar forum
if(isset($_GET['aksi']))
	{
	if($_GET['aksi'] == 'hapus-balasanforum')
		{
		include '../con_koneksi.php';
		$id_komunikasi = $_GET['id_komunikasi'];
		$sql = "delete from tbkomunikasi where id_komunikasi = $id_komunikasi";
		mysql_query($sql);
		
		$pesan = include 'redir_fdel.php';
		$redirect = header("refresh:2;url=http://localhost/htpro/forum/topik.php?id=$_GET[id]");
		}
	}
	
//edit komentar forum
if(isset($_POST['editkomentarforum']))
	{
	include '../con_koneksi.php';
	$id_komunikasi 	= $_POST['id_komunikasi'];
	$isi 			= mysql_real_escape_string($_POST['isi']);
	$sql = "update tbkomunikasi set	id_komunikasi = '$id_komunikasi',
									isi = '$isi' 
									where id_komunikasi = '$id_komunikasi'";

	mysql_query($sql);	
	
	$pesan = include 'redir_fed.php';
	$redirect = header("refresh:3;url=http://localhost/htpro/forum/topik.php?id=$_POST[id_komentar]");					
	}	

//hapus topik forum
if($_GET['aksi']== 'hapus-topikforum')
	{
	include '../con_koneksi.php';
	$sql = "Update tbkomunikasi SET status='2' Where id_komunikasi = $_GET[id]";
	mysql_query($sql);
	
	$pesan = include 'redir_fed.php';
	header("refresh:2;url=http://localhost/htpro/forum/index.php");
	}
?>