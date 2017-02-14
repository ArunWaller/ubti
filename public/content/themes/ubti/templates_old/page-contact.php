<?php
/**
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

      <div class="col-sm-12">	
        <nav class="visible-md visible-lg">
          <ol class="cd-breadcrumb triangle clearfix">
						<?php
							if(function_exists('bcn_display')) {
								bcn_display();
							}
						?>
          </ol>
        </nav>
      </div>

    </div>

    <div id="contact" class="row contact-us">
      <div class="col-md-7">
        <?php if( have_rows('contact_details', 'option') ): ?>
          <?php while( have_rows('contact_details', 'option') ): the_row();
            // vars
            $contact_title = get_sub_field('contact_title');
            $contact_location_link = get_sub_field('contact_location_link');
            $contact_location_image = get_sub_field('contact_location_image');
            $contact_email = get_sub_field('contact_email');
            $contact_phone = get_sub_field('contact_phone');
            $contact_alt_number = get_sub_field('contact_alt_number');
            $contact_address = get_sub_field('contact_address');
          ?>

            <h4><?php echo $contact_title; ?></h4>
            <div class="row">
              <div class="col-md-7">
                <a href="<?php echo $contact_location_link; ?>" target="_blank">
                  <img src="<?php echo $contact_location_image; ?>" alt="Location Map" class="img-responsive">
                </a>
              </div>
              <div class="col-md-5">

                <a href="tel:<?php echo $contact_phone; ?>"><span aria-hidden="true" class="glyphicon glyphicon-earphone"></span><?php echo $contact_phone; ?></a>

                <?php if( $contact_alt_number ): ?>
                  <a href="tel:<?php echo $contact_alt_number; ?>"><span aria-hidden="true" class="glyphicon glyphicon-earphone"></span><?php echo $contact_alt_number; ?></a>
                <?php endif; ?>

                <?php if( $contact_email ): ?>
                  <a href="mailto:<?php echo $contact_email; ?>"><span aria-hidden="true" class="glyphicon glyphicon-envelope"></span><?php echo $contact_email; ?></a>
                <?php endif; ?>

                <?php echo $contact_address; ?>
              </div>
            </div>

          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="col-md-5" style="padding:30px 15px 0 15px;">
        <?php $contact_form_id = get_field('contact_form_id', 'option'); ?>
        <?php echo do_shortcode( '[contact-form-7 id="'. $contact_form_id .'" title="Contact form 1"]' ); ?>
      </div>
    </div>

  </div>
</div>


<?php get_footer(); ?>
