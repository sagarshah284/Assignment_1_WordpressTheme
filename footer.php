 <!-- widget start -->
    <div id="widget">
        <div class="widgetbox row">
            <div class="col-md-12">
                <?php
                dynamic_sidebar('page-menu');
                ?>
            </div>
        </div>
    </div>
    <!-- widget end -->
<!-- Footer start -->
<div id="footer">
<!-- Footer logo start -->
<div class="footer-logo"><a href="<?php echo get_site_url();?>"><img src="<?php echo get_custom_data('upload_Footer_logo');?>" /></a></div>
<!-- Footer logo end -->
<!-- Footer menu start -->
<div class="menu-nav-footer">
<?php
get_menu('footermenu','cssmenufooter','social');
?>
<!-- Footer menu and -->
<!-- Footer text start -->
<p class="copyright"> <?php echo get_custom_data('as_footer_area_text');?></p>
<!-- Footer text end -->
</div>
</div>
<!-- Footer end -->
</div>


<?php wp_footer(); ?>

</body>
</html>