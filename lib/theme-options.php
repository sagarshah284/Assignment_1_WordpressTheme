
<?php
/**
 * as creative Theme Options
 *
 * @package as creative
 * @since as creative 1.0
 */


function as_admin_enqueue_scripts(  ) {
	wp_enqueue_style( 'as-theme-options', get_template_directory_uri() . '/theme-options/theme-options.css', false, '' );
	
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'as_admin_enqueue_scripts' );

function as_theme_options_init() {
	register_setting(
		'as_options', // Options group, see settings_fields() call in as_theme_options_render_page()
		'as_theme_options', // Database option, see as_get_theme_options()
		'as_theme_options_validate' // The sanitization callback, see as_theme_options_validate()
	);

	add_settings_section( // Register our settings field group
		'as_welcome_area', // Unique identifier for the settings section
		'', // Section title
		'__return_false',  // Section callback (we don't want anything)
		'theme_options'  // Menu slug, used to uniquely identify the page; see as_theme_options_add_page()
	);

	
	add_settings_field( 'Upload_header_logo', __( 'header Area logo', 'as' ), 'upload_header_logo', 'theme_options', 'as_welcome_area' );
	add_settings_field( 'upload_footer_logo', __( 'footer Area logo', 'as' ), 'upload_footer_logo', 'theme_options', 'as_welcome_area' );
	add_settings_field( 'as_footer_area_text', __( 'Footer Area Text', 'as' ), 'as_footer_area_text', 'theme_options', 'as_welcome_area' );
	
}
add_action( 'admin_init', 'as_theme_options_init' );


function as_option_page_capability(  ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_as_options', 'as_option_page_capability' );


function as_theme_options_add_page() {
	add_theme_page(
		__( 'Theme Options', 'as' ),   // Name of page
		__( 'Theme Options', 'as' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'theme_options',               // Menu slug, used to uniquely identify the page
		'as_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'as_theme_options_add_page' );

function as_get_theme_options() {
	$saved = (array) get_option( 'as_theme_options' );
	$defaults = array(		
		'as_footer_area_text'			=> '',	
		'upload_header_logo'			=> '',
		'upload_Footer_logo'			=> '',			
	);
	$defaults = apply_filters( 'as_default_theme_options', $defaults );
	$options = wp_parse_args( $saved, $defaults );
	$options = array_intersect_key( $options, $defaults );
	return $options;
}



function as_footer_area_text() {
	$options = as_get_theme_options();
	?>
	<input class="text"  type="text" name="as_theme_options[as_footer_area_text]" id="Footer-area-text" value="<?php echo esc_attr( $options[ 'as_footer_area_text' ] ); ?>" style="  width: 50%;" />
	<label class="description" for="Footer-area-text"><?php _e( 'Write a footer area text', 'as' ); ?></label>
	<?php
}

function upload_header_logo() {
	$headerlogo =  setOptionData('upload_header_logo','logo.png')

		?>
	<input class="text"  type="hidden" name="" id="upload_Header_logo_Default" value="<?php echo get_template_directory_uri()."/images/logo.png"; ?>" style="  width: 50%;" />
	<input class="text"  type="hidden" name="as_theme_options[upload_header_logo]" id="upload_header_logo" value="<?php echo $headerlogo;?>" style="  width: 50%;" />
	<img src="<?php echo $headerlogo; ?>" id="Header_Logo_Image" style="  width: 200px;  height: 60px;" />
	<input type="button" id="Set_upload_header" class="button button-primary" onclick="Set_Logo('Header_Logo','Get')" value="Header Logo upload"/>
	<input type="button" id="Reaset_upload_header" class="button button-primary" onclick="Set_Logo('Reaset_Header_Logo','Set')" value="Reset Logo"/>
	
	
	<?php
}
function upload_Footer_logo() {
	$footerlogo =  setOptionData('upload_Footer_logo','footer-logo.png')

	
		?>
	<input class="text"  type="hidden" name="as_theme_options[upload_Footer_logo]" id="upload_Footer_logo" value="<?php echo $footerlogo;?>" style="  width: 50%;" />
	<img src="<?php echo $footerlogo; ?>" id="Footer_Logo_Image" style="  width: 200px;  height: 60px;" />
	<input class="text"  type="hidden" name="" id="upload_Footer_logo_Default" value="<?php echo get_template_directory_uri()."/images/footer-logo.png"; ?>" style="  width: 50%;" />
	<input type="button" id="Set_upload_footer" class="button button-primary" onclick="Set_Logo('Footer_Logo','Get')" value="Footer Logo upload"/>
	<input type="button" id="Reaset_upload_footer" class="button button-primary" onclick="Set_Logo('Reaset_footer_Logo','Set')" value="Reset Logo"/>
	
	
	<script> 
	 function Set_Logo(ID_Logo,Type){
		 	if(Type=="Get"){			
				 tb_show('', 'media-upload.php?type=image&TB_iframe=true');
				 window.send_to_editor = function(html) {				
				 imgurl = jQuery('img',html).attr('src');
				 tb_remove();
				 	 if(ID_Logo=="Header_Logo"){
						 jQuery('#Header_Logo_Image').attr('src',imgurl);
						 jQuery('#upload_header_logo').val(imgurl);
					 }else if(ID_Logo=="Footer_Logo"){
						 jQuery('#Footer_Logo_Image').attr('src',imgurl);
						 jQuery('#upload_Footer_logo').val(imgurl);
					 }
				 	return false;
				 }
			 }else if(Type=="Set"){				 
				 if(ID_Logo=="Reaset_Header_Logo"){	
					imgurl=jQuery("#upload_Header_logo_Default").val();			 
				 	jQuery('#Header_Logo_Image').attr('src',imgurl);
					jQuery('#upload_header_logo').val(imgurl); 
				 }else if(ID_Logo=="Reaset_footer_Logo"){
					 imgurl=jQuery("#upload_Footer_logo_Default").val();		
					jQuery('#Footer_Logo_Image').attr('src',imgurl);
					jQuery('#upload_Footer_logo').val(imgurl); 
				}
			 }
		
	 	}
	</script>
	
	<?php
}
add_action( 'admin_print_styles', 'wp_admr_pro_plus_admin_styles' );

function setoptionData($text_id,$text_Data){
	$data_options = as_get_theme_options();
	$returndata=esc_attr( $data_options[$text_id] );
	if(empty($returndata)){
		return get_template_directory_uri()."/images/".$text_Data;
	}else{
		return 	$returndata;
	}
}

function wp_admr_pro_plus_admin_styles() {




wp_enqueue_style('wpADMRProPlusStyleSheet');

wp_enqueue_style( 'thickbox' );
wp_enqueue_script( 'thickbox' );
wp_enqueue_script( 'media-upload' );

}



function as_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>
			<?php printf( __( '%s Theme Options', 'as' ), wp_get_theme() ); ?>
		</h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'as_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

function as_theme_options_validate( $input ) {
	$output = array();

	
	// Footer Area Text
	$output["as_footer_area_text"]=setThemeoptionData("as_footer_area_text",$input);
	$output["upload_header_logo"]=setThemeoptionData("upload_header_logo",$input);
	$output["upload_Footer_logo"]=setThemeoptionData("upload_Footer_logo",$input);
		
	return apply_filters( 'as_theme_options_validate', $output, $input );

}


function setThemeoptionData ( $text_id, $input ){
	if ( isset( $input[ $text_id ] ) && ! empty( $input[ $text_id ] ) )
		return strip_tags( $input[ $text_id ] );
}
