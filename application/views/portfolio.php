
            
    <!-- Page title -->
    <div class="page-title" style="background-image: url('images/banner-about.png');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="page-title-heading">
                        <h1 class="title">Welcome to Our Portfolio</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="home">Home</a></li>
                            <li> Page </li>                            
                            <li> Our Portfolios</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs -->   
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 

    <!-- Blog -->
    <section class="flat-row blog" id="blog">        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-shortcode blog-carosuel-wrap">
                        <!-- first portfolio row start  -->
                        <div class="blog-carosuel">
                            <!-- one start -->
                            <?php
                            if (isset($portfolio) and $portfolio != FALSE) {
                                foreach ($portfolio as $value) {
                                    ?>
                                    <article class="post clearfix">
                                        <div class="featured-post">
                                            <div class="overlay"></div>
                                            <img src="<?php echo $value->file[0]->imgUrl;?>" alt="image">
                                            <ul class="post-comment">
                                                <li class="date">
                                                    <span class="day"> 11 </span>
                                                </li>
                                                <li class="comment">
                                                    August
                                                </li>
                                            </ul>
                                            <!-- /.post-comment -->
                                        </div>
                                        <!-- /.feature-post -->
                                        <div class="content-post">
                                            <h2 class="title-post"><a href="<?php echo base_url('portfolio/').$value->id;?>"><?php echo $value->name;?></a></h2>

                                            <div class="entry-post">
                                                <p><?php echo $value->description;?>
                                                    <br>
                                                    <span class="more-link"><a href="<?php echo base_url('portfolio/').$value->id;?>">Read More</a></span>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- /.content-post -->
                                    </article>
                                <?php
                                }
                            } ?>
                        </div>
                        <!-- first portfolio row end  -->
                        <!-- portfolio-pagination start-->
<!--                        <div class="blog-pagination">-->
<!--                            <ul class="flat-pagination clearfix">-->
<!--                                <li class="prev">-->
<!--                                    <a href="#"><i class="fa fa-angle-left"></i></a>-->
<!--                                </li>-->
<!--                                <li class="active">1</li>-->
<!--                                <li><a href="#">2</a></li>-->
<!--                                <li><a href="#">3</a></li>-->
<!--                                <li><a href="#">4</a></li>                                  -->
<!--                                <li class="next">-->
<!--                                    <a href="#"><i class="fa fa-angle-right"></i></a>-->
<!--                                </li>                               -->
<!--                            </ul><!-- /.flat-pagination -->
<!--                        </div>-->
                        <!-- portfolio-pagination end-->

                    </div>
                </div>
            </div>
        </div> 
    </section>  

    