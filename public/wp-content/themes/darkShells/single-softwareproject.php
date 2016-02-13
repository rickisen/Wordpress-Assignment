<?php get_header(); ?>

<div class="content">
  <div class="middle">
    <?php the_post() ?>
    <?php get_template_part('template-parts/blogpost') ?>

    <?php if ( $link = get_post_meta($post->ID, '_link', true)): ?>
      <a href="<?php echo $link ;?>">Webpage</a> <br>
    <?php endif; ?>

    <?php if ( $ghlink = get_post_meta($post->ID, '_ghlink', true)): ?>
      <a href="<?php echo $ghlink ;?>">Github Repo</a> <br>
    <?php endif; ?>

    <?php if ( $screenshot = get_post_meta($post->ID, '_screenshot', true)): ?>
      <img class="screenshot" src="<?php echo $screenshot ;?>"> <br>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>

