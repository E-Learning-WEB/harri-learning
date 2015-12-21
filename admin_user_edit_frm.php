<?php
	if (isset($_POST['edit_user']))
		{
		$id_anggota = $_POST['id_anggota'];
		$nama 		= $_POST['nama'];
		$email 		= $_POST['email'];
		$password	= $_POST['password'];
		$status 	= $_POST['status'];
		include('con_koneksi.php');
		$sql = "update tbanggota set 	id_anggota 	= '$id_anggota',
										nama 		= '$nama',
										email 		= '$email',
										password 	= '$password',
										status 		= '$status'
										where id_anggota = '$id_anggota'";
		mysql_query($sql);
		header('location:admin_user.php');
		}
	if (isset($_GET['id_anggota']))
		{
		include('con_koneksi.php');
		$id_anggota = $_GET['id_anggota'];
		$sql 		= "select * from tbanggota where id_anggota='$id_anggota'";
		$data 		= mysql_query($sql);
		if (mysql_num_rows($data)>0) 
			{
			$row = mysql_fetch_assoc($data);
			?>

<div class="row">
	<div class="span3">
    </div>
    <div class="span6">
    <div class="form-box">
    <form method="post" action="admin_user_edit_frm.php">
    <div class="form-body">
    <legend>Edit Data User</legend>
    <label>Username</label>
    <input name="id_anggota" type="text" class="input-block-level" maxlength="10" required="required" readonly 
    	value="<?php echo $row['id_anggota']; ?>">
    <label>Nama Lengkap</label>
    <input name="nama" type="text" placeholder="Last Name" class="input-block-level" maxlength="35" required="required" 
    	value="<?php echo $row['nama']; ?>">
    <label>Email</label>
    <input name="email" type="text" placeholder="Enter your E-mail ID" class="input-block-level" maxlength="50" 
    	value="<?php echo $row['email']; ?>" required="required">								
    <label>Password</label>
    <input name="password" type="text" placeholder="Enter Password" class="input-block-level" maxlength="15" 
    	value="<?php echo $row['password']; ?>" required="required">
    <label>Status</label>
    <select name="status" class="input-block-level">
    	<option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    </div><br />
    <button name="edit_user" type="submit" class="btn-style">Edit</button>
    <div class="footer">
    <img src="images/edit.png" />
    </div>
    </form>
    </div>
    </div>
    </div> 

<?php } } ?>