<div class="row">
			<div class="span12">
                	<div class="form-box">
                        <form action="admin_user.php" method="post">
                        <div class="form-body">
                        <fieldset>
                        <legend>Data User</legend>
                            <div class="row-fluid">
                            <div class="span5">
                            <label>Kriteria</label>
                            <select name="kriteria" class="input-block-level">
                                <option value="id_anggota">Username</option>
                                <option value="nama">Nama</option>
                                <option value="email">Email</option>
                                <option value="password">Password</option>
                                <option value="status">Status</option>
                       		</select>
                            </div>
                            <div class="span5">
                            <label>Kondisi</label>
                            <input name="cari" type="text" class="input-block-level" maxlenght="20">                        	
                            </div>
                            <div class="span2">
                            <label>&nbsp;</label>
                        	<button name="filter" type="submit" class="btn-style">Filter</button>
                        	</div>
                        </fieldset>
                         </div>
                            <div class="footer">
                                
                            


<?php
	include('con_koneksi.php');
	if (isset($_POST['filter']))
	{
		$kriteria 	= $_POST['kriteria'];
		$cari 		= $_POST['cari'];
		$sql 		= "select * from tbanggota where $kriteria like '%$cari%'";
		$data		= mysql_query($sql) or die("$sql");
	}
	else
	{
		$sql 	= "select * from tbanggota";
		$data 	= mysql_query($sql) or die("$sql");
	}
?>
		<div class="profile-box editing">
		<table style="text-align:left">
        	<thead>
            <tr height="50px">
                <td><strong>Nama</strong></td>
                <td><strong>Username</strong></td>
                <td><strong>Password</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Status</strong></td>
                <td><strong>Foto</strong></td>
                <td><strong>Proses</strong></td>
            </tr></thead>
<?php
	while ($row = mysql_fetch_assoc($data))
	{?>
            <tr height="35px">
                <td><b><?php echo $row['nama'];?></b></td>
                <td><b><?php echo $row['id_anggota'];?></b></td>
                <td><b><?php echo $row['password'];?></b></td>
                <td><b><?php echo $row['email'];?></b></td>
                <td><b><?php echo $row['status'];?></b></td>
                <td><b><?php echo $row['foto'];?></b></td>
                <td><a href="admin_user_del.php?id_anggota=<?php echo $row['id_anggota']; ?>">
                	<i class="fa fa-trash-o fa-2x" title="Delete"></i></a>                    
                    <a href="admin_user_edit.php?id_anggota=<?php echo $row['id_anggota']; ?>">
                    <i class="fa fa-pencil fa-2x" title="Edit"></i></a>
                </td>
            </tr>
 
<?php } ?>
</div>
		</table>

                        </form>
                    </div>
                </div>