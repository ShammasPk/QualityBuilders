<?php

?>
            
    <!-- Page title -->
    <div class="page-title" style="background-image: url('<?php echo base_url();?>images/banner-about.png');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="page-title-heading">
                        <h1 class="title">Welcome to Our Portfolio</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="blog.html">Page</a></li>                            
                            <li> Work </li>
                        </ul>                   
                    </div><!-- /.breadcrumbs -->   
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 
<?php
if ($portfolio != FALSE) {
    ?>
    <!-- Work Detail -->
    <section class="main-content page-single page-about">
        <div class="container">
            <div class="row">
                <div class="page-content">
                    <div class="post-wrap">
                        <div class="featured-post flat-blog-slider">
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php if (isset($portfolio) and $portfolio != FALSE) {
                                        foreach ($portfolio[0]->file as $image) {
                                            ?>
                                            <li>
                                                <img src="<?php echo $image->imgUrl; ?>" alt="image">
                                            </li>
                                        <?php
                                        }
                                    }?>
                                </ul>
                            </div>
                        </div>
                        <!-- /.feature-post -->

                        <div class="about-content-text">
                            <h4 class="about-content-title"><?php echo $portfolio[0]->name ?></h4>

                            <!--                            <p><h6>The standard Lorem Ipsum passage, used since the 1500s</h6></p>-->
                            <p><?php echo $portfolio[0]->description ?></p>
                        </div>
                    </div>
                </div>

                <div class="page-sidebar">
                    <div class="sidebar">
                        <div class="title-section">
                            <h1 class="title">Project Details</h1>
                        </div>
                        <ul class="entry-details-content">
                            <li class="date">
                                <strong>Date</strong>

                                <p><?php echo $portfolio[0]->date; ?></p>
                            </li>

                            <li class="location">
                                <strong>Location</strong>

                                <p><?php echo $portfolio[0]->location; ?></p>
                            </li>

                            <li class="surface-area">
                                <strong>Surface Area</strong>

                                <p><?php echo $portfolio[0]->surface_area; ?></p>
                            </li>

                            <li class="investor">
                                <strong>Construction Investor</strong>

                                <p><?php echo $portfolio[0]->investor; ?></p>
                            </li>

                            <li class="value">
                                <strong>Value</strong>

                                <p><?php echo $portfolio[0]->coast; ?></p>
                            </li>

                            <li class="categories">
                                <strong>Categories:</strong>

                                <p><a href="#" rel="tag"><?php echo $portfolio[0]->category; ?></a></p>
                            </li>

                            <li class="tags">
                                <strong>Tags:</strong>

                                <p><a href="#" rel="tag"><?php echo $portfolio[0]->category; ?></a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
<?php
}?>

