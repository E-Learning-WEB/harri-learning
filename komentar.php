<?php
include('con_koneksi.php');
include('function.php');
include('function_foto.php');
include 'plugin/fc.parsedown.php';
$Parsedown = new Parsedown();
//Tampilkan Materi
$id_materi	= $_GET['id_materi'];
$sql 		= "select * from tbmateri where id_materi=$id_materi";
$data 		= mysql_query($sql);
$row 		= mysql_fetch_assoc($data);

if(isset($row['materi']))
	{
	$lokasi = 'material/pdf/'.$row['materi'];
	}
?>
	<section class="gray-bg">
		<div class="container">
			<div class="row">
                <div class="span12">
                <h2><?php echo $row['judul']; ?></h2><br />
                <object data="<?php echo $lokasi?>" width="100%" height="600px"></object>
                </div>
			</div>
    	</div>
	</section>  
<!--Akhir Tampil Materi-->


<div class="container">
<div class="row">
<div class="span12">
<div class="blog">

	<div class="comments">
    	<br />
<h2>Komentar</h2>
    	<ul>
<?php
//fungsi untuk menampillkan balasan yg ada dimateri
$sql = "SELECT * FROM tbkomunikasi WHERE id_komentar=$id_materi AND tipe=2";
$data = mysql_query($sql);
while($row = mysql_fetch_assoc($data))
{
?>

			<!--COMMENTS ITEM START-->
            <li>
            <div class="thumb">
            <a href="#"><img width="70px" height="70px" src="<?php echo 'images/fotoprofil/'. $fungsifoto->idanggota_to_foto($row['id_anggota'])['foto']; ?>" alt=""></a>
            </div>
            <div class="text">
                <h4><a href="#"><?php echo $fungsi->idanggota_to_username($row['id_anggota'])['nama']; ?></a></h4>
                <p class="date"><?php echo date('d M Y H:i A',$row['waktu']) ?></p>
                <p><?php echo $Parsedown->text($row['isi']) ?></p>
                <?php include('komentar_hbe.php'); ?>
            </div>
            <!--COMMENTS ITEM END-->
          
<?php
}
?>

		</ul>
	</div>

</div>
<?php include 'komentar_input.php'; ?>
</div>
</div>
</div>