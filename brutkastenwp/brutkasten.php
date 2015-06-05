<?php
/**
* Thema
*/
class Theme
{
	public function init($options) {
		
		$this->constants($options);
		
        add_action('after_setup_theme', array(&$this, 'supports'));
		
		$this->functions();
		$this->types();
		$this->plugins();
		$this->shortcodes();
		$this->admin();
	}
	
	
    function types() {
    	// require_once (THEME_TYPES . '/foo.php');  
    }	

	public function plugins() {

			//	
	}

	public function functions() {
		require_once (THEME_HELPERS . '/head.php');		
		require_once (THEME_HELPERS . '/commons.php');		
		// require_once (THEME_HELPERS . '/customTag.php');		
	}	
	
	public function supports() {

			//add_theme_support('post-thumbnails', array('post', 'equipamento', 'page'));
	
			register_nav_menus(array(
				'primary-menu' => 'Menu',
				// 'secondary-menu' => 'Menu Bottom',
			));
			
			add_theme_support('automatic-feed-links');			
			add_theme_support('editor-style');		
	}
	
	public function shortcodes() {

	}

	
	public function admin() {

		if (is_admin()) {
			require_once (THEME_ADMIN . '/admin.php');
			$admin = new Theme_admin();
			$admin->init();
		}else{
			function custom_login_logo() {
			    echo '<style type="text/css">
			    	body {background:url('.THEME_URI.'/assets/banner/logo.png) center top no-repeat #000!important;}
			    	.login #nav a, .login #backtoblog a {color:#fff !important;text-shadow:none !important;}
			    	.login #nav a:hover, .login #backtoblog a:hover {color:#ccc !important;}
			    	#login {margin: 0 0 0 100px;}
			        h1 { display:none; background-image:url('.get_bloginfo('template_directory').'/img/logo.png no-repeat) !important; }
			    </style>';
			}

			add_action('login_head', 'custom_login_logo');			
		}
	}

		public function constants() {
		
        define('THEME_NAME', $options['theme_name']);
        define('THEME_SLUG', $options['theme_slug']);

        define('THEME_DIR', get_template_directory());
        define('THEME_URI', get_template_directory_uri());

        define('THEME_FRAMEWORK', THEME_DIR . '/framework');
        
        define('THEME_HELPERS', THEME_FRAMEWORK . '/functions');
        define('THEME_PLUGINS', THEME_FRAMEWORK . '/plugins');
        define('THEME_TYPES', THEME_FRAMEWORK . '/types');
        define('THEME_WIDGETS', THEME_FRAMEWORK . '/widgets');
        define('THEME_SHORTCODES', THEME_FRAMEWORK . '/shortcodes');

        define('THEME_INCLUDES', THEME_URI . '/includes');
        define('THEME_CACHE_DIR', THEME_DIR . '/cache');
        define('THEME_CACHE_URI', THEME_URI . '/cache');
        define('THEME_IMAGES', THEME_URI . '/images');
        define('THEME_CSS', THEME_URI . '/css');
        define('THEME_JS', THEME_URI . '/js');

        define('THEME_ADMIN', THEME_FRAMEWORK . '/admin');
        define('THEME_ADMIN_TYPES', THEME_ADMIN . '/types');
        define('THEME_ADMIN_AJAX', THEME_ADMIN . '/ajax');
        define('THEME_ADMIN_ASSETS_URI', THEME_URI . '/framework/admin/assets');
        define('THEME_ADMIN_FUNCTIONS', THEME_ADMIN . '/functions');
        define('THEME_ADMIN_OPTIONS', THEME_ADMIN . '/options');
        define('THEME_ADMIN_METABOXES', THEME_ADMIN . '/metaboxes');
        define('THEME_ADMIN_DOCS', THEME_ADMIN . '/docs');       
	}

}
