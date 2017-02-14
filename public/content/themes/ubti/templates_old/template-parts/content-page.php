<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ubti
 */

?>

	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php edit_post_link( esc_html__( 'Edit', 'ubti' ), '<span class="edit-link">', '</span>' ); ?>

