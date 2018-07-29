<?php

$featured_category = get_theme_mod( 'featured_category', '' );
$featured_post_ids = get_theme_mod( 'featured_ids' );
$featured_count    = get_theme_mod( 'featured_count' );

if ( ! $featured_count ) {
    $featured_count = 5;
}

if( $featured_post_ids && $featured_post_ids[0]!= '' ) {
	$featured_posts = $featured_post_ids;
	$args = array( 'post_type' => array('post', 'page'), 'post__in' => $featured_posts, 'showposts' => $featured_count, 'orderby' => 'post__in', 'ignore_sticky_posts' => true );
} else {
	$args = array( 'cat' => $featured_category, 'showposts' => $featured_count, 'ignore_sticky_posts' => true );
}

$featured_query = new WP_Query( $args );


?>

<div class="ep-post-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if ( $featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>

                <?php
                    $feat_image = get_template_directory_uri() . '/assets/images/default-img.png';
                    if( has_post_thumbnail() ) {
                        $get_feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $feat_image = $get_feat_image[0];
                    }
                ?>

                <?php if( $feat_image ) : ?>
                    <div class="swiper-slide ep-featured-img-bg" style="background-image:url(<?php echo esc_url( $feat_image ); ?>)">
                <?php else : ?>
                    <div class="swiper-slide">
                <?php endif; ?>

                    <div class="slide-content">
                        <h4><?php echo esc_html( get_the_title() ); ?></h4>
            			<h6 class="mb-4">
                            <?php if( get_theme_mod( 'blog_home_posted_on', 'no' ) === 'yes' ) : ?>
                                <span class="mr-4"><span class="fas fa-calendar-alt mr-1"></span><?php the_time( get_option('date_format') ); ?></span>
                            <?php endif; ?>
                            <span class=""><span class="fas fa-user mr-1"></span><?php the_author(); ?></span>
                        </h6>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-sm"><?php esc_html_e( 'Continue Reading', 'easypoint' ); ?> <small class="fas fa-chevron-right ml-1"></small></a>
                    </div>
                    <!-- /.slide-content -->
                </div>
            <?php endwhile; endif; ?>
        </div>

        <!-- Add Arrows -->
        <?php if( is_rtl() ) : ?>
            <div class="swiper-button-next"><span class="fas fa-chevron-left"></span></div>
            <div class="swiper-button-prev"><span class="fas fa-chevron-right"></span></div>
        <?php else : ?>
            <div class="swiper-button-next"><span class="fas fa-chevron-right"></span></div>
            <div class="swiper-button-prev"><span class="fas fa-chevron-left"></span></div>
        <?php endif; ?>
    </div>
</div>
<!-- /.ep-posts-slider -->
