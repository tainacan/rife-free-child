<?php
/**
 * The template for displaying all pages.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if(!apollo13framework_check_for_renamed_templates()){
	//we are moving to different template
	return;
}


if(post_password_required()){
	/* don't use the_content() as it also applies filters that we don't need here, if we are using custom password page */
	echo get_the_content();
}
else{
	global $apollo13framework_a13;
	get_header();

	// Elementor `single` location
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ){

		the_post();
		apollo13framework_title_bar('outside', tainacan_get_the_term_name());
		$add_class       = 'content-box';
		$sticky_one_page = $apollo13framework_a13->get_meta( '_content_sticky_one_page' ) === 'on';
		if( $sticky_one_page ){
			$add_class .= ' a13-sticky-one-page';
		}
		?>

		<article id="content" class="clearfix"<?php apollo13framework_schema_args('creative'); ?>>

			<div id="col-mask">

				<div style="padding: 0;" id="post-<?php the_ID(); ?>" <?php
				post_class( $add_class );
				if( $sticky_one_page ){
					echo ' data-a13-sticky-one-page-icon-global-color="' . esc_attr( $apollo13framework_a13->get_meta( '_content_sticky_one_page_bullet_color' ) ) . '"';
					echo ' data-a13-sticky-one-page-icon-global-icon="' . esc_attr( $apollo13framework_a13->get_meta( '_content_sticky_one_page_bullet_icon' ) ) . '"';
				}
				?>>
				<?php apollo13framework_title_bar( 'inside', tainacan_get_the_term_name() ); ?>
				<div class="real-content" <?php apollo13framework_schema_args('text'); ?>></div>
					<?php tainacan_the_faceted_search([
						'default_view_mode' => 'records',
						'enabled_view_modes' => ['masonry', 'records', 'cards', 'table']
					]); ?>
				</div>

				</div>
				<?php get_sidebar(); ?>
			</div>

		</article>

		<?php
	}
	get_footer();
}//end of if password_protected

