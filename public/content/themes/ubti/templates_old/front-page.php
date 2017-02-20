<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ubti
 */

get_header(); ?>

<div class="container">
 <h1 class="intelligent">Intelligent Software Solutions</h1>
  
 
  <?php global $more; $about = new WP_Query(); $about->query('page_id=1257'); while ($about->have_posts()) : $about->the_post();$more = false; ?>
  <p>
    <?php the_content(); ?>
  </p>
  <?php endwhile; $more = true; ?>
  <div style=" clear:both;"> </div>
  <p>Contact us today to <a href="#" style="text-decoration: underline;" data-toggle="modal" data-target="#myModal">learn more.</a></p>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Contact Us</h4>
          
             <p class="con_text">We take pride in our customer service and are available to be contacted a few different ways. </p>
          <div class="col-md-6 col-sm-12"><img src="/content/uploads/2016/10/1icon.png" class="learnmore_icon" /> <a href="tel:714.912.1600"><span aria-hidden="true" class="glyphicon glyphicon-earphone"></span> 714.912.1600</a></div>
          <div class="col-md-5 col-sm-12"><img src="/content/uploads/2016/10/2icon.png" class="learnmore_icon" /> <a href="mailto:info@ubtiinc.com"><span aria-hidden="true" class="glyphicon glyphicon-envelope"></span> info@ubtiinc.com</a></div>

          <div class="col-md-11 col-sm-12"><img src="/content/uploads/2016/10/3icon.png" class="learnmore_icon" /><span style="color:#2d5fc4;">Or just send us a message below and we'll get right back to you.</span> </div>
        </div>
        <div class="modal-body"> <?php echo do_shortcode( '[contact-form-7 id="'. get_field('contact_form_id', 'option') .'" title="Contact form 1"]' ); ?> </div>
        <!--div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div-->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<div class="col-md-3 col-sm-12">
  <div id="contact" class="row contact-us"> <a href="tel:714.912.1600"><span aria-hidden="true" class="glyphicon glyphicon-earphone"></span>714.912.1600</a><a href="mailto:info@ubtiinc.com"><span aria-hidden="true" class="glyphicon glyphicon-envelope"></span>info@ubtiinc.com</a> <br/>
    <p>UB Technology Innovations,&nbsp;Inc.<br>
      2401 E Katella Ave,<br>
      Suite 450<br>
      Anaheim,&nbsp;CA 92806.</p>
  </div>
</div>
</div>
</div>
<?php get_footer(); ?>
