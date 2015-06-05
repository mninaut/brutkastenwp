<?php


require "framework/brutkasten.php";

$theme = new Theme();
$theme->init(array(
    'theme_name' => 'brutkasten WP',
    'theme_slug' => 'brutkastenwp'
));

// Retirar admin bar
add_filter( 'show_admin_bar', '__return_false' );

function maist_hide_admin_bar_settings() {
?>
<style type="text/css">
.show-admin-bar {
display: none;
}
</style>
<?php
}



?>
