      <div class="clear"> </div>
      <div class="footer">
        <div class="arrows flex-container">
          <span class="leftside-arrows">
            <span class="arrow"><?php the_author() ?></span>
            <span class="arrow"><?php the_title() ?></span>
          </span>
          <span class="no-arrow"> <?php the_permalink() ?> </span>
          <span class="rightside-arrows">
            <span class="arrow"><?php echo date("Y-m-D") ?></span>
            <span class="arrow"> DarkShells </span>
          </span>
        </div>
      </div>
    </div> <!-- end of wrapper -->
    <?php if (is_active_sidebar('sidebar-hidden')) : ?>
      <div class="hidden-footer wrapper window-colors flex-container">
        <?php dynamic_sidebar('sidebar-hidden'); ?>
      </div>
    <?php endif ?>
  </body>
</html>
