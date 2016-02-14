<div class="card-holder">
<h1><?php echo $title ;?></h1> <br>
  <div class="small-cards">
  <?php 
    $postTypeObject = new WP_Query(['post_type' => $postType]); 
    $count = 0 ;
    while($postTypeObject->have_posts() && $count++ < 3): $postTypeObject->the_post(); ?>
      <div class="small-card">
        <a href="<?php the_permalink() ?>"><h3> <?php the_title(); ?></h3></a>
        <p> 
        <?php 
        foreach (get_object_taxonomies($postType, 'object') as $taxonomy){
            if ( $termObjects = get_the_terms(get_the_ID(), $taxonomy->name) ){
              echo "$taxonomy->label: ";
              $terms = [] ;
              foreach ($termObjects as $termObject){
                $terms[] = $termObject->name;
              }

              echo implode(', ', $terms).'<br>';
            }
          }
        ?> 
        </p>
      </div>
    <?php endwhile; ?>
  </div>
</div>

