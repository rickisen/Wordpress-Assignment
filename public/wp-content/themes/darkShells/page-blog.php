<?php

get_header(); ?>

<div class="content flex-container">
  <?php get_sidebar() ?>

  <div class="middle">

    <div class="posts">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php get_template_part('template-parts/blogpost') ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <?php $postTypeObject = new WP_Query(['post_type' => 'post']); 
      while($postTypeObject->have_posts()){
              $postTypeObject->the_post(); 
          get_template_part('template-parts/excerpts');
      }
    ?>

  </div>

</div>
<?php get_footer(); ?>

