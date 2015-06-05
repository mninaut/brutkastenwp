<?php
function data($data){

	$d=explode(" ",$data);
	return '<span class="dia">'.$d[0].'</span> <span class="mes">'.substr($d[2],0,3).'</span>';
}




function my_acf_options_page_settings( $settings )
{
    $settings['title'] = 'Global';
    $settings['pages'] = array('Header', 'Sidebar', 'Footer');
 
    return $settings;
}
 
add_filter('acf/options_page/settings', 'my_acf_options_page_settings');



function clear_post_cookie() {
setcookie( 'wp-postpass_' . COOKIEHASH, $_COOKIE[ 'wp-postpass_' . COOKIEHASH ], time()+600, COOKIEPATH );
}

add_action( 'init', clear_post_cookie );


add_action( 'after_setup_theme', 'my_rss_template' );
/**
 * Register custom RSS template.
 */
function my_rss_template() {
    add_feed( 'short', 'my_custom_rss_render' );
}

/**
 * Custom RSS template callback.
 */
function my_custom_rss_render() {
    get_template_part( 'feed', 'short' );
}

//Register OptionPage
// register_options_page('Sobre');
// register_options_page('Casting');
// register_options_page('Parceiros');
// register_options_page('Contato');



// Vou montar meu blog!!!!!

//Remover acento utf 8
function remove_accent($str)
	{
	$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','Ā','ā','Ă','ă','Ą','ą','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č','Ď','ď','Đ','đ','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě','Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ','Ĥ','ĥ','Ħ','ħ','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı','Ĳ','ĳ','Ĵ','ĵ','Ķ','ķ','Ĺ','ĺ','Ļ','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł','Ń','ń','Ņ','ņ','Ň','ň','ŉ','Ō','ō','Ŏ','ŏ','Ő','ő','Œ','œ','Ŕ','ŕ','Ŗ','ŗ','Ř','ř','Ś','ś','Ŝ','ŝ','Ş','ş','Š','š','Ţ','ţ','Ť','ť','Ŧ','ŧ','Ũ','ũ','Ū','ū','Ŭ','ŭ','Ů','ů','Ű','ű','Ų','ų','Ŵ','ŵ','Ŷ','ŷ','Ÿ','Ź','ź','Ż','ż','Ž','ž','ſ','ƒ','Ơ','ơ','Ư','ư','Ǎ','ǎ','Ǐ','ǐ','Ǒ','ǒ','Ǔ','ǔ','Ǖ','ǖ','Ǘ','ǘ','Ǚ','ǚ','Ǜ','ǜ','Ǻ','ǻ','Ǽ','ǽ','Ǿ','ǿ');
	$b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
	return str_replace($a, $b, $str);
	}
//Remover acento e deixar tudo minusculo
	function post_slug($str)
	{
	return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), remove_accent($str)));
	}


function fields_in_feed($content) {  
    if(is_feed()) {  
        $post_id = get_the_ID();  
         
        $output .= '<link>' . get_field("linkMega"). '</link>';  
        $output .= '<imagem>' . get_field("imagem"). '</imagem>';  
        $output .= '<local>' . get_field("local"). '</local>';  
    }  
    return $output;  
}  
add_filter('the_content','fields_in_feed');




// Função dropdown custom taxonomy

function get_terms_dropdown($taxonomies, $args){
    $myterms = get_terms($taxonomies, $args);
    $output ="<select>";
    $output .="<option value=''>Por favor selecione</option>";
    foreach($myterms as $term){
    $root_url = get_bloginfo('url');
    $term_taxonomy=$term->taxonomy;
    $term_slug=$term->slug;
    $term_name =$term->name;
    $link = $term_slug;
    $output .="<option value='".$link."'>".$term_name."</option>";
		    }
		    $output .="</select>";
		return $output;
		}

// Instagram

function stagram_pics($username = '', $num = 4, $tam = 90) {
include_once(ABSPATH.WPINC.'/class-simplepie.php');
$rss = fetch_feed('http://web.stagram.com/rss/n/'.$username.'/');
if (!is_wp_error($rss)) {
    $items = $rss->get_items(0, $num);
    foreach ($items as $item) {
        $url = $item->get_permalink();
        $title = $item->get_title();
        $pic = $item->get_content();
        preg_match_all('/src=[\'"]?([^\'" >]+)[\'" >]/', $pic, $pic_lista);
        $pic = $pic_lista[1][1];
        echo '<li><a href="'.$url.'" target="_blank"><img src="'.$pic.'" title="'.$title.'" width="'.$tam.'" height="'.$tam.'" /></a></li>';
        }
    }
}


?>