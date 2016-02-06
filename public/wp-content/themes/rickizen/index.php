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

get_template_part('header') ?>

<?php get_template_part('sidebar') ?>

<div class="posts">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('excerpts') ?>
  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

  <hr>

  <div class="portfolio">
    <h2>Portfolio</h2> 
    <?php $portfolio = new WP_Query(['post_type' => 'portfolio']);
    while($portfolio->have_posts()): $portfolio->the_post(); ?>

    <div class="small-card">
      <a href="<?php the_permalink() ?>"><h3> <?php the_title(); ?></h3></a>
      <p> <?php the_author_posts_link(); echo "  " ; the_time("Y-M-D H:i"); ?></p>
      <p>
      <?php 
        if ( $terms = get_the_terms (get_the_ID(), 'tech') ){
          $technologies = [];
          
          foreach ($terms as $term){
            $technologies[] = $term->name;
          }

          echo implode(', ', $technologies);
        } else {
          echo 'No tech';
        }
      ?>
      </p>
    </div>

    <?php endwhile; ?>
  </div>
</div>

<?php get_template_part('sidebar-second') ?>

<?php get_template_part('footer') ?>

