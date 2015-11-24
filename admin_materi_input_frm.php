<?php
	include 'con_koneksi.php';
	if (isset($_POST['input_materi']))
		{
		$waktu 			= time();
		$file 			= $_FILES['file'];
		$fileextensi 	= substr($file['name'],strpos($file['name'],'.')+1) ;
		$judul 			= $_POST['judul'];
		
		if (trim($judul) == '')
			{
			echo '<br />';
			echo "<p style='text-align:center'>Judul dan materi kosong</p>";
			echo "<p style='text-align:center'><a class='btn-style' href='admin_materi_input.php'>Kembali</a></p>";
			}
		else
			{
			//untuk cek apakah judul sudah terpakai atau belum
			$sql = "select * from tbmateri where judul = '$judul'";	
			$data = mysql_query($sql);
		
			if (mysql_num_rows($data)>0)
				{
				echo '<br />';
				echo "<p style='text-align:center'>Judul materi telah terpakai</p>";
				echo "<p style='text-align:center'><a class='btn-style' href='admin_materi_input.php'>Kembali</a></p>";
				}
				else
				{		
					
					if($fileextensi == 'pdf')
						{
						move_uploaded_file($file['tmp_name'],"material/pdf/$file[name]") or die ('gagal');
						$konten = 'materi = "'.$file['name'].'"';
						
						$sql="Insert into tbmateri set 	judul = '$judul',
														waktu = '$waktu',
														$konten";
												
						mysql_query($sql);
					
						echo '<br />';
						echo "<p style='text-align:center'>Data materi baru telah berhasil ditambahkan</p>";
						echo '<br />';
						echo "<p style='text-align:center'><a class='btn-style' href='admin_materi.php'>Lihat Data Materi</a></p>";
						}
					elseif($fileextensi == 'mp4' OR $fileextensi == 'mpeg4')
						{	
						move_uploaded_file($file['tmp_name'],"material/video/$file[name]") or die ('gagal');
						$konten = 'video ="'. $file['name']. '"';
						
						$sql="Insert into tbmateri set 	judul = '$judul',
														waktu = '$waktu',
														$konten";
												
						mysql_query($sql);
					
						echo '<br />';
						echo "<p style='text-align:center'>Data materi baru telah berhasil ditambahkan</p>";
						echo '<br />';
						echo "<p style='text-align:center'><a class='btn-style' href='admin_materi.php'>Lihat Data Materi</a></p>";		
						}
					else
						{
						echo '<script language="javascript">';
						echo 'alert("Maaf, file yang ada upload tidak disupport")';
						echo '</script>';
						echo "<p style='text-align:center'><a class='btn-style' href='admin_materi_input.php'>Coba Kembali</a></p>";
						}
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
                        <form method="post" action="admin_materi_input.php" enctype="multipart/form-data">
                        	<div class="form-body">
                            <fieldset>
                                <legend>Input Data Materi</legend>
                                <label>Judul</label>
                               	<input name="judul" type="text" placeholder="Isi Judul Materi" maxlength="35" required="required" class="input-block-level">
                                <label>Materi</label>
                                <input type="file" name="file" class="input-block-level">
                                </div><br />
                            	<button name="input_materi" type="submit" class="btn-style">Tambahkan</button>
                            </fieldset>
                            <div class="footer">
                            <img src="images/input.png">
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
<?php } ?>
                        
						
                        