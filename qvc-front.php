<?php
if(!defined('ABSPATH'))exit;

function qvc_add_filters_front() {
	$use_filters = array(
	);

	foreach ( $use_filters as $name => $priority ) {
		add_filter( $name, 'qtranxf_useCurrentLanguageIfNotFoundUseDefaultLanguage', $priority );
	}
}
qvc_add_filters_front();
