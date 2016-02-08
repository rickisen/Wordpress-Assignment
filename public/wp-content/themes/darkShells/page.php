<?php
/**
 * The template for displaying pages
 *
 */

get_header(); ?>

<div class="content">
  <?php get_sidebar() ?>

  <div class="middle">

    <h1>THIS IS A PAGE</h1>

    <div class="posts">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/blogpost') ?>
      <?php endwhile; else : ?>
        <p><?php _e( 'Nothing to see here... Move along' ); ?></p>
      <?php endif; ?>
    </div>

    <?php get_template_part('template-parts/softwareProjects') ?>

  </div>

</div>
<?php get_footer(); ?>

