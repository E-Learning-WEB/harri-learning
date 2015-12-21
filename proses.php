<?php
//mengambil url otomatis
$url = $_SERVER['HTTP_HOST'];
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
	$redirect = header("refresh:3;url=http://".$url."/htpro/materi_show.php?id_materi=$_POST[id_materi]");
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
		$redirect = header("refresh:3;url=http://".$url."/htpro/materi_show.php?id_materi=$_GET[id_materi]");
		}
	//Hapus Data Materi
	elseif($_GET['aksi'] == 'hapusmateri')
		{
			
		include 'con_koneksi.php';		
			
		$sql = "SELECT * from tbmateri WHERE id_materi = $_GET[id_materi]";
		//mengambil data record yang telah ada didatabase
		//periksa jika data ada
		$data = mysql_query($sql);
		
		if (mysql_num_rows($data)>0)
		{    
			$recordmateri = mysql_fetch_assoc($data);
			//mulai hapus file
			$file = sprintf('upload/%s_%s',$recordmateri['waktu'],$recordmateri['file']);
			if (!unlink($file))
			  {
				  echo "FIle Gagal dihapus";
				  $error = 1;
			  }
			else
			  {
				  //echo "File Dihapus";
			  }
			
			
			//mulai hapus dari database
			if(!isset($error))
			{
				$sql = "DELETE FROM tbmateri WHERE id_materi = $_GET[id_materi]";
				$hapus = mysql_query($sql);
				
			}//hapus dari databse
		}//periksa data
		else
		{
			echo 'ERROR, terjadi kesalahan, kemungkinan data telah terhapus dari database';
		}
	
	$pesan = include 'redir.php';
	$redirect = header("refresh:3;url=http://".$url."/htpro/admin_materi.php");
	
	} //akhir hapus materi
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
	$redirect = header("refresh:3;url=http://".$url."/htpro/materi_show.php?id_materi=$_POST[id_materi]");					
	}
?>