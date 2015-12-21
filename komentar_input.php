<?php
	//Balas Komentar
	if(isset($_GET['aksi']))
		{
		if($_GET['aksi'] == 'balaskomentar')
			{
			$sql_kom = "SELECT isi,id_anggota FROM tbkomunikasi WHERE id_komunikasi='$_GET[id_komunikasi]'";
			$data_kom = mysql_query($sql_kom);
			$datakutipan = mysql_fetch_assoc($data_kom);
			$_SESSION['kutipan'] = $datakutipan['isi'];
			}
		elseif($_GET['aksi'] == 'editkomentar')
			{
			$sql_kom = "SELECT isi,id_anggota FROM tbkomunikasi WHERE id_komunikasi='$_GET[id_komunikasi]'";
			$data_kom = mysql_query($sql_kom);
			$datakutipan = mysql_fetch_assoc($data_kom);
			$_SESSION['kutipan'] = $datakutipan['isi'];
			}
		}
	//akhir Balas Komentar
	else
		{
		$_SESSION['kutipan'] = NULL;
		}
?>

<div class="leave-reply">
<?php 	

		if($_SESSION['kutipan'])
			{
			if ($_GET['aksi'] == 'balaskomentar')
				{
				echo'<h2>Beri Balasan Komentar</h2>';
				}
			elseif($_GET['aksi'] == 'editkomentar')
				{ 
				echo'<h2>Edit Komentar</h2>';
				}
			}
		else
			{
				echo'<h2>Beri Komentar</h2>';
			}
?>
<form method="post" action="proses.php">
<input type="hidden" name="id_materi" value="<?php echo $_GET['id_materi']; ?>" />
<input type="hidden" name="id_komunikasi" value="<?php echo $_GET['id_komunikasi']; ?>">
<?php
if(!empty($_SESSION['kutipan']) && $_GET['aksi'] == 'balaskomentar')
	{
	$balasan_anggota = $fungsi->idanggota_to_username($datakutipan['id_anggota'])['nama'];
	$isi =	//"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quoted: ". $balasan_anggota.		
			//"<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ ".$_SESSION['kutipan']." ]</p>"
			"<div class='quote'>Originally posted by: ". $balasan_anggota.
			
			"<div class='quotetext'> ".$_SESSION['kutipan']." </div></div>"
			;
	}
	elseif(!empty($_SESSION['kutipan']) && $_GET['aksi'] == 'editkomentar')
	{
	$isi =	$_SESSION['kutipan'];
			}
else
	{
	$isi = null;
	}
?>

    <textarea class="input-block-level" data-provide="markdown" name="isi"><?php echo $isi ?></textarea>
<?php 	
if($_SESSION['kutipan'])
	{
	if ($_GET['aksi'] == 'balaskomentar')
		{
		echo'<button name="kirimkomentarmateri" type="submit" class="btn-style">Kirim</button>';
		}
	elseif($_GET['aksi'] == 'editkomentar')
		{ 
		echo'<button name="editkomentarmateri" type="submit" class="btn-style">Edit</button>';
		}
	}
else
	{
	echo'<button name="kirimkomentarmateri" type="submit" class="btn-style">Kirim</button>';
	}
?>
</form>
</div>
