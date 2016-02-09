<div class="excerpts">
  <a href="<?php the_permalink() ?>"><h3> <?php the_title(); ?></h3></a>
    <div class="excerpt-container"> 
      <div class="excerpt">
        <?php the_excerpt(); ?>
      </div>
      <div class="post-info">
      <p> <?php the_author_posts_link(); echo "  " ; the_time("Y-M-D H:i"); ?></p>
      </div>
  </div>
  <br>
</div>

