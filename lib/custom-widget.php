
<?php if (! function_exists ( 'AScreative_setup' )) :
	
	function AScreative_setup() {
		
		register_nav_menus ( array ('primary' => __ ( 'Primary Menu', 'AScreative' ), 'social' => __ ( 'Social Links Menu', 'AScreative' ) ) );
		
		
		
		add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
		
	
	
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	
	}

endif; // AScreative_setup
add_action ( 'after_setup_theme', 'AScreative_setup' );



register_sidebar( array(
	'name' => 'footer area',
	'id' => 'page-menu',
	'before_widget' => '<div id="page-nav" class="col-md-3">',
	'after_widget' => '</div>',
	'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
) );

add_filter( 'wp_page_menu', 'my_page_menu' );

function my_page_menu() {
	dynamic_sidebar( 'page-menu' );
}

// Creating the widget

class Social_Widget extends WP_Widget {
function __construct() {
	parent::__construct( 'Social_Widget',__('Social Links', 'wpb_widget_domain'),	array( 'description' => __( 'This widget for set Social links', 'wpb_widget_domain' ), ));
}



public function widget( $args, $instance ) {

$title = apply_filters( 'widget_title', $instance['title'] );
$facebook = apply_filters( 'widget_title', $instance['facebook'] );
$twitter = apply_filters( 'widget_title', $instance['twitter'] );
$linkedin = apply_filters( 'widget_title', $instance['linkedin'] );
$rss = apply_filters( 'widget_title', $instance['rss'] );
// before and after widget arguments are defined by themes

echo $args['before_widget'];

if ( ! empty( $title ) )

echo $args['before_title'] . $title . $args['after_title'];
echo '<ul class="sociallink">
	<li><a href="'.$facebook.'" class="facebook" >Facebook</a></li>
	<li><a href="'.$twitter.'" class="twitter" >Twitter</a></li>
	<li><a href="'.$linkedin.'" class="linkedin" >Linked in</a></li>
	<li><a href="'.$rss.'" class="rss" >Rss</a></li>
		</ul>';


// This is where you run the code and display the output


echo $args['after_widget'];

}

         

// Widget Backend

public function form( $instance ) {

$title=setSlocialData('title',$instance);
if(empty($title)) {
$title = __( 'New title', 'wpb_widget_domain' );
}

$facebook=setSlocialData('facebook',$instance);
if(empty($facebook)) { 
$facebook = __( 'Facebook Link', 'wpb_widget_domain' );
}


$twitter=setSlocialData('twitter',$instance);
if(empty($twitter)){
$twitter = __( 'Twitter Link', 'wpb_widget_domain' );
}


$rss=setSlocialData('rss',$instance);
if(empty($rss)){
$rss = __( 'Rss Link', 'wpb_widget_domain' );
}


$linkedin=setSlocialData('linkedin',$instance);
if(empty($linkedin)){
$linkedin = __( 'Linkedin Link', 'wpb_widget_domain' );
}
?>

<p>

<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

<input class="widefat " id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" style="margin-bottom: 10px ;" value="<?php echo esc_attr( $title ); ?>" />
<label class="facebook" for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook link:' ); ?></label>
<input class="widefat "  id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" style="margin-bottom: 10px ;" value="<?php echo esc_attr( $facebook ); ?>" />
<label class="twitter" for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter link:' ); ?></label>
<input class="widefat " id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" style="margin-bottom: 10px ;" value="<?php echo esc_attr( $twitter ); ?>" />
<label class="linkedin" for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin link:' ); ?></label>
<input class="widefat " id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" style="margin-bottom: 10px ;" value="<?php echo esc_attr( $linkedin ); ?>" />
<label class="rss" for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'Rss link:' ); ?></label>
<input class="widefat " id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" style="margin-bottom: 10px ;" value="<?php echo esc_attr( $rss ); ?>" />


</p>

<?php

}

     

// Updating widget replacing old instances with new

public function update( $new_instance, $old_instance ) {

$instance = array();

$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';



return $instance;

}

} // Class Social_Widget ends here

 
function setSlocialData($text_id,$instance){
if ( isset( $instance[ $text_id ] ) ) {

return $instance[$text_id];

}
	
}
// Register and load the widget

function wpb_load_widget() {

    register_widget( 'Social_Widget' );

}

