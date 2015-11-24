<?php
include('../con_koneksi.php');
include('../function.php');
?>

  <?php
  $sql = 'SELECT * FROM tbkomunikasi WHERE tipe = 1 and status = 0';
  $data = mysql_query($sql);
  while($row = mysql_fetch_assoc($data))
  {
  ?>

<!--BLOG START-->
                    	<div class="blog-contant">
                        	<h2><a href="topik.php?id=<?php echo $row['id_komunikasi'] ?>"><?php echo $row['judul'] ?></a></h2>
                            <div class="blog-tags">
                            	Filed in: <a href="#">Online Courses</a> /  Tags: <a href="#">Fashion</a>, <a href="#">Learning</a>, <a href="#">webdesign</a>, <a href="#">Course</a>
                            </div>
                            <div class="thumb">
                            	<a href="#"><img src="images/blog-img.jpg" alt=""></a>
                            </div>
                            
                            <div class="blog-comments">
                            	<a href="#"><i class="fa fa-user"></i><?php echo $fungsi->idanggota_to_username($row['id_anggota'])['nama'] ?></a>
                                <a href="#"><i class="fa fa-calendar"></i><?php echo date('d-m-Y',$row['waktu']) ?></a>
                            </div>
                        </div>
                        <!--BLOG END-->
                        
                          <?php
  }
  ?>