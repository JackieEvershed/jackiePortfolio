<?php get_header();  ?>

<div class="main">
  <div class="container">

          <h2><?php the_title(); ?></h2>
          <p>Don't be shy!</p>
          <p>Please feel free to contact me via Twitter, E-Mail, or the form below.</p>
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div class="contact">
        <div class="contactInfo">
         
          <div class="socialLinks">
         <?php while(have_rows('contact_info')) : the_row(); ?>
             <a href="<?php the_sub_field('contact_url') ?>">
                <h4><?php the_sub_field('contact_name') ?></h4>
            </a>
          <?php endwhile ?>
          </div>
          <?php the_content(); ?>
        </div>

      <?php endwhile; // end the loop?>
    </div>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>