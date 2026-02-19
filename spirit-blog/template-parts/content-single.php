<?php 
 /**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spirit Blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-item">

		<div class="entry-meta">    
			<?php spirit_blog_posted_on() ?>
			<?php spirit_blog_entry_meta(); ?>  
		</div><!-- .entry-meta -->

		<header class="entry-header">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</header><!-- .entry-header -->

		<?php if ( has_post_thumbnail() ) : ?>
	        <div class="featured-image">
	            <?php the_post_thumbnail(); ?>
	        </div><!-- .featured-image -->
	    <?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'spirit-blog' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php spirit_blog_posts_tags(); ?>
		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'spirit-blog' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>	

	</div><!-- .entry-meta -->
</article><!-- #post-## -->