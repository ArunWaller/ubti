<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ubti
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">

<?php wp_head(); ?>

</head>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

<body <?php body_class(); ?>>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78909911-1', 'auto');
  ga('send', 'pageview');

</script>


<script type="text/javascript">
$('nav#access ul li:hover').click(function(){
     $(this).children('ul').toggle();
});
</script>





<!--  Fixed NavBar Start-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display-->
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target="#menu-main_menu" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <?php if ( is_front_page() || is_home() ) : ?>
				<h1 class="site-title"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<div class="logo-wrap"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			<?php endif; ?>
    </div>
	<div id="top-menu" onclick="">  
    <!-- Collect the nav links, forms, and other content for toggling-->
		<?php
			wp_nav_menu(      array(
			 'menu'            =>     'primary',
			 'theme_location'  =>     'primary',
			 'depth'           =>     2,
			 'container'       =>     'div',
			 'container_class' =>     'collapse navbar-collapse',
			 'container_id'    =>     'menu-main_menu',
			 'menu_class'      =>     'nav navbar-nav navbar-right collapse',
			 'fallback_cb'     =>     'wp_bootstrap_navwalker::fallback',
			 'walker'          =>     new wp_bootstrap_navwalker())
			);
		?>
        </div>


  </div>
  <!-- /.container-fluid-->
</nav>
<!-- Fixed NavBar End-->



<?php if ( is_front_page() || is_home() ) : ?>
<header>
   
</header>



<?php endif; ?>
