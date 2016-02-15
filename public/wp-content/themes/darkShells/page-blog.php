<?php get_header(); ?>

<div class="content flex-container">

  <?php get_sidebar() ?>

  <div class="middle"> 

    <?php the_post(); ?>

    <div class="posts">
      <?php get_template_part('template-parts/pagepost') ?>
    </div>

    <hr>

    <!-- get an excerpt of the most recent blogposts 
    (with a link to the full post)-->
    <?php $postTypeObject = new WP_Query(['post_type' => 'post']); ?>
    <?php while($postTypeObject->have_posts()): ?>
      <?php $postTypeObject->the_post(); ?>
      <?php get_template_part('template-parts/excerpts');?>
    <?php endwhile ?> 

  </div> 
</div>

<?php get_footer(); ?>

