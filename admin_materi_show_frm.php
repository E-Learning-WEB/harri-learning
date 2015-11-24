<?php
	include('con_koneksi.php');
	$id_materi	= $_GET['id_materi'];
	$sql 		= "select * from tbmateri where id_materi=$id_materi";
	$data 		= mysql_query($sql);
	$row 		= mysql_fetch_assoc($data);

	if(isset($row['materi']))
		{
		$lokasi = 'material/pdf/'.$row['materi'];
		}
?>

			<div class="row">
               	
            	<div class="span12">
                	<div class="form-box">
					 <div class="form-body">
                     <legend><span style="float:left"><a href="admin_materi.php"><i class="fa fa-arrow-circle-left fa-2x"></i></a></span>
					 	<?php echo $row['judul']; ?></legend>
                     <object data="<?php echo $lokasi?>" width="100%"
                     height="600px"></object>
                     </div>
                    </div>
                </div>
                
            </div>
