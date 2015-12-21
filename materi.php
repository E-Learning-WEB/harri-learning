<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include'elm_css.php'; ?>
</head>
<body>
<!--WRAPPER START-->
<div class="wrapper">
    <?php include'elm_menu.php'; ?>
        <!--CONTANT START-->
    <div class="contant">
    	<!--LATEST COURSES SECTION START-->
        <section class="gray-bg">
        	<div class="container">

<?php
	include('con_koneksi.php');
	if (isset($_POST['filter']))
		{
		$cari		= $_POST['cari'];
		$sql 		= "select * from tbmateri where judul like '%$cari%'";
		$data		= mysql_query($sql) or die("$sql");
		}
	else
		{
		$sql 	= "select * from tbmateri";
		$data 	= mysql_query($sql) or die("$sql");
		}
?>

<div class="row">
            	<div class="span9">
                	<div class="featured-courses">
                    
                    <div class="span12">
                    	<h2>Materi Pembelajaran PHP</h2>
                        </div>
                    	<div class="row">
                        	
                     <?php
	while ($row = mysql_fetch_assoc($data))
	{?>
	
 
       
                           
                           
                            <div class="span3">
                            	<div class="course">
                                    <div class="text">
                                        <div class="header">
                                            <h4><?php echo $row['judul'];?></h4>
                                            
                                        </div>
                                        <div class="course-name">
                                            <p><?php echo $row['ketmateri'];?></p>
                                            
                                        </div>
                                        <div class="course-detail-btn">
                                            <a href="materi_show.php?id_materi=<?php echo $row['id_materi'];?>">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           <?php } ?>
                           
                           
                            
                        </div>
                        
                    </div>
                </div>
                <div class="span3">
                	<!--SIDEBAR START-->
                	<div class="sidebar">
					<br>
					<br>

                   		
                        
                        <div class="widget">
                        <form action="materi.php" method="post">
   							<input name="cari" type="text" class="input-block-level" placeholder="Cari Materi">
    						<button name="filter" type="submit" class="btn-materi">Cari</button>
    						</form> 
						</div>  
                        <!--COURSE CATEGORIES WIDGET END-->
                  

                    </div>
                    <!--SIDEBAR END-->
                </div>
            </div>



            </div>
        </section>
        <!--LATEST COURSES SECTION END-->

    </div>   
</div>
<!--WRAPPER END-->
<?php include'elm_js.php'; ?>
</body>
</html>
