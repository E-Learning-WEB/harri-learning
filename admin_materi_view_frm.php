<div class="row">
	<div class="span1">
                </div>
            	<div class="span10">
                	<div class="form-box">
                        <form action="admin_materi.php" method="post">
                        <div class="form-body">
                        <fieldset>
                        <legend>Data Materi</legend>
                            <div class="row-fluid">
                            <div class="span5">
                            <label>Kriteria</label>
                            <select name="kriteria" class="input-block-level">
                                <option value="id_materi">ID Materi</option>
                                <option value="judul">Judul</option>
                                <option value="materi">Materi</option>
                                <option value="video">Video</option>
                                <option value="waktu">Waktu</option>
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
                <td width="10px"><strong>ID Materi</strong></td>
				<td><strong>Judul</strong></td>
                <td><strong>Materi</strong></td>
                <td><strong>Video</strong></td>
                <td><strong>Waktu</strong></td>
                <td><strong>Proses</strong></td>
            </tr></thead>
<?php
	while ($row = mysql_fetch_assoc($data))
	{?>
            <tr height="35px">
                <td><b><?php echo $row['id_materi'];?></b></td>
                <td><b><a href="admin_materi_show.php?id_materi=<?php echo $row['id_materi'];?>"><?php echo $row['judul'];?></a></b></td>
                <td><b><?php echo $row['materi'];?></b></td>
                <td><b><?php echo $row['video'];?></b></td>
                <td><b><?php echo date('d-m-Y - H:i:s A',$row['waktu']);?></b></td>
                <td><a href="admin_materi_del.php?id_materi=<?php echo $row['id_materi']; ?>"title="Hapus Data">
                    <i class="fa fa-trash-o fa-2x" title="Delete"></i></a> 
                    <a href="admin_materi_edit.php?id_materi=<?php echo $row['id_materi']; ?>"title="Edit Data">
                    <i class="fa fa-pencil fa-2x" title="Edit"></i></a> 
                </td>
            </tr>
 
<?php } ?>
</div>
		</table>

                        </form>
                    </div>
                </div>