<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include'elm_fcss.php'; ?>
</head>
<body>
<!--WRAPPER START-->
<div class="wrapper">
    <?php include'elm_menu.php'; ?>
    <?php include'elm_ftop.php'; ?>
<!--CONTANT START-->
    <div class="contant">
    	<div class="container">
        	<div class="row">
            	<div class="span12">
                	<div class="blog">
                    <h2>Topik Forum</h2>
                    	<?php include 'daftar_topik.php'; ?>
                        
                        
                    </div>
                    <div class="pagination">
                    	<ul>
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--<div class="span4">
                	
                </div>-->
            </div>
            
        </div>

    </div>
    <!--CONTANT END-->
	<?php include'elm_ffooter.php'; ?>
    
       
</div>
<!--WRAPPER END-->
<?php include'elm_fjs.php'; ?>
</body>
</html>
