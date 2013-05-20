<?php
/*
Plugin Name: Mandoo™ Plugin
Plugin URI: https://www.mandoocms.com
Description: Official Mandoo™ plugin. This plugin allows you to integrate some features of your account Mandoo in your Wordpress admin panel for ease of use.
Author: Mandoo Team
Version: 1.0
Author URI: https://www.mandoocms.com
License: GPL2
*/

/*  Copyright 2013  Mandoo  (email : help@mandoocms.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Set up the autoloader.
 */

// set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . '/lib/'));
// spl_autoload_extensions('.class.php');

require_once("lib/mandoo_plugin.class.php");
require_once("lib/mandoo_widget.class.php");
require_once("lib/page_form_list_table.class.php");
require_once("lib/class.DoApi.php");

if (! function_exists('buffered_autoloader')) {
	function buffered_autoloader ($c) {
		try {
			spl_autoload($c);
		} catch (Exception $e) {
			$message = $e->getMessage();
			return $message;
		}
	}
}
spl_autoload_register('buffered_autoloader');

$mandoo_plugin = Mandoo_Plugin::get_instance();
register_deactivation_hook(__FILE__, array(&$mandoo_plugin, 'remove_options'));
?>