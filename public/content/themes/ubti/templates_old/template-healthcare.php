<?php
/**
 * Template Name: Healthcare Page
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

<div class="wrap-content page single">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12 page-content">
        <nav class="visible-md visible-lg">
          <ol class="cd-breadcrumb triangle clearfix">
						<?php
							if(function_exists('bcn_display')) {
								bcn_display();
							}
						?>
          </ol>
        </nav>

	      <?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>
                
                
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Contact Us</h4>
        </div>
        <div class="modal-body">
            <?php echo do_shortcode( '[contact-form-7 id="'. get_field('contact_form_id', 'option') .'" title="Contact form 1"]' ); ?>
        </div>
        <!--div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div-->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

      </div>
      <div class="col-md-3 col-sm-12 sidebar">
        <?php get_sidebar(); ?>
        <?php wp_nav_menu( array( 'theme_location' => 'healthcare_menu', 'menu_id' => 'healthcare-menu', 'menu_class' => 'menu-sidebar') ); ?>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
