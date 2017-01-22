
 <?php
 $logout = "";
    if(isset($_SESSION['userId']) && isset($_SESSION['userType']) && isset($_SESSION['username'] ) ){
        $logout = "LOG OUT";
        $link = "logOut.php";
    }
    else{
        $logout = "LOG IN";
        $link = "login.php";
    }
 ?>
<body>
    <div class="page">
        <div id="spinner">
            <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>
        <div class="header-top clear">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 hidden-sm hidden-xs">
                        <div class="header-top-left header-top-info">
                        <ul class="menu-logo">
                        <li>
                            <a href="index.php"> <img src="images/logo.png" alt="logo" class="img-responsive" style="height: 39px;width:206px;float: left"> </a>
                        </li>
                    </ul>
                            <p style="float:right;"><a href="tel:+3211234567"><i class="fa fa-phone"></i>+91-966-384-6761</a></p>
                            <p style="float:right;"><a href="mailto:contact@scriptsbundle.com"><i class="fa fa-envelope"></i>connect@qwiklync.com</a></p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <nav id="menu-1" class="mega-menu fa-change-black" data-color="" >
            <section class="menu-list-items container-fluid" style="background-color: #29aafe" >
                <div class="container" >
                   
                    <ul class="menu-links pull-right"  >
                        <li> <a href="index.php"> HOME </a>
                        </li>
                        <li> <a href="all-company.php"> ALL  COMPANIES </a>
                        </li>
						<li> <a href="all-categories.php"> ALL  Jobs </a>
                        </li>
                        <li> <a href="blog.php"> Blog </a>
                        </li>
                        <li> <a href="contactus.php"> CONTACT US </a>
                        </li>
           
                        <li class="login-btn-no-bg"><a href="post-job.php" class="p-job" ><i class="fa fa-plus-square"></i> POST A JOB</a></li>
                        <li class="login-btn-no-bg"><a href=<?php echo $link ?> class="p-job" ><i class="fa fa-sign-in"></i> <?php echo $logout; ?></a></li> 
                    </ul>
                </div>
            </section>
        </nav>
    <div class="clearfix"></div>

        <div class="search">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span id="search_concept">Filter By</span> <span class="caret"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">By Company</a></li>
                                    <li><a href="#">By Function</a></li>
                                    <li><a href="#">By City </a></li>
                                    <li><a href="#">By Salary </a></li>
                                    <li><a href="#">By Industry</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>