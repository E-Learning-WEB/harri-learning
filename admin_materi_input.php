<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include'elm_css.php'; ?>
</head>
<body>
<!--WRAPPER START-->
<div class="wrapper">
    <?php include'elm_menu.php'; ?>
    <!--CONTANT START-->
    <div class="contant">
    	<!--LATEST COURSES SECTION START-->
        <section class="gray-bg">
        	<div class="container">

<?php
	include 'con_koneksi.php';
	if (isset($_POST['input_materi']))
		{
		$waktu 			= time();
		$file 			= $_FILES['file'];
		//mengambil extensi file
		$fileextensi = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
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
					
					if($fileextensi == 'pdf' OR $fileextensi == 'mp4')
						{
						$targetfile = "upload/".$waktu.'_'.$file['name'];
						move_uploaded_file($file['tmp_name'],$targetfile) or die ('gagal');
						$konten = 'file = "'.$file['name'].'"';
						
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
						die();
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
    <legend>Input Data Materi</legend>
    <label>Judul</label>
    <input name="judul" type="text" placeholder="Isi Judul Materi" maxlength="35" required="required" 
    	class="input-block-level">
    <label>Materi</label>
    <input type="file" name="file" class="input-block-level">
    </div><br />
    <button name="input_materi" type="submit" class="btn-style">Tambahkan</button>
    <div class="footer">
    <img src="images/input.png">
    </div>
    </form>
    </div>
    </div>
</div> 
<?php } ?>

            </div>
        </section>
        <!--LATEST COURSES SECTION END-->
	</div>
</div>
<!--WRAPPER END-->
<?php include'elm_js.php'; ?>
</body>
</html>