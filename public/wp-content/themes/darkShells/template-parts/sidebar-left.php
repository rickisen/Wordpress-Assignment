<div class="sidebar left-sidebar">

  <li>
    <h2>Sections</h2>
    <ul>
      <?php 
        $args = array(
          'public'   => true,
          '_builtin' => false
        );

        foreach( get_post_types($args, 'objects') as $postType ){
          echo '<li> <a href="/'.$postType->name.'">'.$postType->label.'</a>';
        }
      ?>
    </ul>
  </li>


  <?php 
    if (is_active_sidebar('sidebar-left')) {
      dynamic_sidebar('sidebar-left');
    }
  ?>

</div>


