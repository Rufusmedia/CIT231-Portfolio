<?php get_header(); ?>




    <div class="main blogroll">
    <?php if(is_category()): ?>
		<h1><?php single_cat_title(); ?></h1>
	<?php elseif(is_tag()): ?>
		<h1>Posts tagged: <?php single_tag_title(); ?></h1>
    <?php endif; ?>
      

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article>
          <?php if(has_post_thumbnail()): ?>
            <section class="feature">
              <?php the_post_thumbnail('thumbnail') ?>
            </section><!--/.feature-->
          <?php endif; ?>
          <section class="text">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    <div class="meta">Posted in: <?php the_category(' '); ?> <?php the_tags(); ?></div><!-- /.meta -->
            <?php the_excerpt(); ?>
          </section><!--/.feature-->
        </article>

      <?php endwhile; endif; ?>




<?php get_footer(); ?>