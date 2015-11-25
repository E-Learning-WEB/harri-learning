<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include'elm_css.php'; ?>  
    <?php include'elm_css_comment.php'; ?> 
</head>
<body>
<!--WRAPPER START-->
<div class="wrapper">
    <?php include'elm_menu.php'; ?>
    <!--CONTANT START-->
    <div class="contant">
    <?php include 'komentar.php'; ?>
	</div>
    <!--CONTANT START-->  
    <?php include 'elm_footer.php' ?>
</div>
<!--WRAPPER END-->
<?php include'elm_js.php'; ?> 
<?php include'elm_js_comment.php'; ?> 
</body>
</html>