<?php
/**
 * Open Source Social Network
 *
 * @packageOpen Source Social Network
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
define('__DASHB__', ossn_route()->com . 'dashb/');
/**
 * Initialize Dashb component
 *
 * @return void
 * @access private
 */
function ossn_dashb() {
		ossn_register_page('dashb', 'ossn_dashb_list_pagehandler');
    	$icon = ossn_site_url('components/OssnProfile/images/friends.png');
    	ossn_register_sections_menu('newsfeed', array(
        	'text' => ossn_print('dashb'),
        	'url' => ossn_site_url('dashb'),
        	'section' => 'links',
        	'icon' => $icon
    	));			
}
/**
 * Dashb page handler
 * 
 * @note Please don't call this function directly in your code.
 *
 * @return mixed
 * @access private
 */
function ossn_dashb_list_pagehandler() {
		$layout = 'newsfeed';
		if(!ossn_isLoggedin()) {
			$layout = 'contents';
		}
		$title               = ossn_print('');
		$contents['content'] = ossn_plugin_view('dashb/all');
		$content             = ossn_set_page_layout($layout, $contents);
		echo ossn_view_page($title, $content);
}

//initilize ossn wall
ossn_register_callback('ossn', 'init', 'ossn_dashb');
