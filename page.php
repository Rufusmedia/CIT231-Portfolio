<?php get_header(); ?>



    <div class="main">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
          <?php if(has_post_thumbnail()): ?>
            <section class="feature">
              <?php the_post_thumbnail('full') ?>
            </section><!--/.feature-->
          <?php endif; ?>
          <section class="text">
            <?php the_content(); ?>
          </section><!--/.feature-->
        </article>
      <?php endwhile; endif; ?>



<?php get_footer(); ?>
