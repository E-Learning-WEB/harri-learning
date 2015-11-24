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
</div>
		</table>

                        </form>
                    </div>
                </div>
        