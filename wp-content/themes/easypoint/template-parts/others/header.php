<header id="masthead" class="site-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="site-branding">
                    <div class="site-branding-inner">
                        <?php
                        the_custom_logo();
                        if ( is_front_page() && is_home() ) :
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                        else :
                            ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php
                        endif;
                        $easypoint_description = get_bloginfo( 'description', 'display' );
                        if ( $easypoint_description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo $easypoint_description; /* WPCS: xss ok. */ ?></p>
                        <?php endif; ?>
                    </div>
                </div><!-- .site-branding -->
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-8">
                <nav id="site-navigation" class="main-navigation text-right">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ) );
                    ?>
                </nav><!-- #site-navigation -->
            </div>
            <!-- /.col-md-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</header><!-- #masthead -->
