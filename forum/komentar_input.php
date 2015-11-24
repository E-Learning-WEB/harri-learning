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
<form method="post" action="proses_forum.php">
<input type="hidden" name="id_komentar" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="id_komunikasi" value="<?php echo $_GET['id_komunikasi']; ?>">
<?php
if(!empty($_SESSION['kutipan']) && $_GET['aksi'] == 'balaskomentar')
	{
	$balasan_anggota = $fungsi->idanggota_to_username($datakutipan['id_anggota'])['nama'];
	$isi =	"<blockquote>Quoted: ". $balasan_anggota.		
			"<p>'".$_SESSION['kutipan']."'</p>".
			"</blockquote>";
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

    <textarea class="input-block-level" data-provide="markdown" name="isi" placeholder="Isi Komentar..."><?php echo $isi ?></textarea>

<?php 	
if($_SESSION['kutipan'])
	{
	if ($_GET['aksi'] == 'balaskomentar')
		{
		echo'<button name="kirimkomentarforum" type="submit" class="btn-style">Kirim</button>';
		}
	elseif($_GET['aksi'] == 'editkomentar')
		{ 
		echo'<button name="editkomentarforum" type="submit" class="btn-style">Edit</button>';
		}
	}
else
	{
	echo'<button name="kirimkomentarforum" type="submit" class="btn-style">Kirim</button>';
	}
?>
</form>
</div>
