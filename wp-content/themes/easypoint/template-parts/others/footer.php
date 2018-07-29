<footer id="colophon" class="site-footer">

    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="col-md-3">
					<aside class="widget-area footer-1-area mb-2">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</aside>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="col-md-3">
					<aside class="widget-area footer-2-area mb-2">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</aside>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="col-md-3">
					<aside class="widget-area footer-3-area mb-2">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</aside>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="col-md-3">
					<aside class="widget-area footer-4-area mb-2">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</aside>
				</div>
			<?php endif; ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-info text-center">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'easypoint' ) ); ?>">
                        <?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Proudly powered by %s', 'easypoint' ), 'WordPress' );
                        ?>
                    </a>
                    <span class="sep"> | </span>
                        <?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf( esc_html__( 'Theme: %1$s by %2$s.', 'easypoint' ), 'EasyPoint', '<a href="https://themes.salttechno.com">SaltTechno</a>' );
                        ?>
                </div><!-- .site-info -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</footer><!-- #colophon -->
