
            
    <!-- Page title -->
    <div class="page-title" style="background-image: url('images/banner-about.png');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="page-title-heading">
                        <h1 class="title">Our Moments</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li> Page </li>                            
                            <li> Our Moments </li>
                        </ul>                   
                    </div><!-- /.breadcrumbs -->   
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 

    <!-- gallery -->
    <section class="flat-row gallery" id="work">  

        <div class="flat-portfolio v4">
            <?php
            if (isset($gallery) and $gallery != FALSE) {
                foreach ($gallery as $value) {
                    ?>
                    <div class="portfolio-wrap clearfix">
                        <?php
                        foreach ($value as $image) {
                            ?>
                            <div class="item">
                                <div class="featured-images">
                                    <img src="<?php echo base_url() . 'uploads/' . $image->file->file_name;?>" alt="<?php echo $image->name;?>">

                                    <div class="overlay">
                                        <ul class="portfolio-details">
                                            <li><a class="popup-gallery" href="<?php echo base_url() . 'uploads/' . $image->file->file_name;?>">
                                                    <i class="fa fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.featured-images -->
                            </div>
                        <?php
                        }?>
                        <!-- /.portfolio-item -->
                    </div><!-- /.portfolio-wrap -->
                <?php
                }
            }?>
            <!-- /.portfolio-wrap -->
        </div><!-- /.flat-portfolio -->
    </section>    

    