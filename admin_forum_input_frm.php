<?php
	include 'con_koneksi.php';
	include 'plugin/fc.parsedown.php';
	$Parsedown = new Parsedown();
	if (isset($_POST['input_forum']))
	{
		$id_anggota = $_SESSION['id_anggota'];
		$judul 		= $_POST['judul'];
		$isi 		= $_POST['isi'];
		$waktu = time();
		$tipe = 1;
		$id_komentar =0;
		
		if (trim($judul) == '' or trim($isi) == '' )
		{
			echo '<br />';
			echo "<p style='text-align:center'>Judul dan isi kosong</p>";
			echo "<p style='text-align:center'><a class='btn-style' href='admin_forum_input.php'>Kembali</a></p>";
		}
		else
		{
		//untuk cek apakah judul sudah terpakai atau belum
		$sql 	= "select * from tbkomunikasi where judul = '$judul'";	
		$data 	= mysql_query($sql);
			
			if (mysql_num_rows($data)>0)
				{
				echo '<br />';
				echo "<p style='text-align:center'>Judul telah terpakai</p>";
				echo "<p style='text-align:center'><a class='btn-style' href='admin_forum_input.php'>Kembali</a></p>";
				}
				
			else
				{
				$sql = "insert into tbkomunikasi set 	id_anggota = '$id_anggota',
														judul 	= '$judul',
														tipe 	= $tipe,
														waktu 	= '$waktu',
											   			isi 	= '$isi'";
													
				mysql_query($sql);
				echo '<br />';
				echo "<p style='text-align:center'>Topik Forum baru telah berhasil ditambahkan</p>";
				echo '<br />';
				echo "<p style='text-align:center'><a class='btn-style' href='admin_komunikasi.php'>Lihat Data Komunikasi</a></p>";
				}
		}
	}
	else
	{?>
	
    		<div class="row">
               	<div class="span3">
                </div>
            	<div class="span6">
                	<div class="form-box">
                        <form method="post" action="admin_forum_input.php">
                        	<div class="form-body">
                            <fieldset>
                                <legend>Input Topik Forum Baru</legend>
                                <label>Judul</label>
                               	<input name="judul" type="text" placeholder="Masukkan judul" class="input-block-level" maxlength="75" required="required">
                                <label>Isi</label>
                                <textarea name="isi" data-provide="markdown" class="input-block-level" rows="6" cols="10"></textarea>
                            </div><br />
                            	<button name="input_forum" type="submit" class="btn-style">Tambahkan</button>
                            </fieldset>
                            <div class="footer">
                                <img src="images/input.png">
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

<?php } ?>
                        
						
                        