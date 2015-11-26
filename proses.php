<?php
session_start();
//kirim komentar materi
if(isset($_POST['kirimkomentarmateri']))
	{
	include 'con_koneksi.php';
	$id_anggota = $_SESSION['id_anggota'];
	$isi 		= mysql_real_escape_string($_POST['isi']);
	$waktu 		= time();
	
	$tipe = 2;
	$id_materi = $_POST['id_materi'];
	
	$sql = "Insert into tbkomunikasi set	tipe = $tipe,
									   		id_komentar = '$id_materi',
									   		id_anggota = '$id_anggota',
									   		waktu = '$waktu',
									   		isi = '$isi'";
	mysql_query($sql);
	
	$pesan = include 'redir.php';
	$redirect = header("refresh:3;url=http://localhost/htpro/materi_show.php?id_materi=$_POST[id_materi]");
	}
	
//hapus komentar materi
if(isset($_GET['aksi']))
	{
	if($_GET['aksi'] == 'hapus-balasanmateri')
		{
		include 'con_koneksi.php';
		$id_komunikasi = $_GET['id_komunikasi'];
		$sql_kom = "delete from tbkomunikasi WHERE id_komunikasi='$_GET[id_komunikasi]'";
		mysql_query($sql_kom);
			
		$pesan = include 'redir.php';
		$redirect = header("refresh:3;url=http://localhost/htpro/materi_show.php?id_materi=$_GET[id_materi]");
		}
	}

//edit komentar materi
if(isset($_POST['editkomentarmateri']))
	{
	include 'con_koneksi.php';
	$id_komunikasi 	= $_POST['id_komunikasi'];
	$isi 			= mysql_real_escape_string($_POST['isi']);
	$sql = "update tbkomunikasi set	id_komunikasi = '$id_komunikasi',
									isi = '$isi' 
									where id_komunikasi = '$id_komunikasi'";

	mysql_query($sql);	
	
	$pesan = include 'redir.php';
	$redirect = header("refresh:3;url=http://localhost/htpro/materi_show.php?id_materi=$_POST[id_materi]");					
	}
?>