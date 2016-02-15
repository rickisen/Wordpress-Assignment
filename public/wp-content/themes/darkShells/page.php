<?php
/**
 * The template for displaying pages
 *
 */

get_header(); ?>

<div class="content flex-container">
  <?php get_sidebar() ?>

  <div class="middle">
    <?php the_post(); ?>

    <div class="posts">
      <?php get_template_part('template-parts/pagepost') ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>

