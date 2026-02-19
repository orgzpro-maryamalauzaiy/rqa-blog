<?php
$feature_posts_id 					= get_theme_mod( 'highlighted_posts_category', '' );
$number_of_highlighted_posts_items  = get_theme_mod( 'number_of_highlighted_posts_items', 5 );
$highlighted_posts 					= get_theme_mod( 'highlighted_posts', true );
$highlighted_posts_meta_date 		= get_theme_mod( 'highlighted_posts_meta_date', true );
$highlighted_posts_meta_category 	= get_theme_mod( 'highlighted_posts_meta_category', true );
$highlighted_posts_read_more 		= get_theme_mod( 'highlighted_posts_read_more', true );

$query = new WP_Query( apply_filters( 'spirit_blog_highlighted_posts_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => absint( $number_of_highlighted_posts_items ),
	'cat'                 => $feature_posts_id,
	'offset'              => 0,
	'ignore_sticky_posts' => 1
)));

$posts_array = $query->get_posts();

if( $highlighted_posts == true && is_home() ) {
	?>
	<section id="section-highlighted-posts">
		<div class="grid">
		<?php
			while ( $query->have_posts() ) : $query->the_post();
			$image 	= get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>

	            <article class="grid-item">
	            	<div class="highlighted-posts-image" style="background-image: url( <?php echo esc_url( $image ); ?> );">
	            		<a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
		        	</div><!-- .highlighted-posts-image -->

		        	<div class="highlighted-posts-content">
		        		<div class="entry-meta">
		        			<?php if( $highlighted_posts_meta_date == true ) {
							 	spirit_blog_posted_on();
							} ?>

							<?php if( $highlighted_posts_meta_category == true ) {
							 	spirit_blog_entry_meta();
							} ?>
						</div>

						<h2 class="highlighted-posts-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>

						<?php $readmore_text = spirit_blog_get_option( 'readmore_text' );?>
			            <?php if (!empty($readmore_text) ) : ?>
			            	<?php if( $highlighted_posts_read_more == true ) { ?>
				                <div class="read-more">
				                    <a href="<?php the_permalink();?>"><?php echo esc_html($readmore_text);?></a>
				                </div><!-- .read-more -->
			                <?php } ?>
			            <?php endif; ?>
		        	</div><!-- .highlighted-posts-content -->
	            </article>
		        
			<?php
			endwhile; 
			wp_reset_postdata();
		?>
		</div>
	</section>
<?php } ?>