<?php get_header();  ?>

<div class="main">
  <div class="container">

    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <h3><?php the_field('short_desc') ?></h3>
        <p>Built for <strong><?php the_field('client') ?></strong></p>
        <?php the_content(); ?>
        
        <?php while(have_rows('images')) : the_row(); ?>
          <?php $image = get_sub_field('image') ?>
          <img src="<?php echo $image['sizes']['medium'] ?>">
          <p><?php the_sub_field('caption') ?></p>
        <?php endwhile ?>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>