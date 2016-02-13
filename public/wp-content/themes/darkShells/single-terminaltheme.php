<?php get_header(); ?>

<div class="content">

  <?php the_post() ?>
  <?php get_template_part('template-parts/blogpost') ?>

  <?php if ( $link = get_post_meta($post->ID, '_link', true)): ?>
    <a href="<?php echo $link ; ?>">Download here</a>
  <?php endif; ?>
  <?php if ( $screenshot = get_post_meta($post->ID, '_screenshot', true)): ?>
    <img class="screenshot" src="<?php echo $screenshot ;?>">
  <?php endif; ?>

</div>

<?php get_footer(); ?>

