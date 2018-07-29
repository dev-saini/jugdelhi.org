<?php

if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
}
else {
    if ( ! is_page_template() ) {
        get_header();
        ?>

        <?php if ( have_posts() ) : the_post() ; ?>
            <header class="entry-header ep-page ep-frontpage <?php if ( has_post_thumbnail() || get_header_image() ) : ?> ep-has-thumb <?php endif; ?>">

        		<?php easypoint_post_thumbnail(); ?>

        		<div class="ep-thumb-overlay">
        			<div class="container">
        				<div class="row justify-content-center">
        					<div class="col-md-8 text-center">
        						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                                <?php if ( get_theme_mod( 'front_cover_btn_text' ) ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'front_cover_btn_link' ) ); ?>" class="btn btn-primary btn-lg mt-3"><b><?php echo esc_html( get_theme_mod( 'front_cover_btn_text' ) ); ?></b></a>
                                <?php endif; ?>
        					</div>
        				</div>
        			</div>
        		</div>
        	</header><!-- .entry-header -->
            <div class="container">
                <div class="row">

                    <?php
                        $content_area_class = '';
                        if ( get_theme_mod( 'frontpage_sidebar_position', 'no' ) === 'no' ) {
                            $content_area_class = 'col-md-12';
                        }
                        else {
                            $content_area_class = 'col-md-9 content-area';
                            if ( get_theme_mod( 'frontpage_sidebar_position', 'no' ) === 'left' ) {
                                $content_area_class = 'col-md-9 content-area order-first order-md-last';
                            }
                        }
                    ?>

                    <?php
        				if ( get_theme_mod( 'frontpage_sidebar_position', 'no' ) === 'left' ) {
        					get_sidebar();
        				}
        			?>
                    <div class="<?php echo esc_attr( $content_area_class ); ?>">
                        <?php
                            get_template_part( 'template-parts/content', 'frontpage' );
                        ?>
                    </div>
                    <?php
        				if ( get_theme_mod( 'frontpage_sidebar_position', 'no' ) === 'right' ) {
        					get_sidebar();
        				}
        			?>
                </div>
            </div>
        <?php endif; ?>

        <?php
        get_footer();
    }
    else {
        include( get_page_template() );
    }
}
?>
