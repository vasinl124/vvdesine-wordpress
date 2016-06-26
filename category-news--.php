<?php get_header(); ?>
<div class="col col-sm-10">
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>

  <article class="post">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </article>

  <?php endwhile;
    else :
      echo '<p>No content found sss</p>';
    endif;
  ?>
</div>

<?php get_footer(); ?>
