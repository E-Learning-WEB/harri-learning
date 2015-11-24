<?php
	
if (isset($_SESSION['id_anggota']) && $_SESSION['id_anggota']=='admin')
	{ ?>

<a href="proses.php?aksi=hapus-balasanmateri&id_materi=<?php echo $_GET['id_materi']; ?>&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" 
	class="btn-style">Hapus</a>
<a href="?id_materi=<?php echo $_GET['id_materi']; ?>&aksi=balaskomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Balas</a>
<a href="?id_materi=<?php echo $_GET['id_materi']; ?>&aksi=editkomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Edit</a>

<?php
	} 
elseif (isset($_SESSION['id_anggota']) && $_SESSION['id_anggota']==$row['id_anggota'])
	{ ?>
	
<a href="proses.php?aksi=hapus-balasanmateri&id_materi=<?php echo $_GET['id_materi']; ?>&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" 
	class="btn-style">Hapus</a>
<a href="?id_materi=<?php echo $_GET['id_materi']; ?>&aksi=balaskomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Balas</a>
<a href="?id_materi=<?php echo $_GET['id_materi']; ?>&aksi=editkomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Edit</a>

<?php
	}
else 
	{ ?>
	
<a href="?id_materi=<?php echo $_GET['id_materi']; ?>&aksi=balaskomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Balas</a>

<?php } ?> 