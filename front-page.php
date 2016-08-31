<?php get_header();  ?>

<div class="main">
  <div class="container">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
       <section class="about">
            <h2>About</h2>
       <div class="aboutItems">
         <div class=aboutContent>
              <?php the_content(); ?>
        </div>
            <div class="profilePic">
                <div class="emptyFrame">
                    <div></div>
                </div>
                <div class="me">
                  <?php $profilePic = get_field('profile') ?>
                  <img src="<?php echo $profilePic['url']?>">
                </div>
            </div>
        </div>
       </section> 

      <?php endwhile; // end the loop?>
      <section class="toolbox">
      <h2>Developer Toolbox</h2>
      <div class="skills">
      <?php while(have_rows('skills')) : the_row(); ?>
        <div class="skill">
        <?php $counter = 0; ?>
                <div class="cycler">
            <?php while(have_rows('skill_images')): the_row(); ?>
                  <?php $skillImage = get_sub_field('skill_image') ?>
                  <?php if ($counter == 0 ) { ?>
                    <img class="active" src="<?php echo $skillImage['url']?>">
                  <?php 
                  }
                  else {
                  ?>
                    <img src="<?php echo $skillImage['url']?>">
                  <?php
                  }
                  $counter++;
                  ?>
            <?php endwhile; ?>
                </div>

            <h3><?php the_sub_field('skill_name') ?></h3>
            <p><?php the_sub_field('skill_desc') ?></p>
        </div>
          <?php endwhile ?>
      </div>

      </section>
      <section class="portfolio">
      <h2>Portfolio</h2>

     <?php $portfolio = new WP_Query(
      array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
        'order' => 'ASC'
      )
     ); ?>
     <div class="portfolioDisplay">
     <?php if($portfolio->have_posts()): ?>
      <?php while ($portfolio->have_posts()): $portfolio->the_post(); ?>
          <div class="portfolioItem <?php echo $post->post_name ?> clearfix">
          <?php while(have_rows('images')) : the_row(); ?>
            <?php $image = get_sub_field('image') ?>
            <img src="<?php echo $image['url'] ?>">
            <div class="portfolioItemInfo">
              <h3><?php the_title(); ?></h3>
              <h4><?php the_field('project_name') ?></h4>
              <p><?php the_field('short_desc') ?></p>
              <p class="projectInfo"><?php the_field('project_info'); ?></p>
              <a target="_blank" href="<?php the_field('project_url') ?>">See Live</a>
            </div>
          <?php endwhile ?>
          </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif ?>
    </div> <!-- portfolio display -->
    </section>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>