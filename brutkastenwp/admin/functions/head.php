<?php
//Adicionar scripts
function theme_admin_add_script() {
	//wp_enqueue_script('theme-script', THEME_ADMIN_ASSETS_URI . '/js/script.js');
}
add_action('admin_init', 'theme_admin_add_script');

//Adicionar estilos
function theme_admin_add_style() {
	wp_enqueue_style('theme-style', THEME_ADMIN_ASSETS_URI . '/css/style.css');
}
add_action('admin_init', 'theme_admin_add_style');

//Remove menus
function theme_admin_del_menus() {
        
    //Remove Links
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'link-manager.php' );
    //remove_menu_page( 'edit.php' );
}

add_action( 'admin_menu', 'theme_admin_del_menus' );

//Alterar rodape
function custom_admin_footer() {
	echo 'powered by: <a href="https://github.com/mninaut/brutkastenwp" target="_blank">BrutkastenWP. <span> v0.1</Span></a>';
}
add_filter('admin_footer_text', 'custom_admin_footer');

//Personalizar dashboard
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;

	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

//Remove widgets padrão
function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

function dashboard_tweaks() {
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'dashboard_tweaks' );

function remove_default_page_screen_metaboxes() {
    remove_meta_box( 'postcustom','page','normal' ); // Custom Fields Metabox
    remove_meta_box( 'postexcerpt','page','normal' ); // Excerpt Metabox
    remove_meta_box( 'commentstatusdiv','page','normal' ); // Comments Metabox
    remove_meta_box( 'trackbacksdiv','page','normal' ); // Talkback Metabox
    remove_meta_box( 'slugdiv','page','normal' ); // Slug Metabox
    remove_meta_box( 'authordiv','page','normal' ); // Author Metabox
}
add_action('admin_menu','remove_default_page_screen_metaboxes');
?>