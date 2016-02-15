<div class="posts">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('template-parts/excerpts'); ?>
  <?php endwhile; else : ?>
    <p><?php echo 'Nothing to see here... Move along' ; ?></p>
  <?php endif; ?>
</div>

