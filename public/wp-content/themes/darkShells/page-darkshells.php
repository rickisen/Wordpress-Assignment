
<?php

get_header(); ?>

<div class="content flex-container">
  <?php get_sidebar() ?>

  <div class="middle">
    <?php the_post(); ?>

    <div class="posts">
      <?php get_template_part('template-parts/pagepost') ?>
    </div>

    <hr>

    <?php $postTypeObject = new WP_Query(['post_type' => array( 'post', 'softwareProject', 'terminaltheme', 'CliReview' )]); 
      while($postTypeObject->have_posts()){
          $postTypeObject->the_post(); 
          get_template_part('template-parts/excerpts');
      }
    ?>

  </div>
</div>
<?php get_footer(); ?>

