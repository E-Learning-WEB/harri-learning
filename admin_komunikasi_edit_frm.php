<?php
	if (isset($_POST['edit_komunikasi']))
	{
		$id_komunikasi 	= $_POST['id_komunikasi'];
		$tipe 			= $_POST['tipe'];
		$id_komentar 	= $_POST['id_komentar'];
		$id_anggota 	= $_POST['id_anggota'];
		$judul 			= $_POST['judul'];
		$waktu 			= $_POST['waktu'];
		$isi 			= $_POST['isi'];
		
		include('con_koneksi.php');
		$sql = "update tbkomunikasi set id_komunikasi 		= '$id_komunikasi',
										tipe 				= '$tipe',
										id_komentar 		= '$id_komentar',
										id_anggota 			= '$id_anggota',
										judul 				= '$judul',
										waktu 				= '$waktu',
										isi 				= '$isi'
										where id_komunikasi = '$id_komunikasi'";
		mysql_query($sql);
		header('location:admin_komunikasi.php');
	}
		
		if (isset($_GET['id_komunikasi']))
		{
			include('con_koneksi.php');
			$id_komunikasi 	= $_GET['id_komunikasi'];
			$sql	 		= "select * from tbkomunikasi where id_komunikasi='$id_komunikasi'";
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
                        <form method="post" action="admin_komunikasi_edit_frm.php">
                        	<div class="form-body">
                            <fieldset>
                                <legend>Edit Data Komunikasi</legend>
                                <label>ID Komunikasi</label>
                               	<input name="id_komunikasi" type="text" class="input-block-level" maxlength="10" required="required" readonly="readonly" 
                                	value="<?php echo $row['id_komunikasi']; ?>">
                                <label>Tipe</label>
                               	<input name="tipe" type="text" class="input-block-level" maxlength="1" value="<?php echo $row['tipe']; ?>">
                                <label>ID Komentar</label>
                                <input name="id_komentar" type="text" class="input-block-level" maxlength="10" value="<?php echo $row['id_komentar']; ?>">								
                                <label>ID Anggota</label>
                                <input name="id_anggota" type="text" class="input-block-level" maxlength="10" value="<?php echo $row['id_anggota']; ?>">
                                <label>Judul</label>
                                <input name="judul" type="text" class="input-block-level" maxlength="75" value="<?php echo $row['judul']; ?>">
                                <label>Waktu</label>
                                <input name="waktu" type="text" class="input-block-level" maxlength="11" value="<?php echo $row['waktu']; ?>" 
                                	readonly="readonly">
                                <label>Isi</label>
                                <textarea name="isi" class="input-block-level" rows="6" cols="10"><?php echo $row['isi']; ?></textarea>
                                
                            </div><br />
                            	<button name="edit_komunikasi" type="submit" class="btn-style">Edit</button>
                            </fieldset>
                            <div class="footer">
                                <img src="images/edit.png" />
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

<?php } } ?>
