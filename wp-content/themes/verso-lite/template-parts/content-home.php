<?php
/*
@package verso
  =================
  Page Template
  =================
*/
?>
<div class="container">

<article id="post-<?php the_ID(); ?>" <?php post_class('home-post-article'); ?>>
  <div class="entry-content clearfix">

        <?php the_content(); ?>

  </div><!-- .entry-content -->

</article>

</div>
