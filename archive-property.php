<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<h2>
                <?php
                if ( is_search() ) {
                    if ( get_query_var( 's' ) ) {
                        echo sprintf( __( 'Search Result for &ldquo;%s&rdquo;', 'txp' ), get_search_query() );
                    } else {
                        echo __( 'Search Results', 'txp' );
                    }
                }
                ?>
            </h2>
		<?php
			if ( have_posts() ) : ?>
				<div class="hentry properties-listing">
                <div class="property-items-container">
				<?php
				while ( have_posts() ) : the_post();
					$post_format = get_post_format(); ?>
					
				
						 <?php txp_get_template_part( 'content-property.php' ); ?>

                    
                

					
			<?php
					endwhile;?>
					</div>
				</div>
<?php
                // Previous/next page navigation.
                the_posts_pagination( array(
					'mid_size'			 => 4,
                    'prev_text'          => __( 'Previous page', 'txp' ),
                    'next_text'          => __( 'Next page', 'txp' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'txp' ) . ' </span>',
					'screen_reader_text' => null
                ) );
          
					
				else :
					_e( 'No properties were found matching your selection.', 'txp' );
				endif;
			?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>