<link rel="shortcut icon" href="../images/icon/webicons.png">
<!--HEADER START-->
    <header>
    	<!--TOP STRIP START-->
        <div class="top-strip">
        	<div class="container">

<?php
	if (isset($_SESSION['status']) && $_SESSION['status']=='Admin')
	{ ?>
    
    
            	<!--ACCOUNT SECTION START-->
                <div class="account">
                	<ul>
                    	<li>
                        	<div class="dropdown">
                                <a class="dropdown-toggle" id="account" role="button" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                                Akun
                                <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="account">
                                    <li><a href="../profile.php">Profil</a></li>
                                    <li><a href="../profile_edit.php">Pengaturan</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="../elm_logout.php">Keluar</a></li>
                    </ul>
                </div>
                <!--ACCOUNT SECTION END-->
            </div>
        </div>
        <!--TOP STRIP END-->
        <!--NAVIGATION START-->
        <div class="navigation-bar">
        	<div class="container">
            	<div class="logo">
                	<a href="../index.php"><img src="../images/logox.png" alt=""></a>
                </div>
                
                <div class="navigation">
                <div class="navbar">
					  <div class="navbar-inner" >
						<div class="container">
						  <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <div class="nav-collapse collapse">
					<ul>
						<li><a href="../index.php">Home</a></li>
                        <li><a href="../materi.php">Materi</a></li>
                        <li><a href="index.php">Forum</a></li>
						<li><a href="javascript:void(0)">Input Data</a>
							<ul>
								<li><a href="../admin_user_input.php">User</a></li>
								<li><a href="../admin_materi_input.php">Materi</a></li>
                                <li><a href="../admin_forum_input.php">Topik Forum</a></li>
							</ul>
						</li>
                        <li><a href="javascript:void(0)">Lihat Data</a>
							<ul>
								<li><a href="../admin_user.php">User</a></li>
								<li><a href="../admin_materi.php">Materi</a>
                                <li><a href="../admin_komunikasi.php">Komunikasi</a></li>
							</ul>
						</li>
                        <li><a href="#">Contact Us</a></li>  

            
<?php
	} else if (isset($_SESSION['status']) && $_SESSION['status']=='User')
	{?>
            
      			<!--ACCOUNT SECTION START-->
                <div class="account">
                	<ul>
                    	<li>
                        	<div class="dropdown">
                                <a class="dropdown-toggle" id="account" role="button" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
                                Akun
                                <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="account">
                                    <li><a href="../profile.php">Profil</a></li>
                                    <li><a href="../profile_edit.php">Pengaturan</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="../elm_logout.php">Keluar</a></li>
                    </ul>
                </div>
                <!--ACCOUNT SECTION END-->
            </div>
        </div>
        <!--TOP STRIP END-->
        <!--NAVIGATION START-->
        <div class="navigation-bar">
        	<div class="container">
            	<div class="logo">
                	<a href="../index.php"><img src="../images/logox.png" alt=""></a>
                </div>
                
                <div class="navigation">
                <div class="navbar">
					  <div class="navbar-inner" >
						<div class="container">
						  <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <div class="nav-collapse collapse">
					<ul>
						<li><a href="../index.php">Home</a></li>
                        <li><a href="#">Blog</a></li>
						<li><a href="../materi.php">Materi</a></li>
						<li><a href="index.php">Forum</a></li>
                        <li><a href="#">Contact Us</a></li>       
            
            
            
<?php
	} else {?>
            
       <!--ACCOUNT SECTION START-->
                <div class="account">
                	<ul>
                    	<li><a href="../signin.php">Masuk</a></li>
                        <li><a href="../signup.php">Daftar</a></li>
                    </ul>
                </div>
                <!--ACCOUNT SECTION END-->
            </div>
        </div>
        <!--TOP STRIP END-->
        <!--NAVIGATION START-->
        <div class="navigation-bar">
        	<div class="container">
            	<div class="logo">
                	<a href="../index.php"><img src="../images/logox.png" alt=""></a>
                </div>
                
                <div class="navigation">
                <div class="navbar">
					  <div class="navbar-inner" >
						<div class="container">
						  <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <div class="nav-collapse collapse">
					<ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact Us</a></li>     
            
            
            
            
<?php } ?>
    
					</ul>
				</div>
            </div>
        </div></div></div></div></div>
        <!--NAVIGATION END-->
    </header>
    <!--HEADER END-->