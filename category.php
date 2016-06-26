<?php get_header(); ?>
<div class="col col-sm-10">
  <?php
    if (get_category(get_query_var('cat'))->category_parent !== 0) {
      $id = get_category(get_query_var('cat'))->category_parent;
    } else {
      $id = get_category(get_query_var('cat'))->cat_ID;
    }
    $categories = get_categories( array(
        'hide_empty' => 0,
        'orderby' => 'name',
        'order'   => 'ASC',
        'child_of' => $id
    ) );

    foreach ( $categories as $category ) {
        $current_cat = get_category(get_query_var('cat'))->name;
        if ($current_cat === $category->name ) {
          echo "<div class='category-container selected'>";
        } else {
          echo "<div class='category-container'>";
        }

        printf( '<a href="%1$s">',
            esc_url( get_category_link( $category->term_id ) )
        );
        cfi_featured_image( array(
          'size' => 'thumbnail',
          'title' => $category->name,
          'class' => 'category-image',
          'alt' => 'My image',
          'cat_id' => $category->term_id) );

        printf( '<p class="category-name">%1$s</p>',
          esc_html( $category->name )
        );
        echo "</a>";

        echo "</div>";
    }
  ?>


  <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
  ?>



  <article class="post">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <!-- <p><?php the_content(); ?></p> -->
  </article>

  <?php endwhile;
    else :
      echo '<p>No content found</p>';
    endif;
   ?>
</div>


 <?php get_footer(); ?>
