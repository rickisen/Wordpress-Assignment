  <?php the_content(); ?>
  <p> 
    <?php the_author_posts_link(); echo "  " ; the_time("Y-M-D H:i"); ?>
  </p> <br>

  <?php the_taxonomies( [ 'before' => '<div class="taxonomies">', 'sep' => '<br>' ,'after' => '</div>' ] ); ?> 
