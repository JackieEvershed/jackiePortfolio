<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,900" rel="stylesheet">
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
   <?php if (has_post_thumbnail( $post->ID ) ): ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <?php endif; ?>

   <?php if ( is_front_page() ): ?> 
      <div class="hero" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(55, 55, 55, 0.5)
    ), url(<?php echo $image[0] ?>)">
    <nav>
        <?php the_custom_logo( $blog_id = 0 ) ?>
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
    </nav>
    <div class="pictureBorder">
      <div class="mainTitles">
          <h1>
            <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
              <?php bloginfo( 'name' ); ?>
            </a>
          </h1>
           <h2>Front-End Web Developer</h2>
      </div>
    </div>

  <?php else: ?>
     <nav>
        <?php the_custom_logo( $blog_id = 0 ) ?>
        <div class="blackFont">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
        </div>
    </nav>
  <?php endif; ?>


</header><!--/.header-->

