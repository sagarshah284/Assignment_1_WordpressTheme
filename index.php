<?php
get_header();
?>
    <div id="main">
    <!-- Slider start -->
		<div class="based-slider">
            <div class="slider">
                <div class="slider-box">
                    <div class="slider-hendle">
                        <div class="go-prev" style="padding-top: 15px;"><a class="slider-prev"	style="padding: 10px; background-repeat: no-repeat;" /></a></div>
                        <div class="view-position"><div class="nav-buttons"></div></div>
                        <div class="go-next"><a class="slider-next"	style="padding: 10px; background-repeat: no-repeat;"></a></div>
                    </div>

                    <?php
                   get_template_part("loop","slider");

                    ?>
                </div>
            </div>
		</div>
            <!-- Slider end -->
        <div id="content">         
            <!-- Home child post start -->
            <div class="slider-new">
               <?php
                        get_template_part("loop","contentslider");
                ?>
            </div>
            <!-- Home child post end  -->
        </div>
    </div>   
<?php
get_footer();