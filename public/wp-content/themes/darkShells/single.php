<?php get_header(); ?>

<div class="content">
  <?php the_post() ?>
  <?php get_template_part('template-parts/blogpost') ?>
</div>

<?php get_footer(); ?>

