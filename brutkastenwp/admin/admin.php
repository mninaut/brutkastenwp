<?php 
class Theme_admin {
	function init(){

		$this->functions();
		
		add_action('admin_menu', array(&$this,'menus'));
		add_action('admin_notices',  array(&$this,'warnings'));

		$this->types();
        
		$this->metaboxes();             
		add_action('wp_ajax_theme-flush-rewrite-rules', array(&$this,'flush_rewrite_rules'));
	}
	public function functions() {
		
		require_once(THEME_ADMIN_FUNCTIONS .'/common.php');
		require_once(THEME_ADMIN_FUNCTIONS .'/head.php');
	}
	
	public function menus() {
		
	}
	
	public function warnings() {
		
	}
	
	public function flush_rewrite_rules() {
		
	}
	
	public function types() {
		
	}
	
	public function metaboxes() {
		
	}
}