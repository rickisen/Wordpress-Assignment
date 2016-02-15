      <!-- to get data for the arrows-->
      <?php wp_reset_postdata()?>
      <?php global $current_user ?>
      <?php get_currentuserinfo()?>

      <div class="footer">
        <div class="arrows flex-container">
          <span class="leftside-arrows">
            <span class="arrow"><?php echo $user_ID ? $current_user->user_login : 'Guest' ?></span>
            <span class="arrow"><?php the_title() ?></span>
          </span>
          <span class="no-arrow"> <?php the_permalink() ?> </span>
          <span class="rightside-arrows">
            <span class="arrow"><?php echo date("Y-m-D") ?></span>
            <span class="arrow"> DarkShells </span>
          </span>
        </div>
      </div>
    </div> <!-- end of "main" wrapper -->

    <!-- adds a hidden footer area if admin wants one -->
    <?php if (is_active_sidebar('sidebar-hidden')) : ?>
      <div class="hidden-footer wrapper window-colors flex-container">
        <?php dynamic_sidebar('sidebar-hidden'); ?>
      </div>
    <?php endif ?>

  </body>
</html>
