<?php
if(!defined('ABSPATH'))exit;

add_filter('qtranslate_load_admin_page_config','qvc_add_admin_page_config');
function qvc_add_admin_page_config($page_configs)
{
	{
	$page_config = array();
	$page_config['pages'] = array( 'post.php' => '' );

	/**
	 * List of scripts to be executed before "new qTranslateX" in 'qtranslate-x/admin/js/common.js'.
	 * It gives a chance to alter configuration variable qTranslateConfig.
	 * File paths are relative to 'plugins' directory.
	 */
	//$page_config['js-conf'] = array();

	/**
	 * List of scripts to be executed after "new qTranslateX" in 'qtranslate-x/admin/js/common.js'.
	 * It gives a chance to execute additional actions on qTranslateConfig.qtx.
	 * File paths are relative to 'plugins' directory.
	 */
	$page_config['js-exec'] = array();
	$js = &$page_config['js-exec']; // shorthand
	$js[] = array( 'handle' =>'qvc-js-exec', 'src' => dirname(plugin_basename(__FILE__)).'/qvc-admin-post.min.js', 'ver' => QVC_VERSION );

	$page_configs[] = $page_config;
	}

	return $page_configs;
}

function qvc_admin_filters() {
	global $pagenow;
	if($pagenow != 'post.php') return;
	add_filter('vc_frontend_editor_iframe_url', 'qvc_add_query_arg_language');
}
qvc_admin_filters();

function qvc_add_query_arg_language( $link ) {
	$lang = qtranxf_getLanguageEdit();
	//this will switch front-end active language via cookie 'qtrans_front_language', which is kind of ok.
	return add_query_arg( array( 'lang' => $lang ), $link );
}
