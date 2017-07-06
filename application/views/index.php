
    <!-- Offer -->
    <section class="flat-row what-we-do offer" id="mission">        
        <div class="container">            
            <div class="row">

                <div class="col-md-4 mission">
                    <div class="iconbox-item">
                        <div class="iconbox left style3"> 
                            <div class="box-content">
                                <div class="box-title">
                                    <a href="#">OUR MISSION</a>
                                </div>  
                                <ul class="flat-list style1">
                                    <li>Shelter to all-Help all to own a dream house with low budget</li>
                                    <li>To adopt advanced and latest technologies in the fields of architectural design, engineering and construction.</li>
                                    <li>To commit to quality and timeliness as a motto.</li>
                                    <li>To encourage innovation, up gradation of knowledge & skills through continuous learning, teamwork, professional integrity and safe working environment.</li>
                                    <li>To be a responsible entity committed to social cause and protection of the environment.</li>
                                </ul>
                            </div>
                            
                        </div><!-- /.iconbox -->
                    </div><!-- /.iconbox-item -->
                </div>

                <div class="col-md-4">
                    <div class="iconbox-item">
                        <div class="iconbox left style3">   
                            <img src="<?php echo base_url();?>images/mission.jpg" alt="serives">
                            <div class="box-content">
                                <div class="box-title">
                                    <a href="#">OUR VISION</a>
                                </div>  
                                To be an engineers & contracting company that can meet any architectural and construction work, to the ultimate satisfaction of the customer and to be a satisfied builder by serving nature.
                            </div>
                            
                        </div><!-- /.iconbox -->
                    </div><!-- /.iconbox-item -->
                </div>

                <div class="col-md-4">
                    <div class="iconbox-item">
                        <div class="iconbox left style3">   
                            <img src="<?php echo base_url();?>images/Values.png" alt="serives">
                            <div class="box-content">
                                <div class="box-title">
                                    <a href="#">OUR VALUES</a>
                                </div>  
                                <ul class="flat-list style2">
                                    <li>Client Satisfaction</li>
                                    <li>Commitment to Quality</li>
                                    <li>Timely Completion</li>
                                    <li>Cost Effective Solution</li>
                                </ul>
                            </div>                            
                        </div><!-- /.iconbox -->
                    </div><!-- /.iconbox-item --> 
                </div>
            </div>  
        </div><!-- /.container -->   
    </section>

    <!-- Blog -->
    <section class="flat-row blog" id="latest">        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h1 class="title">Our Latest Projects</h1>                                  
                    </div>
                </div><!-- /.col-md-12 -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-shortcode blog-carosuel-wrap">
                        <div class="blog-carosuel">
                            <?php
                            if (isset($portfolio) and $portfolio != FALSE) {
                                foreach ($portfolio as $value1) {
                                    ?>
                                    <article class="post clearfix">
                                        <div class="featured-post">
                                            <div class="overlay"></div>
                                            <img src="<?php echo $value1->file[0]->imgUrl;?>" alt="<?php echo $value1->name;?>">
                                            <ul class="post-comment">
                                                <li class="date">
                                                    <span class="day"> <?php echo $value1->day;?> </span>
                                                </li>
                                                <li class="comment">
                                                    <?php echo $value1->month;?>
                                                </li>
                                            </ul>
                                            <!-- /.post-comment -->
                                        </div>
                                        <!-- /.feature-post -->
                                        <div class="content-post">
                                            <h2 class="title-post"><a href="#"><?php echo $value1->name;?></a></h2>

                                            <div class="entry-post">
                                                <p><?php echo $value1->description;?><br>
                                                    <span class="more-link"><a href="#">Read More</a></span>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- /.content-post -->
                                    </article>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>

    <!-- gallery -->
    <section class="flat-row portfolio" id="work">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h1 class="title">Our Moments</h1>                                  
                    </div>
                </div><!-- /.col-md-12 -->
            </div>
        </div> 

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

        </div><!-- /.flat-portfolio --> 
    </section>  

    <!-- get qoute -->
    <div class="flat-row map" id="quote">
        <form id="contactform" class="flat-contact-form  inner-map style2 bg-dark height-small" method="post" action="<?php echo base_url('send-message')?>">
            <div class="field clearfix">      
                <div class="wrap-type-input">                    
                    <div class="input-wrap name">
                        <input type="text" value="" tabindex="1" placeholder="Name" name="name" id="name" required>
                    </div>
                    <div class="input-wrap email">
                        <input type="text" value="" tabindex="2" placeholder="Your Place" name="place" id="place">
                    </div>                               
                </div>
                <div class="wrap-type-input">                    
                    <div class="input-wrap name">
                        <input type="text" value="" tabindex="1" placeholder="Contact Number" name="phone" id="phone" required>
                    </div>
                    <div class="input-wrap email">
                        <input type="email" value="" tabindex="2" placeholder="Email" name="email" id="email" required>
                    </div>                               
                </div>
                <div class="textarea-wrap">
                    <textarea class="type-input" tabindex="3" placeholder="Message" name="message" id="message-contact" required></textarea>
                </div>
            </div>
            <div class="submit-wrap">
                <button class="flat-button bg-theme">Send Message</button>
            </div>
        </form><!-- /.comment-form -->    
        <div id="home-msg">
            <div class="container pad-top">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section color-white">
                            <h1 class="title">Get You Free Quote Now</h1>                                  
                        </div>
                    </div><!-- /.col-md-12 -->
                </div>
            </div>  
        </div>        
    </div><!-- /.flat-row -->  

    