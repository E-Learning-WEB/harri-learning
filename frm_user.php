<?php
	include('con_koneksi.php');
	if (isset($_POST['daftar']))
		{
		$id_anggota 	= $_POST['id_anggota'];
		$nama		 	= $_POST['nama'];
		$email 			= $_POST['email'];
		$password 		= $_POST['password'];
		
		if (trim($id_anggota)=='' or trim($password)=='')
			{
			echo '<br />';
			echo "<p style='text-align:center'>Username dan password kosong</p>";
			echo "<p style='text-align:center'><a class='button special' href='signup.php'>Kembali</a></p>";
			}
		else
			{
			//untuk cek apakah id_anggota sudah terpakai atau belum
			$sql = "select * from tbanggota where id_anggota = '$id_anggota'";	
			$data = mysql_query($sql);
			
			if (mysql_num_rows($data)>0)
				{
				echo '<br />';
				echo "<p style='text-align:center'>Username telah terpakai</p>";
				echo "<p style='text-align:center'><a class='button special' href='signup.php'>Kembali</a></p>";
				}
				
				else
				{
				$sql = "insert into tbanggota set  id_anggota 	= '$id_anggota',
												   nama 		= '$nama',
												   email 		= '$email',
												   password	 	= '$password',
												   status 		= 'User'";
				mysql_query($sql);
				echo '<br />';
				echo "<p style='text-align:center'>Selamat anda sudah resmi terdaftar pada website HTPRO</p>";
				echo '<br />';
				echo "<p style='text-align:center'><a class='btn-style' href='signin.php'>Masuk</a></p>";
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
                        <form method="post" action="signup.php" onsubmit="return myFunction()">
                        	<div class="form-body">
                            <fieldset>
                                <legend>Belum punya akun? Daftar sekarang!</legend>
                                <label>Username</label>
                               	<input name="id_anggota" type="text" placeholder="Masukkan Username" class="input-block-level" maxlength="10" 
                                	required="required">
                                <label>Nama Lengkap</label>
                               	<input name="nama" type="text" placeholder="Masukkan Nama Lengkap" class="input-block-level" maxlength="35" 
                                	required="required">
                                <label>Email</label>
                                <input name="email" type="text" placeholder="Masukkan Email" class="input-block-level" maxlength="50" required="required">
                                <div class="row-fluid">
                                	<div class="span6">
                                        <label>Password</label>
                                        <input name="password" id="pass1" type="password" placeholder="Masukkan Password" class="input-block-level" 
                                        	maxlength="15" required="required">
                                    </div>
                                    <div class="span6">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" id="pass2" placeholder="Ketik Ulang Password" class="input-block-level" 
                                        	maxlength="15" required="required">
                                    </div>
                                </div>
                                
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
                                    
                                <button name="daftar" type="submit" class="btn-style">Sign Up</button>
                            </fieldset>
                            </div>
                            <div class="footer">
                                <p>Dengan Mendaftar, Kamu Menerima Segala Peraturan &amp; Kondisi HTPRO</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php } ?>
                        
						
                        