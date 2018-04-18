<?php
if ( ( is_single() || is_page() ) && 'et_full_width_page' === get_post_meta( get_the_ID(), '_et_pb_page_layout', true ) )
	return;

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		<?php if ( is_active_sidebar( 'property_search' ) ) : ?>
				
	<div id="property_search_sidebar" class="et_pb_widget widget_property_search" role="complementary">
		<?php dynamic_sidebar( 'property_search' ); ?>
	</div><!-- #property_search widget -->
				
<?php endif; ?>
		
	</div> <!-- end #sidebar -->
<?php endif; ?>

