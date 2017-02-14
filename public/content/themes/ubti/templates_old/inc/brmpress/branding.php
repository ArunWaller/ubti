<?php
/**
 * Functions
 **/

/** actions **/
add_action('login_head', 'brm_login_logo_css');
add_action('admin_head','brm_admin_css');
add_action('login_footer', 'change_login_footer');
add_action( 'wp', 'my_private_page_404' );

/** filters **/
add_filter('login_message', 'brm_login_message');
add_filter('login_headerurl', 'brm_login_logo_url');
add_filter( 'login_headertitle', 'brm_login_logo_url_title' );
add_filter('admin_footer_text', 'brm_admin_footer_text');
add_filter('gettext', 'change_howdy', 10, 3);
add_filter( 'login_message', 'my_private_page_login_message' );
add_filter( 'gettext', 'remove_lostpassword_text' );

function brm_login_logo_css() {
    echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/assets/login.css">';
}

function brm_login_message($message) {
    if ( empty($message) ){
        return "";
    } else {
        return $message;
    }
}

function brm_admin_css() {
    echo '';
}

function brm_login_logo_url(){
    return '/';
}

function brm_login_logo_url_title() {
  return 'Return to the homepage';
}

function brm_admin_footer_text () {
  echo 'Website developed by <a href="http://keymarketinggroup.biz/contact.htm">Key Marketing Group</a>. For support, email <a href="mailto:info@keymarketinggroup.biz">info@keymarketinggroup.biz</a>.';
}

function change_howdy($translated, $text, $domain) {
    if (!is_admin() || 'default' != $domain)
        return $translated;
    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);
    return $translated;
}
function my_private_page_404() {
    $queried_object = get_queried_object();
    if ( isset( $queried_object->post_status ) && 'private' == $queried_object->post_status && !is_user_logged_in() ) {
        wp_safe_redirect( add_query_arg( 'private', '1', wp_login_url( $_SERVER['REQUEST_URI'] ) ) );
        exit;
    }
}
function my_private_page_login_message( $message ) {
    if ( isset( $_REQUEST['private'] ) && $_REQUEST['private'] == 1 )
        $message .= sprintf( '<p class="message">%s</p>', __( 'The page you tried to visit is for Rotarians only. If you are a Rotarian, please log in to continue.' ) );
    return $message;
}
function remove_lostpassword_text ( $text ) {
     if ($text == 'Lost your password?'){$text = '';}
        return $text;
     }

function change_login_footer() {
    echo '<p class="footer-link"><a href="/">Return to the Homepage</a></p>';
}


add_action( 'wp_dashboard_setup', 'register_widgets' );
function register_widgets() {
    global $wp_meta_boxes;
    // $wp_meta_boxes['dashboard']['normal']['core'] = array();
    // $wp_meta_boxes['dashboard']['side']['core'] = array();
    add_meta_box(
        'brm_widget',
        'Website Support',
        'brm_support_display',
        'dashboard',
        'normal',
        'high'
    );
    // add_meta_box(
    //     'brm_maintenance_widget',
    //     'Update Schedule',
    //     'brm_maintenance_display',
    //     'dashboard',
    //     'side',
    //     'high'
    // );
}

function brm_support_display() {
    echo <<<'EOT'
<p><strong>Congratulations</strong> on your new website built by <a href="http://keymarketinggroup.biz/">Key Marketing Group</a>. Your new website comes with <strong>6 months</strong> of technical support, ending on <strong>August 10<sup>th</sup>, 2017</strong>.</p>
<h3 style="font-weight:bold;">Technical Support:</h3>
<ul style="margin-top:0;">
    <li><strong>Email:</strong> <a href="mailto:info@keymarketinggroup.biz">info@keymarketinggroup.biz</a></li>
    <li><strong>Phone:</strong> (657) 235-5230</li>
</ul>
<hr>
<h3 style="font-weight:bold;margin-top:20px;">Content Updates:</h3>
<p>If you need updates to your content or website design, please contact your Key Marketing Group Project Manager:</p>
<ul>
    <li><strong>Project Manager:</strong> Scott Johnson</li>
    <li><strong>Email:</strong> <a href="mailto:scott@keymarketinggroup.biz">scott@keymarketinggroup.biz</a></li>
</ul>
<hr>
<ul>
    <li><strong>Downlaod Website Files:</strong> <a href="#">View Repository</a></li>
</ul>
<hr>
<p style="text-align:center;font-style:italic;">Do you need marketing, social, or SEO help? <a href="mailto:info@keymarketinggroup.biz">Ask us how we can help!</a></p>
EOT;
}

function remove_dashboard_meta() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
add_action('admin_init', 'remove_dashboard_meta');
remove_action( 'welcome_panel', 'wp_welcome_panel' );
