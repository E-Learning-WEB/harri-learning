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
                    <h2>Kategori Forum</h2>
                    	<?php include 'daftar_kforum.php'; ?>
                        
                        
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
