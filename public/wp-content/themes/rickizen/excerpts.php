

<div class="excerpts">
  <a href="<?php the_permalink() ?>"><h1> <?php the_title(); ?></h1></a>
  <p> <?php the_author_posts_link(); echo "  " ; the_time("Y-M-D H:i"); ?></p>
  <p> <?php the_excerpt(); ?></p>
</div>

