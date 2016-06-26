<?php get_header(); ?>
<div class="col col-sm-10 category-parent-container">
  <div class="categories-container">
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
          printf( '<a href="%1$s">',
            esc_url( get_category_link( $category->term_id ) )
          );

          $current_cat = get_category(get_query_var('cat'))->name;
          if ($current_cat === $category->name ) {
            echo "<div class='category-container selected'>";
          } else {
            echo "<div class='category-container'>";
          }
          the_icon('size=small&class=category-icon',
              $term_type = 'category',
              $id = null,
              $use_term_id = $category->term_id);
          printf( '<p class="category-name">%1$s</p>',
            esc_html( $category->name )
          );


          echo "</div>";
          echo "</a>";
      }
    ?>
  </div>



  <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
  ?>
  <div class="col col-sm-4 category-loop-container">
    <article class="post">
      <a href="<?php the_permalink(); ?>">
        <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('full', array('class' => 'img-responsive'));
          }
          else {
              echo '<img class="img-responsive" src="http://placehold.it/350x180"/>';
          }
        ?>

        <h4>
          <?php
            the_icon('size=small&class=category-icon',
                $term_type = 'category',
                $id = get_the_ID());
          ?>
           <?php the_title(); ?>
        </h4>
      </a>
    </article>
  </div>

  <?php endwhile;
    else :
      echo '<p>No content found</p>';
    endif;
   ?>
</div>


 <?php get_footer(); ?>
