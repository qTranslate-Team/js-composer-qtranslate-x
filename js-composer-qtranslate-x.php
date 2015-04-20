<?php
/**
 * Plugin Name: WPBakery Visual Composer & qTranslate-X
 * Plugin URI: https://wordpress.org/plugins/js-composer-qtranslate-x
 * Description: Enables multilingual framework for plugin "WPBakery Visual Composer".
 * Version: 1.0
 * Author: qTranslate Team
 * Author URI: http://qtranslatexteam.wordpress.com/about
 * License: GPL2
 * Tags: multilingual, multi, language, translation, qTranslate-X, WPBakery Visual Composer
 * Author e-mail: qTranslateTeam@gmail.com
 */
if(!defined('ABSPATH'))exit;

define('QVC_VERSION','1.0');

function qvc_init_language($url_info)
{
	if($url_info['doing_front_end']) {
		//nothing needed so far
		//require_once(dirname(__FILE__).'/qvc-front.php');
	}else{
		require_once(dirname(__FILE__).'/qvc-admin.php');
	}
}
add_action('qtranslate_init_language','qvc_init_language');
