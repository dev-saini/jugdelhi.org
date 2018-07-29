<article id="post-<?php the_ID(); ?>" <?php post_class( 'ep-single-post' ); ?>>

	<div class="entry-content">
		<div class="<?php if ( get_theme_mod( 'blog_single_sidebar_position', 'no' ) === 'no' ) : echo 'row justify-content-center'; endif;?>">
            <div class="<?php if ( get_theme_mod( 'blog_single_sidebar_position', 'no' ) === 'no' ) : echo 'col-md-8'; endif;?>">
                <?php
        		the_content( sprintf(
        			wp_kses(
        				/* translators: %s: Name of current post. Only visible to screen readers */
        				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'easypoint' ),
        				array(
        					'span' => array(
        						'class' => array(),
        					),
        				)
        			),
        			get_the_title()
        		) );

        		wp_link_pages( array(
        			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'easypoint' ),
        			'after'  => '</div>',
        		) );
        		?>
            </div>
            <!-- /.col-md-8 -->
        </div>
        <!-- /.row -->
	</div><!-- .entry-content -->

	<footer class="entry-footer text-center">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta mb-2">
				<?php
				easypoint_posted_on();
				easypoint_posted_by();
				?>
			</div>
			<div class="entry-meta">
				<?php
				easypoint_entry_footer();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
