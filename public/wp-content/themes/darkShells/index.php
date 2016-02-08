<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div class="content">
  <?php get_sidebar() ?>

  <div class="middle">

    <h1>THIS IS THE INDEX PAGE</h1>

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


