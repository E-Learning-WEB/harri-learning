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
	include 'plugin/fc.parsedown.php';
	$Parsedown = new Parsedown();
	
	if (isset($_POST['input_kategori_forum']))
	{
		$kategori	= $_POST['kategori'];
		$keterangan	= $_POST['keterangan'];
		
		//untuk cek apakah kategori dan keterangan benar terisi
		if (trim($kategori) == '' or trim($keterangan) == '' )
		{
			echo '<br />';
			echo "<p style='text-align:center'>Kategori dan Keterangan kosong</p>";
			echo "<p style='text-align:center'><a class='btn-style' href='admin_kategori_forum_input.php'>Kembali</a></p>";
		}
		else
		{
		//untuk cek apakah kategori sudah terpakai atau belum
		$sql 	= "select * from tbkforum where kategori = '$kategori'";	
		$data 	= mysql_query($sql);
			
			if (mysql_num_rows($data)>0)
				{
				echo '<br />';
				echo "<p style='text-align:center'>Kategori telah ada</p>";
				echo "<p style='text-align:center'><a class='btn-style' href='admin_kategori_forum_input.php'>Kembali</a></p>";
				}
				
			else
				{
				$sql = "insert into tbkforum set 	kategori = '$kategori',
													keterangan = '$keterangan'";
													
				mysql_query($sql);
				echo '<br>'."<p style='text-align:center'>Kategori Forum baru telah berhasil ditambahkan</p>";
				echo '<br>'."<p style='text-align:center'><a class='btn-style' href='admin_komunikasi.php'>Lihat Data Komunikasi</a></p>";
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
            	<form method="post" action="admin_kategori_forum_input.php">
                <div class="form-body">
                <fieldset>
                <legend>Input Kategori Forum</legend>
                <label>Kategori</label>
                <input name="kategori" type="text" placeholder="Masukkan Kategori" class="input-block-level" maxlength="100" required="required">
                <label>Keterangan</label>
                <textarea name="keterangan" class="input-block-level" rows="6" cols="10"></textarea>
                </div><br />
                <button name="input_kategori_forum" type="submit" class="btn-style">Tambahkan</button>
                </fieldset>
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
<!--WRAPPER END-->
<?php include'elm_js.php'; ?> 
</body>
</html>