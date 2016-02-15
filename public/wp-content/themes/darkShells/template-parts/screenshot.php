  <?php if ( $screenshot = get_post_meta($post->ID, '_screenshot', true)): ?>
    <div class="screenshot-frame">
      <img class="screenshot" src="<?php echo $screenshot ;?>">
    </div>
  <?php endif; ?>
