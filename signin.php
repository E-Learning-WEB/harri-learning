<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'elm_css.php' ?>
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
		<?php include'elm_login.php'; ?>
            </div>
        </section>
        <!--LATEST COURSES SECTION END-->
    </div>
       <?php include'elm_footer.php'; ?>
</div>
<!--WRAPPER END-->
<?php include 'elm_js.php' ?>
</body>
</html>
