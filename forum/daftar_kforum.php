<?php
include('../con_koneksi.php');
include('../function.php');
?>

  <?php
  $sql = 'SELECT * FROM tbkforum';
  $data = mysql_query($sql);
  while($row = mysql_fetch_assoc($data))
  {
  ?>

<!--SIDEBAR START-->
<div class="sidebar">
<!--PAPULAR POST WIDGET START-->
<div class="widget widget-papular-post">
	<ul>
    <!--LIST ITEM START-->
    &nbsp;
    <li>
    <h4><a href="kategori.php?kategori=<?php echo $row['kategori'] ?>"><?php echo $row['kategori'] ?></a></h4>
    <div class="text">
    <p class="date"> Deskripsi: <?php echo $row['keterangan'] ?></p>
    </div>
    </li>
    <!--LIST ITEM END-->
    </ul>
</div>
<!--PAPULAR POST WIDGET END-->
</div>
<!--SIDEBAR END-->
<?php
}
?>