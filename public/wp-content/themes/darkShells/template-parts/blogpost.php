
<div class="blogpost">
  <a href="<?php the_permalink() ?>"><h2> <?php the_title(); ?></h2></a>
  <br>
  <p> <?php the_content(); ?></p>

  <br>
  <p> <?php the_author_posts_link(); echo "  " ; the_time("Y-M-D H:i"); ?></p>
</div>

