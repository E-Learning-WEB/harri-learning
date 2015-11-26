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

<div class="row">
	<div class="span12">
    	<div class="form-box">
        <form action="admin_komunikasi.php" method="post">
        <div class="form-body">
        <legend>Data Komunikasi</legend>
        <legend>PS: Untuk Tipe: 0 = Komentar Forum, 1 = Awal Forum (TS), 2 = Komentar Materi<br>
        		Untuk Status: 0 = Open, 1 = Closed, 2 = Deleted
        </legend>
        <div class="row-fluid">
        <div class="span5">
        <label>Kriteria</label>
        <select name="kriteria" class="input-block-level">
            <option value="id_komunikasi">Nomor</option>
            <option value="tipe">Tipe</option>
            <option value="status">Status</option>
            <option value="id_komentar">ID Komentar</option>
            <option value="id_anggota">ID Anggota</option>
            <option value="judul">Judul</option>
            <option value="waktu">Waktu</option>
            <option value="isi">Isi</option>
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
        </div>
        </div>
        <div class="footer">
                                
<?php
	include('con_koneksi.php');
	if (isset($_POST['filter']))
		{
		$kriteria 	= $_POST['kriteria'];
		$cari		= $_POST['cari'];
		$sql 		= "select * from tbkomunikasi where $kriteria like '%$cari%'";
		$data		= mysql_query($sql) or die("$sql");
		}
	else
		{
		$sql 	= "select * from tbkomunikasi";
		$data 	= mysql_query($sql) or die("$sql");
		}
?>
		
        <div class="profile-box editing">
		<table style="text-align:left">
        	<thead>
            <tr height="50px">
                <td><strong>Nomor</strong></td>
				<td><strong>Tipe</strong></td>
                <td><strong>Status</strong></td>
                <td><strong>ID Komentar</strong></td>
                <td><strong>ID Anggota</strong></td>
                <td><strong>Kategori</strong></td>
                <td><strong>Judul</strong></td>
                <td><strong>Waktu</strong></td>
                <td><strong>Isi</strong></td>
                <td><strong>Proses</strong></td>
            </tr></thead>
            
<?php
	while ($row = mysql_fetch_assoc($data))
	{?>
            <tr height="35px">
            	<td><b><?php echo $row['id_komunikasi'];?></b></td>
                <td><b><?php echo $row['tipe'];?></b></td>
                <td><b><?php echo $row['status'];?></b></td>
                <td><b><?php echo $row['id_komentar'];?></b></td>
                <td><b><?php echo $row['id_anggota'];?></b></td>
                <td><b><?php echo $row['kdkforum'];?></b></td>
                <td><b><?php echo $row['judul'];?></b></td>
                <td><b><?php echo date('d-m-Y - H:i:s A',$row['waktu']);?></b></td>
                <td><b><?php echo $row['isi'];?></b></td>
                <td><a href="admin_komunikasi_del.php?id_komunikasi=<?php echo $row['id_komunikasi']; ?>"title="Hapus Data">
                    <i class="fa fa-trash-o fa-2x" title="Delete"></i></a> 
                    <a href="admin_komunikasi_edit.php?id_komunikasi=<?php echo $row['id_komunikasi']; ?>"title="Edit Data">
                    <i class="fa fa-pencil fa-2x" title="Edit"></i></a> 
                </td>
            </tr>
 
<?php } ?>
		</div>
		</table>
        </div>
        </form>
        </div>
	</div>
</div>

            </div>
        </section>
        <!--LATEST COURSES SECTION END-->
    </div>
</div>
<!--WRAPPER END-->
<?php include'elm_js.php'; ?> 
</body>
</html>