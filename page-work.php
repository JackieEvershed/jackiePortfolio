<?php get_header();  ?>

<div class="main">
  <div class="container">  

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
       <div class="title"> 
        <h3><?php the_title(); ?></h3>
        <p><?php the_content(); ?><p>
      </div>
    <?php endwhile; // end the loop?>
    <div class="works">

      <?php // Start the loop ?>


      <?php $portfolio = new WP_Query(
        array(
          'post_type' => 'portfolio',
          'posts_per_page' => -1,
          'order' => 'ASC'
        )
       ) ?>
       <?php if($portfolio->have_posts()): ?>
        <?php while ($portfolio->have_posts()): $portfolio->the_post(); ?>
            <div class="workItem <?php echo $post->post_name ?>">
              <?php while(have_rows('images')) : the_row(); ?>
              <a href='<?php the_permalink(); ?>'>
                <?php $image = get_sub_field('image') ?>
                <img src="<?php echo $image['url'] ?>">
                <h3><?php the_title(); ?></h3>
                <h4><?php the_field('project_name') ?></h4>
                <p><?php the_field('short_desc') ?></p>
              </a>
              <?php endwhile ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif ?>
    </div> <!-- works -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>