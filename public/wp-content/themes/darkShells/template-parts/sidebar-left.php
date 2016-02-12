<div class="sidebar left-sidebar">
  <li>
    <h2>Sections</h2>
    <ul>
      <?php 
        foreach( get_pages() as $page) {
          echo '<li> <a href="/'.$page->post_title.'">'.$page->post_title.'</a></li>';
        }

        foreach( get_post_types( ['public' => true, '_builtin' => false], 'objects') as $postType ){
          echo '<li> <a href="/'.$postType->name.'">'.$postType->label.'</a></li>';
        }
      ?>
    </ul>
  </li>
  <?php if (is_active_sidebar('sidebar-left')) : dynamic_sidebar('sidebar-left'); ?>
  <?php endif ?>

</div>


