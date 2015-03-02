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
      <div class="post-pagination">
      	<div class="next-post">
        	<?php next_post_link(); ?>
        </div><!--/.next-post-->
        <div class="previous-post">
        	<?php previous_post_link(); ?>
        </div><!--/.previous-post-->
      </div><!--/.post-pagination-->



<?php get_footer(); ?>