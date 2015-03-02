      <footer class="row">
        <div class="col-1-2">
          <?php dynamic_sidebar('footer-left') ?>
        </div><!-- /.col-1-2 -->
        <div class="col-1-2">
          <?php dynamic_sidebar('footer-right') ?>
        </div><!-- /.col-1-2 -->
      </footer>

      
      <div class="copyrights">
        <?php the_field('copyright_text', 'options'); ?>
      </div><!-- /.copyrights -->

    </div><!--/.main-->
  <?php wp_footer(); ?>
  </body>
</html>