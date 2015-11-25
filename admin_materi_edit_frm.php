<?php
	if (isset($_POST['edit_materi']))
		{
		$id_materi 	= $_POST['id_materi'];
		$judul 		= $_POST['judul'];
		include('con_koneksi.php');
		$sql = "update tbmateri set id_materi 			= '$id_materi',
									judul 				= '$judul'
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

<div class="row">
	<div class="span3">
    </div>
    <div class="span6">
    <div class="form-box">
    <form method="post" action="admin_materi_edit_frm.php">
    <div class="form-body">
    <legend>Edit Data Materi</legend>
    <label>ID Materi</label>
    <input name="id_materi" type="text" class="input-block-level" maxlength="10" required="required" readonly 
    	value="<?php echo $row['id_materi']; ?>">
    <label>Judul</label>
    <input name="judul" type="text" placeholder="Isi Judul Materi" class="input-block-level" maxlength="35" 
    	required="required" value="<?php echo $row['judul']; ?>">
    <label>Materi Pdf</label>
    <input name="materi" type="text" placeholder="Materi" class="input-block-level" maxlength="100" 
    	value="<?php echo $row['materi']; ?>" required="required" readonly>								
    <label>Materi Video</label>
    <input name="video" type="text" placeholder="Video" class="input-block-level" maxlength="15" 
    	value="<?php echo $row['video']; ?>" required="required" readonly >
    </div><br />
    <button name="edit_materi" type="submit" class="btn-style">Edit</button>
    <div class="footer">
    <img src="images/edit.png" />
    </div>
    </form>
    </div>
    </div>
    </div> 

<?php } } ?>