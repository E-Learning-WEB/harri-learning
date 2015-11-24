<?php
include('../con_koneksi.php');
include('../function.php');
include('../function_foto.php');
include '../plugin/fc.parsedown.php';
$Parsedown = new Parsedown();
//Tampilkan Awal Forum
$id 		= $_GET['id'];
$sql 		= "SELECT * FROM tbkomunikasi WHERE id_komunikasi=$id AND tipe=1 and status =0";
$data 		= mysql_query($sql);
$row 		= mysql_fetch_assoc($data);

//check status hapus
if(mysql_num_rows($data)==0)
	{
	echo "Forum telah dihapus";
	}
else
{

?>
	<!--CONTANT START-->
    <div class="contant">
    	<div class="container">
        	<div class="row">
            	<div class="span1">
                </div>
            	<div class="span10">
                	<div class="blog">
                    	<!--BLOG START-->
                    	<div class="blog-contant">
                        	<h2><a href="#"><?php echo $row['judul'] ?></a></h2>
                            <div class="blog-tags">
                            	Permulaan Topik
                            </div>
                            
                            <div class="text">
                            	<p><?php echo $row['isi'] ?></p>
                            </div>
                            <a href="proses_forum.php?aksi=hapus-topikforum&id=<?php echo $_GET['id']; ?>" class="btn-style">Hapus</a>
                            <div class="blog-comments">
                            	<a href="#"><i class="fa fa-user"></i><?php echo $fungsi->idanggota_to_username($row['id_anggota'])['nama'] ?></a>
                                <a class="pull-right" href="#"><i class="fa fa-calendar"></i><?php echo date('d M Y',$row['waktu']) ?></a>
                            </div>
                        </div>
                        <!--BLOG END-->
<!--Akhir Tampil Awal Forum-->


                        <div class="comments">
                            <h2>Komentar</h2>
                            <ul>
<?php
//fungsi untuk menampillkan balasan yg ada diforum
$sql = "SELECT * FROM tbkomunikasi WHERE id_komentar=$id AND tipe=0";
$data = mysql_query($sql);
while($row = mysql_fetch_assoc($data))
{
?>

                                <!--COMMENTS ITEM START-->
                                <li>
                                    <div class="thumb">
                                        <a href="#"><img width="70px" height="70px" src="<?php echo '../images/fotoprofil/'. $fungsifoto->idanggota_to_foto($row['id_anggota'])['foto']; ?>" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <h4><a href="#"><?php echo $fungsi->idanggota_to_username($row['id_anggota'])['nama']; ?></a></h4>
                                        <p class="date"><?php echo date('d M Y H:i A',$row['waktu']) ?></p>
                                        <p><?php echo $Parsedown->text($row['isi']) ?></p>
                                       <?php include('komentar_fhbe.php'); ?>
                                    </div>
                                </li>
                                <!--COMMENTS ITEM END-->
          
<?php
}
?>
							</ul>
						</div>
					</div>
					<?php include 'komentar_input.php'; ?>
				</div>
			</div>
		</div>
	</div>
    
<?php 
}
?>