add_action( 'widgets_init', 'wpb_load_widget' );




// Creating the widget

class Category_Post_Widget extends WP_Widget {

 

function __construct() {

	// create Choice Category Post widget
parent::__construct(

'Category_Post_Widget',

__('Choice Category Post', 'wpb_widget_domain_c'),

array( 'description' => __( 'This widget for view latest post selected category', 'wpb_widget_domain_c' ), )

);

}


public function widget( $args, $instance ) {

$title = apply_filters( 'widget_title_data', $instance['titledata'] );
$selectedcategory = apply_filters( 'widget_title_data', $instance['categorydata'] );
// before and after widget arguments are defined by themes
$numberpost= apply_filters( 'widget_title_data', $instance['numberpost'] );
echo $args['before_widget'];

if ( ! empty( $title ) )

echo $args['before_title'] . $title . $args['after_title'];
?>
<ul class="latestpost">
<?php
query_posts('cat='.$selectedcategory.'&showposts='.$numberpost);
if (have_posts()) {
while (have_posts()) { the_post();
?><li  class="postnew" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
} // end while loop
} // end if
wp_reset_query();
?>
</ul>
</li><?php 



echo $args['after_widget'];

}

         

// Widget Backend

public function form( $instance ) {

if ( isset( $instance[ 'titledata' ] ) ) {

$title = $instance[ 'titledata' ];

}
else {

$title = __( 'New title', 'wpb_widget_domain_c' );

}

if ( isset( $instance[ 'categorydata' ] ) ) {

$categorydata = $instance[ 'categorydata' ];

}
else {

$categorydata = "";

}
if ( isset( $instance[ 'numberpost' ] ) ) {

$numberpost = $instance[ 'numberpost' ];

}
else {

$numberpost = "";

}




// Widget Choice Category Post form

?>
<p>

<label for="<?php echo $this->get_field_id( 'titledata' ); ?>"><?php _e( 'Title:' ); ?></label>

<input class="widefat" id="<?php echo $this->get_field_id( 'titledata' ); ?>" style="margin-bottom: 10px ;" name="<?php echo $this->get_field_name( 'titledata' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
<label for="<?php echo $this->get_field_id( 'titledata' ); ?>"><?php _e( 'Total Number Of Post You Show:' ); ?></label>

<select id="<?php echo $this->get_field_id( 'numberpost' ); ?>" name="<?php echo $this->get_field_name( 'numberpost' ); ?>" style="margin-bottom: 10px ;" > 

<?php for($i=1;$i<=5;$i++)
{
$style="";
  if(esc_attr( $numberpost )==$i)
  {
  	$style="selected ";
  }
    echo '<option value="'.$i . '" '.$style.'>'. $i .'</option>';
    
}


?>

     </select><br/>

<?php
$args = array(
  'orderby' => 'name',
  'order' => 'ASC'
  );
$categories = get_categories($args);
?>
<label for="<?php echo $this->get_field_id( 'titledata' ); ?>"><?php _e( 'Choice category:' ); ?></label>

<select id="<?php echo $this->get_field_id( 'categorydata' ); ?>" name="<?php echo $this->get_field_name( 'categorydata' ); ?>" > 
<?php
  foreach($categories as $category) {
  	$style="";
  if(esc_attr( $categorydata )==$category->term_id)
  {
  	$style="selected ";
  }
    echo '<option value="'.$category->term_id  . '" '.$style.'>'. $category->name .'</option>';
    
     } 
    echo '</select>' ;
?>
</p>

<?php

}

     

// Updating widget replacing old instances with new

public function update( $new_instance, $old_instance ) {

$instance = array();

$instance['titledata'] = ( ! empty( $new_instance['titledata'] ) ) ? strip_tags( $new_instance['titledata'] ) : '';
$instance['categorydata'] = ( ! empty( $new_instance['categorydata'] ) ) ? strip_tags( $new_instance['categorydata'] ) : '';
$instance['numberpost'] = ( ! empty( $new_instance['numberpost'] ) ) ? strip_tags( $new_instance['numberpost'] ) : '';



return $instance;

}

} // Class Social_Widget ends here

 

// Register and load the widget

function wpb_load_widget_c() {

    register_widget( 'Category_Post_Widget' );

}
