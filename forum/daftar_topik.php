<?php
include('../con_koneksi.php');
include('../function.php');
?>

  <?php
  $kategori = $_GET['kategori'];
  $sql = "SELECT * FROM tbkomunikasi WHERE kdkforum='$kategori'";
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
                        &nbsp;<li>
                        <h4><a href="topik.php?id=<?php echo $row['id_komunikasi'] ?>"><?php echo $row['judul'] ?></a></h4>
                            <div class="text">
                                <p class="date"> Di post tanggal <?php echo date('d M Y',$row['waktu']) ?> oleh<span>  
                                <?php echo $fungsi->idanggota_to_username($row['id_anggota'])['nama'] ?> </span></p>
                                
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