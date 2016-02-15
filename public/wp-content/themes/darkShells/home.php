<?php get_header(); ?>

<div class="content flex-container">
  <?php get_sidebar() ?>

  <div class="middle">

    <?php get_template_part('template-parts/excerpt-loop'); ?>

    <!-- Get a litle square of software projects -->
    <?php $postType = 'softwareproject'; $title = 'My Recent Software Projects'; ?>
    <?php include(locate_template('template-parts/small-cards.php')) ?>

  </div>

</div>
<?php get_footer(); ?>


