<section class="gray-bg">
		<div class="container">
			<div class="row">
                <div class="span12">

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
$lokasi = 'upload/'.$row['waktu'] .'_'.$row['file'];
$extensi_belakang = pathinfo($lokasi,PATHINFO_EXTENSION);
?>

<?php
//jika pdf
if(strtoupper($extensi_belakang) == 'PDF')	{
?>	

	<legend><span style="float:left"><a href="materi.php"><i class="fa fa-arrow-circle-left fa-2x"></i></a></span>
	<?php echo $row['judul']; ?></legend>
    <object data="<?php echo $lokasi?>" width="100%" height="600px"></object>

<?php } ?>

<?php
//jika MP4
if(strtoupper($extensi_belakang) == 'MP4') {
?>

	<legend><span style="float:left"><a href="materi.php"><i class="fa fa-arrow-circle-left fa-2x"></i></a></span>
	<?php echo $row['judul']; ?></legend>
    <video width="70%" controls>
  	<source src="<?php echo $lokasi?>" type="video/mp4">
	Browser Anda Tidak Mendukung Format Video Kami.
	</video>
    
<?php } ?>
                
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
            <a href="#"><img class="squarephoto70" src="<?php echo 'images/fotoprofil/'. $fungsifoto->idanggota_to_foto($row['id_anggota'])['foto']; ?>" alt=""></a>
            </div>
            <div class="text">
                <h4><a href="#"><?php echo $fungsi->idanggota_to_username($row['id_anggota'])['nama']; ?></a></h4>
                <p class="date" style="float:right"><?php echo date('d M Y H:i A',$row['waktu']) ?></p>
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