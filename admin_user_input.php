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
	if (isset($_POST['input_user']))
		{
		$id_anggota 	= $_POST['id_anggota'];
		$nama 			= $_POST['nama'];
		$email 			= $_POST['email'];
		$password 		= $_POST['password'];
		$status 		= $_POST['status'];
		
		if (trim($id_anggota) == '' or trim($password) == '' )
			{
			echo '<br />';
			echo "<p style='text-align:center'>Username dan password kosong</p>";
			echo "<p style='text-align:center'><a class='btn-style' href='admin_user_input.php'>Kembali</a></p>";
			}
		else
			{
		//untuk cek apakah id_anggota sudah terpakai atau belum
		$sql 	= "select * from tbanggota where id_anggota = '$id_anggota'";	
		$data 	= mysql_query($sql);
			
			if (mysql_num_rows($data)>0)
				{
				echo '<br />';
				echo "<p style='text-align:center'>Username telah terpakai</p>";
				echo "<p style='text-align:center'><a class='btn-style' href='admin_user_input.php'>Kembali</a></p>";
				}
				
			else
				{
				$sql = "insert into tbanggota set	id_anggota 	= '$id_anggota',
													nama 		= '$nama',
											   		email 		= '$email',
											   		password 	= '$password',
											   		status 		= '$status'";
				mysql_query($sql);
				
				echo '<br />';
				echo "<p style='text-align:center'>Data user baru telah berhasil ditambahkan</p>";
				echo '<br />';
				echo "<p style='text-align:center'><a class='btn-style' href='admin_user.php'>Lihat Data User</a></p>";
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
    <form method="post" action="admin_user_input.php" enctype="multipart/form-data">
    <div class="form-body">
    <legend>Input Data User</legend>
    <label>Username</label>
    <input name="id_anggota" type="text" placeholder="Masukkan Username" class="input-block-level" placeholder="Last Name" 
    	maxlength="10" required="required">
    <label>Nama Lengkap</label>
    <input name="nama" type="text" placeholder="Masukkan Nama" class="input-block-level" maxlength="35" required="required">
    <label>Email</label>
    <input name="email" type="text" placeholder="Masukkan Email" class="input-block-level" maxlength="50" 
    	required="required">								
    <label>Password</label>
    <input name="password" type="text" placeholder="Masukkan Password" class="input-block-level" maxlength="15" 
    	required="required">
    <label>Status</label>
    <select name="status" class="input-block-level">
    	<option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    </div><br />
    <button name="input_user" type="submit" class="btn-style">Tambahkan</button>
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