<?php
/**
 * Template Name: Industries Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ubti
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<header>
  <div class="container">
    <?php the_title( '<h1 class="entry-title color-lav">', '</h1>' ); ?>
  </div>
</header>

<div class="wrap-content archive">
  <div class="container">
    <nav class="visible-md visible-lg">
      <ol class="cd-breadcrumb triangle clearfix">
        <?php
          if(function_exists('bcn_display')) {
            bcn_display();
          }
        ?>
      </ol>
    </nav>


    <?php
      $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc', 'parent' => $post->ID) );
      $count = 0;
      $total = count($mypages);
      $is_odd = ($total % 2 != 0 ? true : false);

      foreach( $mypages as $page ) :
        $content = $page->post_excerpt;
        //$content = apply_filters( 'the_content', $content );
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($page->ID) );

    ?>

      <?php echo ($count % 2 == 0 ? '<div class="row">' : ''); ?>

        <div class="col-md-6 <?php echo ($is_odd && ($count == $total-1) ? 'col-md-offset-3' : ''); ?> col-sm-12 wow <?php echo ($count % 2 == 0 ? 'slideInLeft' : 'slideInRight'); ?>">
          <a href="<?php echo get_page_link( $page->ID ); ?>"><img src="<?php echo $feat_image?>" alt="" class="img-responsive"></a>
          <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
          <p><?php echo $content; ?></p>
          <a href="<?php echo get_page_link( $page->ID ); ?>"><b><u>Learn more</u></b></a>
	  <br></br>
        </div>
      <?php echo (($count % 2 != 0) || ($count == $total-1) ? '</div>' : ''); ?>

    <?php
      $count++;
      endforeach;
    ?>

    <?php edit_post_link( esc_html__( 'Edit', 'ubti' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
</div>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
