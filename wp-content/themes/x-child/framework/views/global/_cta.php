<?php if( function_exists('acf_add_options_page') ) {
	
	if( get_field('header_donate_enabled', 'option') == TRUE ) : 
	
		$donate_url = get_field('header_donate_url', 'options'); ?>
	
		<div class="cta">
			<?php echo do_shortcode( '[button type="real" shape="rounded" size="large" href="'. $donate_url .'" title="Donate Now"][icon type="gift"]Donate Now[/button]' ); ?>
		</div>
		
	<?php endif; ?>

<?php } ?>