<?php get_header(); ?>

<div class="content"> 
  <div class="middle">

    <?php the_post() ?>

    <?php get_template_part('template-parts/blogpost') ?>

    <?php get_template_part('template-parts/screenshot') ?>

  </div>
</div>

<?php get_footer(); ?>

