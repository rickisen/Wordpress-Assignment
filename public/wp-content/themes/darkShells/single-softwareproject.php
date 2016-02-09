<?php get_header(); ?>

<div class="content">
  <?php the_post() ?>
  <?php get_template_part('template-parts/blogpost') ?>
  <a href="<?php echo get_post_meta($post->ID, 'github', true); ?>">Github Repo</a>
</div>

<?php get_footer(); ?>

