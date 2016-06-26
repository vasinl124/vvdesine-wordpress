  </div><!-- end of row -->
</div><!-- end of container-fluid -->
  <div class="container-fluid site-footer-container">
    <div class="row">
      <div class="col col-sm-12">
        <footer class="site-footer">
          <nav class="site-nav">
            <?php $args = array(
              'theme_location' => 'footer'
            ); ?>
            <?php wp_nav_menu( $args ) ?>
          </nav>
          <p class='copyright text-center'><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?> </p>
        </footer>
        <?php wp_footer(); ?>
      </div>
    </div>
  </div>
</body>
</html>
