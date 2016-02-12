<?php get_header(); ?>

<div class="content">

  <?php the_post() ?>
  <?php get_template_part('template-parts/blogpost') ?>

  <?php if ( $ghlink = get_post_meta($post->ID, '_ghlink', true)): ?>
    <a href="<?php echo $ghlink ;?>">Github Repo</a>
  <?php endif; ?>

  <?php if ( $screenshot = get_post_meta($post->ID, '_screenshot', true)): ?>
    <div class="screenshot" style="background-image:url(<?php echo $screenshot ;?>)"> </div>
  <?php endif; ?>

</div>

<?php get_footer(); ?>

