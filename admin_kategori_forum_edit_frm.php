<?php
	if (isset($_POST['edit_kategori_forum']))
	{
		$id_kategori 	= $_POST['id_kategori'];
		$kategori 		= $_POST['kategori'];
		$keterangan 	= $_POST['keterangan'];
		
		include('con_koneksi.php');
		$sql = "update tbkforum set 	id_kategori 		= '$id_kategori',
										kategori 			= '$kategori',
										keterangan 			= '$keterangan'
										where id_kategori 	= '$id_kategori'";
		mysql_query($sql);
		header('location:admin_kategori_forum.php');
	}
		
		if (isset($_GET['id_kategori']))
		{
			include('con_koneksi.php');
			$id_kategori 	= $_GET['id_kategori'];
			$sql	 		= "select * from tbkforum where id_kategori='$id_kategori'";
			$data 			= mysql_query($sql);
			
			if (mysql_num_rows($data)>0) 
			{
				$row = mysql_fetch_assoc($data);
				?>

<div class="row">
	<div class="span3">
    </div>
    <div class="span6">
    <div class="form-box">
    <form method="post" action="admin_kategori_forum_edit_frm.php">
    <div class="form-body">
    <legend>Edit Data Kategori Forum</legend>
    <input name="id_kategori" type="hidden" class="input-block-level" required="required" readonly 
    	value="<?php echo $row['id_kategori']; ?>">
    <label>Kategori</label>
    <input name="kategori" type="text" class="input-block-level" maxlength="100" value="<?php echo $row['kategori']; ?>">
    <label>Keterangan</label>
    <textarea name="keterangan" class="input-block-level" rows="6" cols="10"><?php echo $row['keterangan']; ?></textarea>
    </div><br />
    <button name="edit_kategori_forum" type="submit" class="btn-style">Edit</button>
    <div class="footer">
    <img src="images/edit.png" />
    </div>
    </form>
    </div>
    </div>
</div> 

<?php } } ?>