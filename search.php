<?php get_header(); ?>




    <div class="main blogroll search-results">
      <h1>Search results for: <?php echo get_search_query(); ?></h1>
      <ol>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <li>
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
          </li>
        <?php endwhile;?>

        <?php else: ?>
          <li>
            <article>
              <section class="text">
                <h2>No Results for This Query</h2>
              </section><!--/.feature-->
            </article>
          </li>
        <?php endif; ?>
      </ol>





<?php get_footer(); ?>