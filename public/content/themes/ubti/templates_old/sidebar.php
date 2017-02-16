<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package ubti
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!--div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div--><!-- #secondary -->

<?php //if( ! is_child('About') ): ?>
  <a href="#" class="btn btn-big" data-toggle="modal" data-target="#myModal">Learn More</a>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Contact Us</h4>
          <p class="con_text">We take pride in our customer service and are available to be contacted a few different ways. </p>
          <div class="col-md-6 col-sm-12"><img src="http://www.ubtiinc.com/wp-content/uploads/2016/10/1icon.png" style="vertical-align:middle; padding:10px 10px 10px 0;" /> <a href="tel:714.912.1600"><span aria-hidden="true" class="glyphicon glyphicon-earphone"></span> 714.912.1600</a></div>
          <div class="col-md-5 col-sm-12"><img src="http://www.ubtiinc.com/wp-content/uploads/2016/10/2icon.png" style="vertical-align:middle; padding:10px 10px 10px 0;" /> <a href="mailto:info@ubtiinc.com"><span aria-hidden="true" class="glyphicon glyphicon-envelope"></span> info@ubtiinc.com</a></div>
          <div class="col-md-11 col-sm-12"><img src="http://www.ubtiinc.com/wp-content/uploads/2016/10/3icon.png" style="vertical-align:middle;  padding:10px 10px 10px 0;" /><span style="color:#2d5fc4;">Or just send us a message below and we'll get right back to you.</span> </div>
                
          
          
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
  </div><!-- /.modal -->

<?php //endif; ?>
<?php wp_nav_menu( array( 'theme_location' => 'sidemenu', 'menu_id' => 'side-menu', 'menu_class' => 'menu-sidebar') ); ?>
