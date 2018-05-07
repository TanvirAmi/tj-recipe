<div class="pagination-area d-sm-flex mt-15">

  <?php if ( is_singular( 'post' ) ): // If viewing a single post page.  ?>

    <div class="post-nav clearfix">
  <?php previous_post_link( '<p class="post-nav-prev">' . __( '<i class="fa fa-angle-double-left"></i>%link', 'tj-recipe' ) . '</p>', '%title' ); ?>
  <?php next_post_link( '<p class="post-nav-next">' . __( '%link<i class="fa fa-angle-double-right"></i>', 'tj-recipe' ) . '</p>', '%title' ); ?>
  </div><!-- .loop-nav -->

  <?php elseif( is_home() || is_archive() || is_search() ): // If viewing the blog, archive or search results. ?>

      <?php
        if( class_exists('Jetpack') && Jetpack::is_module_active('infinite-scroll') ){
          return;
        }
      ?>

      <?php  loop_pagination(
          array(
            'prev_text' => _x('<i class="fa fa-angle-double-left" aria-hidden="true"></i> Previous', 'posts navigation', 'tj-recipe'),
            'next_text' => _x('Next <i class="fa fa-angle-double-right" aria-hidden="true"></i>', 'posts navigation', 'tj-recipe')
          )
      ); ?>

  <?php endif; ?>

</div>
