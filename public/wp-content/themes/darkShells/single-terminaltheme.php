<?php get_header(); ?>

<div class="content">
  <div class="middle">
    <?php the_post() ?>
    <?php get_template_part('template-parts/blogpost') ?>

    <?php if ( $link = get_post_meta($post->ID, '_link', true)): ?>
      <a href="<?php echo $link ; ?>">Download here</a> <br>
    <?php endif; ?>
    
    <?php get_template_part('template-parts/screenshot') ?>

  </div>
</div>

<?php get_footer(); ?>

