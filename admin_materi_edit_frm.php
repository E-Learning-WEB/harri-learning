<?php
	include('con_koneksi.php');
	
		$sql = "SELECT * FROM tbmateri WHERE id_materi = $_GET[edit]";
		$data = mysql_fetch_assoc(mysql_query($sql));
		//cek jika tidak ada maka error
		if(mysql_num_rows(mysql_query($sql))==0)
		{
			$error .= 'terjadi kesalahan';
		}
		
		
		if(empty($error))
		{
		}
		
	
	
	
	if (isset($_POST['edit_materi']))
	{
		$waktu = time();
		$konten = null;
		$filesebelumnya = 'upload/'.$_POST['filesebelumnya'];
		//jika ada data yang diupload baru
		
		if($_FILES["file"]["error"] == 0) 
		{	
			$file =$_FILES['file'];
			//mengambil extensi file
			$fileextensi = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION); 	
			
			
			if($fileextensi == 'pdf' OR $fileextensi == 'mp4')
			{
				$targetfile = "upload/".$waktu.'_'.$file['name'];
				move_uploaded_file($file['tmp_name'],$targetfile) or die ('gagal');
				$konten = 'file = "'.$file['name'].'"';
			}
			else
			{
				$error = 'tipe file tidak diperbolehkan';
			}
								
		}
		
		$judul = $_POST['judul'];
		
		
		$sql="UPDATE tbmateri set judul 	= '$judul',
								  ketmateri = '$ketmateri',
								  waktu 	= '$waktu',
								  $konten
								  WHERE id_materi = '$_GET[edit]'
								  ";	
		echo $sql;	
											
		if($_FILES["file"]["error"] == 0) 
		{										
			if (!unlink($filesebelumnya))
			  {
				  $pesan .= "FIle Gagal dihapus";
				  $error = 1;
			  }
			else
			  {
				  $pesan .=  "File Dihapus";
			  }		
																		
		}	
																		
									
		mysql_query($sql);
}?>


<div class="row">
	<div class="span3">
    </div>
    <div class="span6">
    <div class="form-box">
    <form method="post" action="admin_materi_edit_frm.php?edit=<?php echo $data['id_materi'] ?>" enctype="multipart/form-data">
    <div class="form-body">
    <legend>Edit Data Materi</legend>
    <input name="id_materi" type="hidden" class="input-block-level" maxlength="10" required="required" readonly 
    	value="<?php echo $data['id_materi']; ?>">
    <label>Judul</label>
    <input name="judul" type="text" placeholder="Isi Judul Materi" class="input-block-level" maxlength="35" 
    	required="required" value="<?php echo $data['judul']; ?>">
    <label>Keterangan</label>
    <input name="ketmateri" type="text" placeholder="Isi Keterangan Materi" class="input-block-level" maxlength="100" 
    	required="required" value="<?php echo $data['ketmateri']; ?>">    
    <label>Materi</label>
    <input name="file" type="file" class="input-block-level">
    <input type="hidden" name="waktu" value="<?php echo $data['waktu'] ?>">
    <input type="hidden" name="filesebelumnya" value="<?php echo $data['waktu'] .'_'.$data['file'] ?>">
    </div><br />
    <button name="edit_materi" type="submit" class="btn-style">Edit</button>
    <div class="footer">
    <img src="images/edit.png" />
    </div>
    </form>
    </div>
    </div>
</div> 


<!--<?php
	if (isset($_POST['edit_materi']))
		{
		$id_materi 	= $_POST['id_materi'];
		$judul 		= $_POST['judul'];
		$ketmateri	= $_POST['ketmateri'];
		include('con_koneksi.php');
		$sql = "update tbmateri set id_materi 			= '$id_materi',
									judul 				= '$judul',
									ketmateri			= '$ketmateri'
									where id_materi 	= '$id_materi'";
		mysql_query($sql);
		header('location:admin_materi.php');
		}
		
		if (isset($_GET['id_materi']))
			{
			include('con_koneksi.php');
			$id_materi 	= $_GET['id_materi'];
			$sql	 	= "select * from tbmateri where id_materi='$id_materi'";
			$data 		= mysql_query($sql);
			
			if (mysql_num_rows($data)>0) 
				{
				$row = mysql_fetch_assoc($data);
				?>

<?php } } ?>-->