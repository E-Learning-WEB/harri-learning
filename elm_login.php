<?php
	if (isset($_POST['login']))
		{
		include('con_koneksi.php');
		$sql 	= "select * from tbanggota where id_anggota ='$_POST[id_anggota]' and password = '$_POST[password]'";
		$data 	= mysql_query($sql);
			
		if (mysql_num_rows($data)>0)
			{
			$row = mysql_fetch_assoc($data);
			$_SESSION['login_phpro']=True;
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['id_anggota'] = $row['id_anggota'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['status'] = $row['status'];
			
			}
		}
		
			if (isset($_SESSION['login_phpro']))
				{
				echo '<meta http-equiv="refresh" content="3; url=index.php" /><br/>';
				echo '                
						<div class="row">
						<div class="span3">
						</div>
						<div class="span6">
							<div class="form-box">
								<form>
								<div class="form-body">
								<fieldset>
								<br>
								<legend>Kamu akan diarahkan...</legend>';
								echo "<label>Selamat datang, ";
								echo $row['nama'];
								echo'</label>
								<label>Kamu akan diarahkan ke halaman utama dalam 3 detik</label>
								<label>Klik <a href="index.php">disini</a> jika kamu tidak diarahkan </label>
								</fieldset>
								</div>
								<div class="footer">
                                <img src="images/welcome.png">
                            	</div>
								</form>
							</div>
						</div>';
					}
			else { ?>
            
                
                <div class="row">
                <div class="span3">
                </div>
            	<div class="span6">
                	<div class="form-box">
                        <form action="signin.php" method="post">
                        <div class="form-body">
                        <fieldset>
                        <legend>Login Member PHPRO</legend>
                        <label>Username</label>
                        <input name="id_anggota" type="text" placeholder="Enter your Username" class="input-block-level" maxlenght="10">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="Enter Password" class="input-block-level" maxlenght="15">                        
                        
                        <button name="login" type="submit" class="btn-style">Masuk</button>
                        </fieldset>
                         </div>
                            <div class="footer">
                                <ul>
                            	<li><a href="#">Lupa Password ?</a></li>
                                <br /><br /><br /><br />
								<li><a href="#">Belum Punya Akun ? Daftar Sekarang!</a></li>
                            </ul>
                            <a href="signup.php"><button class="btn-style">Daftar</button></a>
                            </div>
                        </form>
                    </div>
                </div>

<?php } ?>