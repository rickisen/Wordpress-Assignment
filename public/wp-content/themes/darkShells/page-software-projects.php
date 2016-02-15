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

    <?php $postTypeObject = new WP_Query(['post_type' => array( 'softwareProject' )]); 
      while($postTypeObject->have_posts()){
          $postTypeObject->the_post(); 
          get_template_part('template-parts/excerpts');
      }
    ?>

    <!-- needs to do like this, otherwise variable scope is lost-->
    <?php $postType = 'terminaltheme'; $title = 'Recent Terminal Themes'; ?>
    <?php include(locate_template('template-parts/small-cards.php')) ?>
    <?php $postType = 'clireview'; $title = 'Recent Reviews of CLI-apps'; ?>
    <?php include(locate_template('template-parts/small-cards.php')) ?>

  </div>
</div>
<?php get_footer(); ?>

