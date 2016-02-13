
  <a href="<?php the_permalink() ?>"><h2> <?php the_title(); ?></h2></a>
  <?php the_content(); ?>
  <p> <?php the_author_posts_link(); echo "  " ; the_time("Y-M-D H:i"); ?></p>
  <br>

