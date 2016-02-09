<div class="card-holder">
  <h1>Recent Software Projects</h1>
  <p></p>
  <div class="small-cards">
  <?php 
    $softwareProject = new WP_Query(['post_type' => 'softwareProject']); 
    while($softwareProject->have_posts()): $softwareProject->the_post(); ?>
      <div class="small-card">
        <a href="<?php the_permalink() ?>"><h3> <?php the_title(); ?></h3></a>
        <p> <?php 
            if ( $terms = get_the_terms (get_the_ID(), 'tech') ){
              $technologies = [];

              foreach ($terms as $term){
                $technologies[] = $term->name;
              }

              echo implode(', ', $technologies);
            } else {
              echo 'No tech';
            }
          ?> </p>
      </div>
    <?php endwhile; ?>
  </div>
</div>

