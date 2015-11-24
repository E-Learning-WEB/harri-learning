<?php
include('con_koneksi.php');

if (isset($_SESSION['id_anggota']))
	{
	include('function_foto.php');
	$id_anggota = $_SESSION['id_anggota'];
	$sql 		= "select * from tbanggota where id_anggota='$id_anggota'";
	$data 		= mysql_query($sql);
	if (mysql_num_rows($data)>0) 
		{
		$row = mysql_fetch_assoc($data);

if (isset($_POST['edit_profile']))
	{
	$id_anggota 	= $_POST['id_anggota'];
	$nama 			= $_POST['nama'];
	$email 			= $_POST['email'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$alamat			= $_POST['alamat'];
	$kota			= $_POST['kota'];
	$ttl			= $_POST['ttl'];
	$no_kontak		= $_POST['no_kontak'];
	
	$sql = "update tbanggota set 	id_anggota 		= '$id_anggota',
									nama 			= '$nama',
									email 			= '$email',
									jenis_kelamin	= '$jenis_kelamin',
									alamat			= '$alamat',
									kota			= '$kota',
									ttl				= '$ttl',
									no_kontak		= '$no_kontak'
									where id_anggota = '$id_anggota'";
	mysql_query($sql);
	header('location:profile.php');
	}

if (isset($_POST['edit_pass']))
	{
	$id_anggota 	= $_POST['id_anggota'];
	$password		= $_POST['password'];
	
	$sql = "update tbanggota set 	id_anggota 		= '$id_anggota',
									password 		= '$password'
									where id_anggota = '$id_anggota'";
	mysql_query($sql);
	header('location:profile.php');
	}
	
if (isset($_POST['edit_foto']))
	{
	$id_anggota 	= $_POST['id_anggota'];
	$file 			= $_FILES['file'];
	$fileextensi 	= substr($file['name'],strpos($file['name'],'.')+1) ;
	
	if($fileextensi == 'jpg' OR $fileextensi == 'jpeg' OR $fileextensi == 'png' OR $fileextensi == 'gif')
		{
		move_uploaded_file($file['tmp_name'],"images/fotoprofil/$file[name]") or die ('gagal');
		$konten = 'foto = "'.$file['name'].'"';
		
		$sql = "update tbanggota set	id_anggota 	= '$id_anggota',
												$konten
												where id_anggota = '$id_anggota'";
				mysql_query($sql);
				header('location:profile.php');
		}
		else
		{
		echo '<script language="javascript">';
		echo 'alert("Maaf, file yang ada upload tidak disupport")';
		echo '</script>';
		}		
		}
	
				
	
?>

<!--CONTANT START-->
    <div class="contant">
    	<div class="container">
        	<div class="row">
            	<div class="span4">
                	<!--PROFILE IMAGE START-->
                	<div class="profile-box profile-view">
                        <div class="thumb">
                            <a href="#"><img src="<?php echo 'images/fotoprofil/'. $fungsifoto->idanggota_to_foto($row['id_anggota'])['foto']; ?>" alt="" width="140px" height="140px"></a>
                        </div>
                        <div class="text">
                            <p></p>
                            <a href="#" class="btn-style"><?php echo $row['nama'];?></a>
                        </div>
                    </div>
                    <!--PROFILE IMAGE END-->
                    <!--PROFILE IMAGE UPLOAD START-->
                	<div class="profile-box editing">
                    	<form method="post" action="profile_edit.php" enctype="multipart/form-data">
                        <ul>
                        <input name="id_anggota" type="hidden" value="<?php echo $row['id_anggota'];?>">
                        <li>
                        <label>Ganti Foto Profil</label>
                        <input name="file" type="file">
                        </li>
                        <li>
                        <label>&nbsp;</label>
                        </li>
                        <li>
                        <button type="submit" name="edit_foto" class="btn-style">Upload</button>
                        </li>
                        </ul>
                        </form>
					</div>
                    <!--PROFILE IMAGE UPLOAD END-->      
                </div>
                <div class="span8">
                	<!--EDIT PROFILE START-->
                	<div class="profile-box editing">
                    <form method="post" action="profile_edit.php">
                    	<h2>Ubah Profil</h2>
                        <ul>
                        	<li>
                            	<label>Username</label>
                                <input name="id_anggota" type="text" class="input-block-level"  placeholder="Enter your Username" value="<?php echo $row['id_anggota'];?>" readonly="readonly">
                            </li>
                            <li>
                            	<label>Nama</label>
                                <input name="nama" type="text" class="input-block-level" placeholder="Enter your Last Name" value="<?php echo $row['nama'];?>">
                            </li>
                            <li>
                            	<label>Email</label>
                                <input name="email" type="email" class="input-block-level" value="<?php echo $row['email'];?>">
                            </li>
                            <li>
                            	<label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="input-block-level">
                                	<option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </li>
                            <li>
                            	<label>Alamat</label>
                                <input name="alamat" type="text" class="input-block-level" value="<?php echo $row['alamat'];?>">
                            </li>
                            <li>
                            	<label>Kota</label>
                                <input name="kota" type="text" class="input-block-level" value="<?php echo $row['kota'];?>">
                            </li>
                            <li>
                            	<label>Tempat & Tanggal Lahir</label>
                                <input name="ttl" type="text" class="input-block-level" value="<?php echo $row['ttl'];?>">
                            </li>
                            <li>
                            	<label>Nomor Kontak</label>
                                <input name="no_kontak" type="text" class="input-block-level" value="<?php echo $row['no_kontak'];?>">
                            </li>
                            <li class="fw">
                            	<button type="submit" name="edit_profile" class="btn-style">Update</button>
                            </li>
                        </ul>
                        </form>
                    </div>
                    <!--EDIT PROFILE END-->
                    <!--EDIT PASSWORD START-->
                    <div class="profile-box editing">
                    <form method="post" action="profile_edit.php"  onsubmit="return myFunction()">
                    	<h2>Ubah Password</h2>
                        <ul>
                        <input name="id_anggota" type="hidden" value="<?php echo $row['id_anggota'];?>">
                        	<li>
                            	<label>Password Baru</label>
                                <input name="password" id="pass1" type="password" class="input-block-level"  placeholder="Ketik Password">
                            </li>
                            <li>
                            	<label>Konfirmasi Password</label>
                                <input type="password" id="pass2" class="input-block-level" placeholder="Konfirmasi Pergantian Password">
                            </li>
                            
                            <script>
								function myFunction() {
								var pass1 = document.getElementById("pass1").value;
								var pass2 = document.getElementById("pass2").value;
								var pok = true;
								if (pass1 != pass2) {
								//alert("Passwords Do not match");
								document.getElementById("pass1").style.borderColor = "#E34234";
								document.getElementById("pass2").style.borderColor = "#E34234";
								pok = false;
								alert("Password tidak sama, Mohon ulangi!");
								}
								return pok;
								}
								</script>
                                
                            <li class="fw"> 
                            	<button type="submit" name="edit_pass" class="btn-style">Update</button>
                            </li>
                            
                        </ul>
                        </form>
                    </div>
                    <!--EDIT PASSWORD END-->
                    
                </div>
            </div>
        </div>
	</div>
<!--CONTANT END-->
<?php } } ?>
