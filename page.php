<?php 
get_header();
the_post();
?>

	 	<div id="postmain" >
	 	<h1 id="post-title"><?php the_title( );?></h1>
        <div id="content">
        <?php the_content();?>
      </div>
      </div>

<?php get_footer(); ?>
