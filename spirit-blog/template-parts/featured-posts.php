<?php
$feature_posts_id 					= get_theme_mod( 'featured_posts_category', '' );
$featured_posts_section_title       = get_theme_mod( 'featured_posts_section_title', 'Featured posts' );
$number_of_featured_posts_items     = get_theme_mod( 'number_of_featured_posts_items', 4 );
$featured_posts 					= get_theme_mod( 'featured_posts', true );
$featured_posts_meta_category 		= get_theme_mod( 'featured_posts_meta_category', true );

$query = new WP_Query( apply_filters( 'spirit_blog_featured_posts_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => absint( $number_of_featured_posts_items ),
	'cat'                 => $feature_posts_id,
	'offset'              => 0,
	'ignore_sticky_posts' => 1
)));

$posts_array = $query->get_posts();

if( $featured_posts == true && is_home() ) {
	?>
	<section id="section-featured-posts">	
		<div class="section-header">
			<h2 class="section-title"><?php echo esc_html($featured_posts_section_title); ?></h2>
		</div><!-- .section-header -->	

		<div class="col-4 clear">
			<?php
				while ( $query->have_posts() ) : $query->the_post();
				$image 	= get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>

		            <article>
		            	<div class="featured-post-item">
			            	<div class="featured-image" style="background-image: url( <?php echo esc_url( $image ); ?> );">
			            		<a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
							</div><!-- .featured-image -->

			            	<div class="entry-container">
								<?php if( $featured_posts_meta_category == true ) { ?>
			            			<div class="entry-meta">
									 	<?php spirit_blog_entry_meta(); ?>
									</div><!-- .entry-meta -->
									<?php } ?>

					          	<header class="entry-header">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					          	</header>
				        	</div><!-- .entry-container -->
		            	</div><!-- .featured-post-item -->
		            </article>
			        
				<?php
				endwhile; 
				wp_reset_postdata();
			?>
		</div><!-- .col-3 -->
	</section>
<?php } ?>