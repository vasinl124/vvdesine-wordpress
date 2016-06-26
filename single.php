<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>
<div class="col col-sm-10">
  <article class="post">
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </article>
</div>

<?php endwhile;

  else :
    echo '<p>No content found </p>';

  endif;


get_footer();
?>
