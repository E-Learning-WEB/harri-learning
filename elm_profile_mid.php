<?php
if (isset($_SESSION['id_anggota']))
	{
	include('con_koneksi.php');
	include('function_foto.php');
	$id_anggota = $_SESSION['id_anggota'];
	$sql 		= "select * from tbanggota where id_anggota='$id_anggota'";
	$data 		= mysql_query($sql);
	
	if (mysql_num_rows($data)>0) 
		{
		$row = mysql_fetch_assoc($data);
?>

<!--CONTANT START-->
    <div class="contant">
    	<div class="container">
        	<div class="row">
            	<div class="span4">
                	<!--PROFILE IMAGE START-->
                	<div class="profile-box profile-view">
                        <div class="thumb">
                            <img src="<?php echo 'images/fotoprofil/'. $fungsifoto->idanggota_to_foto($row['id_anggota'])['foto']; ?>" alt="" width="140px" height="140px">
                        </div>
                        <div class="text">
                            <p>Selamat Datang</p>
                            <a class="btn-style"><?php echo $row['nama'];?></a>
                        </div>
                    </div>
                    <!--PROFILE IMAGE END-->
                    <!--EDIT PROFILE START-->
                    <div class="profile-box edit-profile">
                    	<h2>Account Setting</h2>
                        <ul>
                        	<li><a href="profile_edit.php">Edit Profil</a></li>
                        </ul>
                    </div>
                    <!--EDIT PROFILE END-->
                </div>
                <span>&nbsp;</span>
                <div class="span8">
                	<!--EDIT PROFILE START-->
                	<div class="profile-box editing">
                    	<h2>Data Profil</h2>
                        <ul>
                        	<li>
                            	<label><strong>Username</strong></label><br />
                                <label><?php echo $row['id_anggota'];?></label>
                            </li>
                            <li>
                            	<label><strong>Nama</strong></label><br />
                                <label><?php echo $row['nama'];?></label>
                            </li>
                            <li>
                            	<label><strong>Email</strong></label><br />
                                <label><?php echo $row['email'];?></label>
                            </li>
                            <li>
                            	<label><strong>Jenis Kelamin</strong></label><br />
                                <label><?php echo $row['jenis_kelamin'];?></label>
                            </li>
                            <li>
                            	<label><strong>Alamat</strong></label><br />
                                <label><?php echo $row['alamat'];?></label>
                            </li>
                            <li>
                            	<label><strong>Kota</strong></label><br />
                                <label><?php echo $row['kota'];?></label>
                            </li>
                            <li>
                            	<label><strong>Tempat & Tanggal Lahir</strong></label><br />
                                <label><?php echo $row['ttl'];?></label>
                            </li>
                            <li>
                            	<label><strong>Nomor Kontak</strong></label><br />
                                <label><?php echo $row['no_kontak'];?></label>
                            </li>
                            
                        </ul>
                    </div>
                    <!--EDIT PROFILE END-->
                   
                </div>
            </div>
        </div>
	</div>
<!--CONTANT END-->
<?php } } ?>
