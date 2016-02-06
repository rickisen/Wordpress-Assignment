
<div class="excerpts">
  <a href="<?php the_permalink() ?>"><h3> <?php the_title(); ?></h3></a>
  <p> <?php the_author_posts_link(); echo "  " ; the_time("Y-M-D H:i"); ?></p>
  <p> <?php the_excerpt(); ?></p>
</div>

