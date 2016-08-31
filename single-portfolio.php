<?php get_header();  ?>

<div class="main">
  <div class="container">

    <div class="singlePortfolio">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php while(have_rows('images')) : the_row(); ?>
          <?php $image = get_sub_field('image') ?>
          <div class="portfolioImage">
            <img src="<?php echo $image['url'] ?>">
            <p><?php the_sub_field('caption') ?></p>
          </div>
        <?php endwhile ?>
        
        <div class="portfolioContent">
          <h2><?php the_title(); ?></h2>
          <h3><?php the_field('project_name') ?></h3>
        <p>Built with <?php the_field('short_desc') ?></p>
          <a target="_blank" href="<?php the_field('project_url') ?>">See Live</a>
        <?php the_content(); ?>
        </div>
        

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>