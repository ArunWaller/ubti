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

<?php
  $page_1 = get_page_by_title( 'Aerospace & Defense' );
  $page_2 = get_page_by_title( 'Financial Services' );
  $page_3 = get_page_by_title( 'Healthcare' );

?>
<div class="wrap-sec-nav">
  <div class="container">
    <div class="row">    
      <div class="col-sm-4"><a href="<?php echo get_permalink( $page_1->ID ); ?>"><i class="icon-areospace"></i><span>Aerospace</span></a></div>
      <div class="col-sm-4"><a href="<?php echo get_permalink( $page_2->ID ); ?>"><i class="icon-finance"></i><span>Finance</span></a></div>
  <div class="col-sm-4"><a href="<?php echo get_permalink( $page_3->ID ); ?>"><i class="icon-healthcare"></i><span>Healthcare</span></a></div>

    </div>
  </div>
</div>

<div class="wrap-content archive">
  <div class="container">
    <nav class="hidden-xs">
      <ol class="cd-breadcrumb triangle clearfix">
        <?php
          if(function_exists('bcn_display')) {
            bcn_display();
          }
        ?>
      </ol>
    </nav>

    <?php
      $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );
      foreach( $mypages as $page ) :
        $content = $page->post_excerpt;
        //$content = apply_filters( 'the_content', $content );
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($page->ID) );

    ?>
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <a href="<?php echo get_page_link( $page->ID ); ?>"><img src="<?php echo $feat_image?>" alt="" class="img-responsive wow slideInLeft"></a>
        </div>
        <div class="col-md-8 col-sm-12 wow slideInRight">
          <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
          <p><?php echo $content; ?></p>
          <a href="<?php echo get_page_link( $page->ID ); ?>" ><b><u>Learn more</u></b></a>
	  <br></br>
        </div>
      </div>
    <?php
      endforeach;
    ?>

    <!-- .entry-content -->
    <?php edit_post_link( esc_html__( 'Edit', 'ubti' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
</div>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
