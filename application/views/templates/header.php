<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <title><?php echo ucfirst($current)?> | Quality Builders</title>

    <meta name="Psybo Technologies" content="psybotechnologies.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css" >
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="stylesheets/colors/color1.css" id="colors">
	<!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="stylesheets/animate.css">
    <!-- Favicon and touch icons  -->
    <link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="icon/favicon.png" rel="shortcut icon">
</head>                                 


<body class="header_sticky">   
    <!-- Preloader -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section>   
    <!-- Boxed -->
    <div class="boxed">

    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">                      
                    <ul class="flat-information">
                        <li class="phone"><a href="+84905010025">Call us: +91 9995 6 300 30</a></li>
                        <li class="email"><a href="mailto:info@qualitybuilder.com">Email: info@qualitybuilder.in</a></li>
                        
                    </ul>                    
                </div><!-- /.col-md-6 -->       
                <div class="col-md-6">
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>                  
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </div>
                </div>        
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.top -->

    <!-- Header -->            
    <header id="header" class="header clearfix">
        <div class="container">
            <div class="row">                 
                <div class="header-wrap clearfix">
                    <div class="col-md-4">
                        <div id="logo" class="logo">
                            <a href="home" rel="home">
                                <img src="images/logo.png" alt="image">
                            </a>
                        </div><!-- /.logo -->
                        <div class="btn-menu">
                            <span></span>
                        </div><!-- //mobile menu button -->
                    </div>
                    <div class="col-md-8">
                        <div class="nav-wrap">                            
                            <nav id="mainnav" class="mainnav">
                                <ul class="menu"> 
                                    <li class="<?php echo ($current == 'Home' ? 'active' : '') ?>"><a href="home">Home</a></li>
                                    <li class="<?php echo ($current == 'About Us' ? 'active' : '') ?>"><a href="about">About Us</a></li>
                                    <li class="<?php echo ($current == 'Portfolio' ? 'active' : '') ?>"><a href="portfolio">Our Portfolio</a></li>                     
                                    <li class="<?php echo ($current == 'Moments' ? 'active' : '') ?>"><a href="moments">Our Moments</a></li>                     
                                    <li class="<?php echo ($current == 'Contact Us' ? 'active' : '') ?>"><a href="contact">Contact Us</a></li>                     
                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav --> 
                        </div><!-- /.nav-wrap -->
                        
                    </div>                      
                </div><!-- /.header-inner -->                 
            </div><!-- /.row -->
        </div>
    </header><!-- /.header -->