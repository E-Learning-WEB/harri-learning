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
	<div class="span1">
	</div>
    <div class="span10">
    <div class="form-box">
    <form action="admin_materi.php" method="post">
    <div class="form-body">
    <fieldset>
    <legend>Materi</legend>
    <div class="row-fluid">
    <div class="span10">
    <input name="cari" type="text" class="input-block-level" maxlenght="20">                        	
    </div>
    <div class="span2">
    <button name="filter" type="submit" class="btn-style">Cari</button>
    </div>
    </fieldset>
    </div>
    <div class="footer">
    
<?php
	include('con_koneksi.php');
	if (isset($_POST['filter']))
		{
		$kriteria 	= $_POST['kriteria'];
		$cari		= $_POST['cari'];
		$sql 		= "select * from tbmateri where $kriteria like '%$cari%'";
		$data		= mysql_query($sql) or die("$sql");
		}
	else
		{
		$sql 	= "select * from tbmateri";
		$data 	= mysql_query($sql) or die("$sql");
		}
?>

	<div class="profile-box editing">
	<table style="text-align:left">
    <thead>
	<tr height="50px">
    	<td><strong>Judul</strong></td>
    </tr></thead>

<?php
	while ($row = mysql_fetch_assoc($data))
	{?>
	
    <tr height="35px">
    	<td><b><a href="materi_show.php?id_materi=<?php echo $row['id_materi'];?>"><?php echo $row['judul'];?></a></b></td>
    </tr>
 
<?php } ?>
	
	</table>
	</div>
    </div>
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
