
<?php get_header(); ?>
<div class="col col-sm-10 main-page">

  <div class="main-carousel owl-carousel">
      <?php query_posts(array ( 'category_name' => 'work', 'posts_per_page' => -1 )); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="item">
        <a href="<?php the_permalink() ?>" rel="bookmark">
          <?php
              $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
          ?>
          <div class="carousel-row" style="background: url(<?php echo $src[0] ?>)">

          </div>
          <h4 class="work-name"><?php the_title(); ?></h4>
        </a>
      </div>
    	<?php endwhile; else: ?>
    	<?php _e('Sorry, no posts matched your criteria.'); ?>

      <?php endif; ?>
  </div>

  <div class="col col-sm-12">
    <h2>Recents</h2>
  </div>
  <?php query_posts(); ?>
  <?php
    if (have_posts()) :
      while (have_posts()) : the_post(); ?>
      <a href="<?php the_permalink(); ?>">
        <div class="col col-sm-4 loop-post-container">
          <article class="post">
            <?php
              if ( has_post_thumbnail() ) {
                  the_post_thumbnail('full', array('class' => 'img-responsive'));
              }
              else {
                  echo '<img class="img-responsive" src="http://placehold.it/350x180"/>';
              }
            ?>
            <h4>
              <?php the_title(); ?>
            </h4>
          </article>
        </div>
      </a>
  <?php endwhile;

    else :
      echo '<p>No content found </p>';

    endif;
  ?>
</div>
<?php get_footer(); ?>
