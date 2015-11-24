<?php

if (isset($_SESSION['id_anggota']) && $_SESSION['id_anggota']=='admin')
	{ ?>

<a href="proses_forum.php?aksi=hapus-balasanforum&id=<?php echo $_GET['id']; ?>&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Hapus</a>
<a href="?id=<?php echo $_GET['id']; ?>&aksi=balaskomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Balas</a>
<a href="?id=<?php echo $_GET['id']; ?>&aksi=editkomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Edit</a>

<?php
	} 
elseif (isset($_SESSION['id_anggota']) && $_SESSION['id_anggota']==$row['id_anggota'])
	{ ?>
	
<a href="proses_forum.php?aksi=hapus-balasanforum&id=<?php echo $_GET['id']; ?>&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Hapus</a>
<a href="?id=<?php echo $_GET['id']; ?>&aksi=balaskomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Balas</a>
<a href="?id=<?php echo $_GET['id']; ?>&aksi=editkomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Edit</a>

<?php
	}
else 
	{ ?>
	
<a href="?id=<?php echo $_GET['id']; ?>&aksi=balaskomentar&id_komunikasi=<?php echo $row['id_komunikasi'] ?>" class="btn-style">Balas</a>

<?php } ?> 