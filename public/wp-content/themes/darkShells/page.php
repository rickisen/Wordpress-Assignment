<?php
/**
 * The template for displaying pages
 *
 */

get_header(); ?>

<div class="content flex-container">
  <?php get_sidebar() ?>

  <div class="middle">
    <div class="posts">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <a href="<?php the_permalink() ?>"><h2> <?php the_title(); ?></h2></a>
        <?php get_template_part('template-parts/pagepost') ?>
      <?php endwhile; else : ?>
        <p><?php _e( 'Nothing to see here... Move along' ); ?></p>
      <?php endif; ?>
    </div>
  </div>

</div>
<?php get_footer(); ?>

