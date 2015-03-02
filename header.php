<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>
      Jeromy's Portfolio
    </title>
    <meta name="description" content="Jeromy's Portfolio">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,900,300italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/style.css">
    <?php wp_head(); ?>
  </head>
  <body>




      <div class="ui">
        <div class="logo">
          <a href="<?php the_field('logo_click_link', 'options'); ?>"><img src="<?php the_field('logo_image', 'options'); ?>" alt="Site Logo" />
          <?php if(get_field('logo_text', 'options')): ?>
          	<span class="title"><?php the_field('logo_text', 'options') ?></span>
          <?php endif; ?>
          </a>
        </div><!--/.logo-->
        <div class="padding">
          <nav>
            <?php wp_nav_menu('header-menu'); ?>
          </nav>
          <div class="search area">
            <?php get_search_form(true); ?>
          </div><!--/.search-->
          <div class="socials area flex">
          <?php

// check if the repeater field has rows of data
if( have_rows('social_media_icons', 'options') ):
 	// loop through the rows of data
    while ( have_rows('social_media_icons', 'options') ) : the_row(); ?>
		<a href="<?php the_sub_field('social_link'); ?>" target="_blank"><img src="<?php the_sub_field('social_icon'); ?>" alt="Social Icon" /></a>
    <?php endwhile;

else :

    // no rows found

endif;

?>
          </div><!--/.socials-->
        </div><!--/.padding-->
      </div><!--/.ui-->