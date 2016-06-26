
  <?php get_header(); ?>
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>

  <div class="col col-sm-10">
    <article class="page">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </article>
  </div>

  <?php endwhile;

    else :
      echo '<p>No content found </p>';

    endif;
  ?>

  <?php get_footer(); ?>
