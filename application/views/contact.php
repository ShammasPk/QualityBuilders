\
            
    <!-- Page title -->
    <div class="page-title" style="background-image: url('images/3.png');background-repeat: repeat;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">                    
                    <div class="page-title-heading">
                        <h1 class="title" style="color: #fff;">Connect Us</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="blog.html">Contact</a></li> 
                        </ul>                   
                    </div><!-- /.breadcrumbs -->   
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 

    <!-- Contact -->
    <section class="flat-row contact-page" style="background-image: url('images/msg1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="contactformsecond" class="flat-contact-form style2 bg-dark height-small" method="post" action="<?php echo base_url('send-comment')?>">
                        <div class="field clearfix">      
                            <div class="wrap-type-input">                    
                                <div class="input-wrap name">
                                    <input type="text" value="" tabindex="1" placeholder="Name" name="name" id="name" required>
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
                            <button class="flat-button bg-theme">Send Your Message</button>
                        </div>
                        <div id="comment-alert-success" class="alert alert-success hide">
                            <i class="fa fa-check-circle-o fa-2x"></i>
                            We will contact you soon
                        </div>
                        <div id="comment-alert-error" class="alert alert-danger hide">
                            <i class="fa fa-check-circle-o fa-2x"></i>
                            Oops! Something went wrong.
                        </div>
                    </form><!-- /.comment-form -->         
                </div><!-- /.col-md-12-->                 
            </div><!-- /.row -->           
        </div><!-- /.container -->   
    </section> 

    <!-- Map -->
    <div class="flat-row map">
        <div id="flat-map"></div>        
    </div><!-- /.flat-row -->
    
    <!-- Javascript -->
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script> 
    <script type="text/javascript" src="javascript/jquery.easing.js"></script>    
    <script type="text/javascript" src="javascript/jquery-waypoints.js"></script>     
    <script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="javascript/jquery.fitvids.js"></script> 
    <script type="text/javascript" src="javascript/parallax.js"></script>
    <script type="text/javascript" src="javascript/jquery-validate.js"></script>
    <script type="text/javascript" src="javascript/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="javascript/smoothscroll.js"></script>   
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHtWltCIolOgzpMEfi_GVZZHCkrXH10SM&region=GB"></script>
    <script type="text/javascript" src="javascript/gmap3.min.js"></script>
    
    <script type="text/javascript" src="javascript/main.js"></script>
<script>
    $('#contactformsecond').submit(function (e) {
        e.preventDefault();
        $.post($(this).prop('action'), $(this).serialize())
            .done(function (response) {
                $('#contactformsecond')[0].reset();
                $('#comment-alert-success').removeClass('hide');
                $("#comment-alert-success").delay(4).fadeIn();
                $("#comment-alert-success").delay(4000).fadeOut();
            })
            .fail(function (response) {
                $('#contactformsecond')[0].reset();
                $('#comment-alert-error').removeClass('hide');
                $("#comment-alert-error").delay(4).fadeIn();
                $("#comment-alert-error").delay(4000).fadeOut();
            })
    });
</script>