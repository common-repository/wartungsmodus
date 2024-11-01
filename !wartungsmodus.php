<?php
/*
Plugin Name: !Wartungsmodus
Plugin URI: http://bueltge.de/wp-wartungsmodus-plugin/101/
Description: New version, however the plugin has been modified with many changes and a new name. Please use the new <a target="_blank" href="http://wordpress.org/extend/plugins/wp-maintenance-mode/">plugin with the same functions</a>.
Author: Frank B&uuml;ltge
Author URI: http://bueltge.de/
Donate URI: http://bueltge.de/wunschliste/
Version: 1.5.6
Last change: 23.02.2010 22:25:14
Licence: GPL
*/


//avoid direct calls to this file, because now WP core and framework has been used
if ( !function_exists('add_action') ) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

if ( !defined('WP_CONTENT_URL') )
	define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_PLUGIN_URL') )
	define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins' );

define( 'FB_WM_BASENAME', plugin_basename(__FILE__) );
define( 'FB_WM_BASEDIR', dirname( plugin_basename(__FILE__) ) );
define( 'FB_WM_TEXTDOMAIN', 'wartungsmodus' );

if ( !class_exists('wartungsmodus') ) {
	class wartungsmodus {
		
		function wartungsmodus() {
			
			if ( is_admin() ) {
				add_action( 'after_plugin_row_' . FB_WM_BASENAME, array(&$this, 'update_notice') );
				load_plugin_textdomain( FB_WM_TEXTDOMAIN, false, FB_WM_BASEDIR );
			}
		}
		
		function update_notice() {
			echo '<tr class="plugin-update-tr"><td class="plugin-update" colspan="3"><div class="update-message">' . __('New version, however the plugin has been modified with many changes and a new name. Please use the <a target="_blank" href="http://wordpress.org/extend/plugins/wp-maintenance-mode/">new plugin</a> with the same functions.', FB_WM_TEXTDOMAIN) . '</div></td></tr>';
		}
	
	}
	
	$wartungsmodus = new wartungsmodus();
}

?>
