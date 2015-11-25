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
<div class="form-body">

<?php
	include('con_koneksi.php');
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

    <legend><span style="float:left"><a href="admin_materi.php"><i class="fa fa-arrow-circle-left fa-2x"></i></a></span>
	<?php echo $row['judul']; ?></legend>
    <object data="<?php echo $lokasi?>" width="100%" height="600px"></object>

<?php } ?>

<?php
//jika MP4
if(strtoupper($extensi_belakang) == 'MP4') {
?>

	<legend><span style="float:left"><a href="admin_materi.php"><i class="fa fa-arrow-circle-left fa-2x"></i></a></span>
	<?php echo $row['judul']; ?></legend>
    <video width="100%" height="100%" controls>
  	<source src="<?php echo $lokasi?>" type="video/mp4">
	Your browser does not support the video tag.
	</video>
    
<?php } ?>

</div>
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
