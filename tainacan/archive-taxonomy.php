<?php get_header(); ?>

	<?php tainacan_the_faceted_search([
		'default_view_mode' => 'records',
		'enabled_view_modes' => ['masonry', 'records', 'cards', 'table']
	]); ?>

<?php get_footer();