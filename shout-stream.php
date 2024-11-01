<?php
/*
Plugin Name: Shout Stream
Version: 3.3
Plugin URI: http://deuced.net/shout-stream/
Description: A plugin that Displays FFmp3 flash player OR mini Media Player OR Minicaster flash player for Shoutcast or Icecast Stream at your sidebar or at a page along with LIVE stats and POPUPs windows!
Author: ..::DeUCeD::..
Author URI: http://deuced.net
*/
/*

A plugin that Displays FFmp3 flash player OR mini Media Player OR Minicaster flash player for Shoutcast or Icecast Stream at your sidebar or at a page along with LIVE stats and POPUPs windows! As more feautures are being added i advise that you read all available info at the plugin's page. 

*/
/*	Copyright 2008-2009-2010 ..::DeUCeD::..
	This program is free software; you can redistribute it and/or modify 	it under the terms of the GNU General Public License as published by 	the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
	This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
  You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
/////////////////////////////////////
// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
  define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
  define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
/////////////////////////////////////  
if(function_exists('load_plugin_textdomain'))
  load_plugin_textdomain('test', WP_CONTENT_DIR . '/plugins/test');
/* FUNCTION to put SSCCJS in HEAD */
function addHeaderSSPOPUPJS() {
echo '<!-- call Shout Stream Javascript in HEAD -->'."\n";
  if (function_exists('wp_enqueue_script')) {
      wp_enqueue_script('swfobject', 'http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js', false, '2.2');
      wp_print_scripts('swfobject');
      wp_enqueue_script('shout-stream', WP_CONTENT_URL . '/plugins/shout-stream/ss_popup.js', false, '1.0');
      wp_print_scripts('shout-stream');
                                            }
echo '<!-- done Shout Stream Javascript in HEAD -->'."\n";
                              }
add_action('wp_head', 'addHeaderSSPOPUPJS');
////////////////////////////////////////
function shoutstream_createpage() {
global $ss_ipstream, $ss_portstream, $ss_mountpoint, $ss_streamname, $ss_interval, $ss_text_stat_0, $ss_text_stat_1, $ss_text_stat_2, $ss_text_stat_3, $ss_text_stat_4, $ss_text_stat_5, $ss_text_stat_6, $ss_text_stat_7, $ss_text_stat_8, $ss_text_stat_9, $ss_text_stat_10, $ss_text_stat_11, $ss_text_stat_12, $ss_text_stat_13, $ss_text_stat_14, $ss_text_stat_15, $ss_text_stat_16, $ss_text_stat_17, $ss_name_1, $ss_name_2, $ss_name_3, $ss_name_4, $ss_name_5, $ss_name_6, $ss_name_7, $ss_name_8, $ss_name_9, $ss_ipstream_1, $ss_ipstream_2, $ss_ipstream_3, $ss_ipstream_4, $ss_ipstream_5, $ss_ipstream_6, $ss_ipstream_7, $ss_ipstream_8, $ss_ipstream_9, $ss_portstream_1, $ss_portstream_2, $ss_portstream_3, $ss_portstream_4, $ss_portstream_5, $ss_portstream_6, $ss_portstream_7, $ss_portstream_8, $ss_portstream_9, $ss_mountpoint_1, $ss_mountpoint_2, $ss_mountpoint_3, $ss_mountpoint_4, $ss_mountpoint_5, $ss_mountpoint_6, $ss_mountpoint_7, $ss_mountpoint_8, $ss_mountpoint_9, $ss_page_stats, $ss_stats, $ss_type, $ss_page, $ss_page_div, $ss_heading, $ss_sheading, $ss_media_caster, $ss_auto_play, $ss_mpwidth, $ss_mpheight;;
// shoutcast or icecast? thats experimental
$ss_type = trim(strip_tags(stripslashes(get_option('ss_type'))));
//main stream
$ss_ipstream = trim(strip_tags(stripslashes(get_option('ss_ipstream'))));
$ss_portstream = trim(strip_tags(stripslashes(get_option('ss_portstream'))));
$ss_mountpoint = trim(strip_tags(stripslashes(get_option('ss_mountpoint'))));
$ss_streamname = trim(strip_tags(stripslashes(get_option('ss_streamname'))));
$ss_media_caster = trim(strip_tags(stripslashes(get_option('ss_media_caster'))));
$ss_auto_play = trim(strip_tags(stripslashes(get_option('ss_auto_play'))));
$ss_mpwidth = trim(strip_tags(stripslashes(get_option('ss_mpwidth'))));
$ss_mpheight = trim(strip_tags(stripslashes(get_option('ss_mpheight'))));
// alt streams
$ss_name_1 = trim(strip_tags(stripslashes(get_option('ss_name_1'))));
$ss_name_2 = trim(strip_tags(stripslashes(get_option('ss_name_2'))));
$ss_name_3 = trim(strip_tags(stripslashes(get_option('ss_name_3'))));
$ss_name_4 = trim(strip_tags(stripslashes(get_option('ss_name_4'))));
$ss_name_5 = trim(strip_tags(stripslashes(get_option('ss_name_5'))));
$ss_name_6 = trim(strip_tags(stripslashes(get_option('ss_name_6'))));
$ss_name_7 = trim(strip_tags(stripslashes(get_option('ss_name_7'))));
$ss_name_8 = trim(strip_tags(stripslashes(get_option('ss_name_8'))));
$ss_name_9 = trim(strip_tags(stripslashes(get_option('ss_name_9'))));
$ss_ipstream_1 = trim(strip_tags(stripslashes(get_option('ss_ipstream_1'))));
$ss_ipstream_2 = trim(strip_tags(stripslashes(get_option('ss_ipstream_2'))));
$ss_ipstream_3 = trim(strip_tags(stripslashes(get_option('ss_ipstream_3'))));
$ss_ipstream_4 = trim(strip_tags(stripslashes(get_option('ss_ipstream_4'))));
$ss_ipstream_5 = trim(strip_tags(stripslashes(get_option('ss_ipstream_5'))));
$ss_ipstream_6 = trim(strip_tags(stripslashes(get_option('ss_ipstream_6'))));
$ss_ipstream_7 = trim(strip_tags(stripslashes(get_option('ss_ipstream_7'))));
$ss_ipstream_8 = trim(strip_tags(stripslashes(get_option('ss_ipstream_8'))));
$ss_ipstream_9 = trim(strip_tags(stripslashes(get_option('ss_ipstream_9'))));
$ss_portstream_1 = trim(strip_tags(stripslashes(get_option('ss_portstream_1'))));
$ss_portstream_2 = trim(strip_tags(stripslashes(get_option('ss_portstream_2'))));
$ss_portstream_3 = trim(strip_tags(stripslashes(get_option('ss_portstream_3'))));
$ss_portstream_4 = trim(strip_tags(stripslashes(get_option('ss_portstream_4'))));
$ss_portstream_5 = trim(strip_tags(stripslashes(get_option('ss_portstream_5'))));
$ss_portstream_6 = trim(strip_tags(stripslashes(get_option('ss_portstream_6'))));
$ss_portstream_7 = trim(strip_tags(stripslashes(get_option('ss_portstream_7'))));
$ss_portstream_8 = trim(strip_tags(stripslashes(get_option('ss_portstream_8'))));
$ss_portstream_9 = trim(strip_tags(stripslashes(get_option('ss_portstream_9'))));
$ss_mountpoint_1 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_1'))));
$ss_mountpoint_2 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_2'))));
$ss_mountpoint_3 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_3'))));
$ss_mountpoint_4 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_4'))));
$ss_mountpoint_5 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_5'))));
$ss_mountpoint_6 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_6'))));
$ss_mountpoint_7 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_7'))));
$ss_mountpoint_8 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_8'))));
$ss_mountpoint_9 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_9'))));
// replace spaces with 	&nbsp;
$ss_streamname = preg_replace('/\ /', '&nbsp;', $ss_streamname);
$ss_name_1 = preg_replace('/\ /', '&nbsp;', $ss_name_1);
$ss_name_2 = preg_replace('/\ /', '&nbsp;', $ss_name_2);
$ss_name_3 = preg_replace('/\ /', '&nbsp;', $ss_name_3);
$ss_name_4 = preg_replace('/\ /', '&nbsp;', $ss_name_4);
$ss_name_5 = preg_replace('/\ /', '&nbsp;', $ss_name_5);
$ss_name_6 = preg_replace('/\ /', '&nbsp;', $ss_name_6);
$ss_name_7 = preg_replace('/\ /', '&nbsp;', $ss_name_7);
$ss_name_8 = preg_replace('/\ /', '&nbsp;', $ss_name_8);
$ss_name_9 = preg_replace('/\ /', '&nbsp;', $ss_name_9);
/////////////
$ss_page_stats = trim(strip_tags(stripslashes(get_option('ss_page_stats'))));
$ss_stats = trim(strip_tags(stripslashes(get_option('ss_stats'))));
$ss_interval = trim(strip_tags(stripslashes(get_option('ss_interval'))));
// DO SECONDS
if ($ss_interval=="")         { $ss_interval = 0; } 
else if ($ss_interval <= 30)  { $ss_interval = 30000; }
else if ($ss_interval > 30)   { $ss_interval = (intval($ss_interval) * 1000); }
else                          { $ss_interval = 0; }
// text messages
$ss_text_stat_0 = trim(strip_tags(stripslashes(get_option('ss_text_stat_0'))));
$ss_text_stat_1 = trim(strip_tags(stripslashes(get_option('ss_text_stat_1'))));
$ss_text_stat_2 = trim(strip_tags(stripslashes(get_option('ss_text_stat_2'))));
$ss_text_stat_3 = trim(strip_tags(stripslashes(get_option('ss_text_stat_3'))));
$ss_text_stat_4 = trim(strip_tags(stripslashes(get_option('ss_text_stat_4'))));
$ss_text_stat_5 = trim(strip_tags(stripslashes(get_option('ss_text_stat_5'))));
$ss_text_stat_6 = trim(strip_tags(stripslashes(get_option('ss_text_stat_6'))));
$ss_text_stat_7 = trim(strip_tags(stripslashes(get_option('ss_text_stat_7'))));
$ss_text_stat_8 = trim(strip_tags(stripslashes(get_option('ss_text_stat_8'))));
$ss_text_stat_9 = trim(strip_tags(stripslashes(get_option('ss_text_stat_9'))));
$ss_text_stat_10 = trim(strip_tags(stripslashes(get_option('ss_text_stat_10'))));
$ss_text_stat_11 = trim(strip_tags(stripslashes(get_option('ss_text_stat_11'))));
$ss_text_stat_12 = trim(strip_tags(stripslashes(get_option('ss_text_stat_12'))));
$ss_text_stat_13 = trim(strip_tags(stripslashes(get_option('ss_text_stat_13'))));
$ss_text_stat_14 = trim(strip_tags(stripslashes(get_option('ss_text_stat_14'))));
$ss_text_stat_15 = trim(strip_tags(stripslashes(get_option('ss_text_stat_15'))));
$ss_text_stat_16 = trim(strip_tags(stripslashes(get_option('ss_text_stat_16'))));
$ss_text_stat_17 = trim(strip_tags(stripslashes(get_option('ss_text_stat_17'))));
$ss_page_div = trim(strip_tags(stripslashes(get_option('ss_page_div'))));
$ss_heading = trim(strip_tags(stripslashes(get_option('ss_heading'))));
// Check if Shout Stream separate page has been declared
$SS_page_self = 'http://'.($_SERVER['HTTP_HOST']).($_SERVER['REQUEST_URI']); 
$ss_page = trim(strip_tags(stripslashes(get_option('ss_page'))));
$ss_usage = trim(strip_tags(stripslashes(get_option('ss_usage'))));
if (($SS_page_self != $ss_page) || ($ss_usage < 1 )) { $shoutstream_left_elements = SS_error(); }
else {
// OK now let Shout Stream be on that page 
$shoutstream_left_elements = '<div id="ShoutStream" style="' . $ss_page_div . '">';
////////////////////////////////////////
if ($ss_media_caster != 0) {
// PLAYER CODE below
// IF WE *DO* WANT FFmp3 as a global player 
if ($ss_media_caster > 2) { 
$ss_media_caster = 6;
$shoutstream_left_elements .= '<span style="border: 0px solid #cc0000; text-align: left; padding-left: 10px; padding-right: 0px; padding-top: 20px; padding-bottom: 10px; display: inline-block;">';
$shoutstream_left_elements .=  SS_ffmp3(); 
                          }
// IF WE *DONT* WANT FFmp3 as a global player
else                      {
// CHECK IF MSIE
$ss_detect = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
if ((strpos($ss_detect, 'MSIE')) > 1 )    { $ss_detect = 1;} else { $ss_detect = 0; }
If (($ss_detect == 1) || ($ss_media_caster == 1)) { 
$shoutstream_left_elements .= '<span style="border: 0px solid #cc0000; text-align: left; padding-left: 20px; padding-right: 0px; padding-top: 20px; padding-bottom: 10px; display: inline-block;">';
$shoutstream_left_elements .= SS_mediaplayer();
                                                  }
else if ($ss_media_caster == 2) { 
$minipoint = WP_CONTENT_URL;
$minipoint = preg_replace ('#\b:(|\b)#u', '%3A', $minipoint);
$minicasterurl = ($ss_ipstream . '@' . $ss_portstream . '@' . $ss_streamname . '@' . $ss_auto_play);
$shoutstream_left_elements .= '<span style="border: 0px solid #cc0000; text-align: left; padding-left: 20px; padding-right: 0px; padding-top: 20px; padding-bottom: 10px; display: inline-block;">';
$shoutstream_left_elements .= SS_minicaster();
                                }
                          }
$shoutstream_left_elements .= '</span>';
                          }
////////////////////////////////////////
// Page Statistics
if ($ss_page_stats == 1) {
$shoutstream_left_elements .= '<ul id="ssUPdate">';
if ($ss_stats == 0 && $ss_type == 0)        { $shoutstream_left_elements .= SS_curl_history(); }
else if ($ss_stats == 1 && $ss_type == 0)   { $shoutstream_left_elements .= SS_fsock(); }
else if ($ss_stats == 0 && $ss_type == 1)   { $shoutstream_left_elements .= SS_ice_curl(); }
else                                        { $shoutstream_left_elements .= SS_error(); }
$shoutstream_left_elements .= '</ul>';
// Live Update cURL @ PAGE
if ($ss_interval > 29999 && $ss_stats == 0 && $ss_type == 0)            {
$SS_refresh_page = '<script type="text/javascript">';
$SS_refresh_page .= 'function SSget_curl() { ssajaxpage(\'' . WP_CONTENT_URL . '/plugins/shout-stream/stats-curl-page.php?ss_ipstream=' . $ss_ipstream . '&ss_portstream=' . $ss_portstream . '&ss_text_stat_0=' . $ss_text_stat_0 . '&ss_text_stat_1=' . $ss_text_stat_1 . '&ss_text_stat_2=' . $ss_text_stat_2 . '&ss_text_stat_3=' . $ss_text_stat_3 . '&ss_text_stat_4=' . $ss_text_stat_4 . '&ss_text_stat_5=' . $ss_text_stat_5 . '&ss_text_stat_6=' . $ss_text_stat_6 . '&ss_text_stat_7=' . $ss_text_stat_7 . '&ss_text_stat_8=' . $ss_text_stat_8 . '&ss_text_stat_9=' . $ss_text_stat_9 . '&ss_text_stat_12=' . $ss_text_stat_12 . '&ss_text_stat_15=' . $ss_text_stat_15 . '&ss_heading=' . $ss_heading . '\', \'ssUPdate\'); }';
$SS_refresh_page .= 'setInterval(\'SSget_curl()\', ' . $ss_interval . ');';
$SS_refresh_page .= '</script>';
$shoutstream_left_elements .= $SS_refresh_page;
                                                                        }
// Live Update ICE cURL @ PAGE
else if ($ss_interval > 29999 && $ss_stats == 0 && $ss_type == 1)       {
$SS_refresh_page = '<script type="text/javascript">';
$SS_refresh_page .= 'function SSget_icecurl() { ssajaxpage(\'' . WP_CONTENT_URL . '/plugins/shout-stream/stats-icecurl-page.php?ss_ipstream=' . $ss_ipstream . '&ss_portstream=' . $ss_portstream . '&ss_streamname=' . $ss_streamname . '&ss_mountpoint=' . $ss_mountpoint . '&ss_text_stat_0=' . $ss_text_stat_0 . '&ss_text_stat_1=' . $ss_text_stat_1 . '&ss_text_stat_2=' . $ss_text_stat_2 . '&ss_text_stat_3=' . $ss_text_stat_3 . '&ss_text_stat_4=' . $ss_text_stat_4 . '&ss_text_stat_5=' . $ss_text_stat_5 . '&ss_text_stat_6=' . $ss_text_stat_6 . '&ss_text_stat_7=' . $ss_text_stat_7 . '&ss_text_stat_8=' . $ss_text_stat_8 . '&ss_text_stat_9=' . $ss_text_stat_9 . '&ss_text_stat_12=' . $ss_text_stat_12 . '&ss_text_stat_13=' . $ss_text_stat_13 . '&ss_heading=' . $ss_heading . '\', \'ssUPdate\'); }';
$SS_refresh_page .= 'setInterval(\'SSget_icecurl()\', ' . $ss_interval . ');';
$SS_refresh_page .= '</script>';
$shoutstream_left_elements .= $SS_refresh_page;
                                                                        }                                           
// Live update fsocket @ PAGE
else if ($ss_interval > 29999 && $ss_stats == 1 && $ss_type == 0)       {
$SS_refresh_page = '<script type="text/javascript">';
$SS_refresh_page .= 'function SSget_fsock() { ssajaxpage(\'' . WP_CONTENT_URL . '/plugins/shout-stream/stats-fsock-page.php?ss_ipstream=' . $ss_ipstream . '&ss_portstream=' . $ss_portstream . '&ss_streamname=' . $ss_streamname . '&ss_mountpoint=' . $ss_mountpoint . '&ss_text_stat_0=' . $ss_text_stat_0 . '&ss_text_stat_1=' . $ss_text_stat_1 . '&ss_text_stat_2=' . $ss_text_stat_2 . '&ss_text_stat_3=' . $ss_text_stat_3 . '&ss_text_stat_4=' . $ss_text_stat_4 . '&ss_text_stat_5=' . $ss_text_stat_5 . '&ss_text_stat_6=' . $ss_text_stat_6 . '&ss_text_stat_7=' . $ss_text_stat_7 . '&ss_text_stat_8=' . $ss_text_stat_8 . '&ss_text_stat_9=' . $ss_text_stat_9 . '&ss_heading=' . $ss_heading . '\', \'ssUPdate\'); }';
$SS_refresh_page .= 'setInterval(\'SSget_fsock()\', ' . $ss_interval . ');';
$SS_refresh_page .= '</script>';
$shoutstream_left_elements .= $SS_refresh_page;
                                                                        }
                      }
$shoutstream_left_elements .= '</div>';
//////////////////////////////////////// 
$shoutstream_right_elements = '<span style="border: 0px solid #cc0000; padding-top: 0; float:right; overflow: hidden;">';
$shoutstream_right_elements .= '<ul>';
$shoutstream_right_elements .= SS_text_links();
$shoutstream_right_elements .= '</ul>';
$shoutstream_right_elements .= '</span>';
//////////////////////////////////////// 
// ending elements that will be displayed
}
// return everything in page...
          return $shoutstream_right_elements . $shoutstream_left_elements;
}
add_shortcode('shout-stream-page', 'shoutstream_createpage');
////////////////////////////////////////
///////////// ACTIONS //////////////////
### Function: Page Navigation Option Menu
add_action('admin_menu', 'shout_stream_options');
function shout_stream_options() {
	if (function_exists('add_options_page')) {
		add_options_page(__('Shout Stream', 'shout-stream'), __('Shout Stream', 'shout-stream'), 'manage_options', 'shout-stream/shout-stream-options.php') ;
                                           }
                                }
// Load The shout-stream Widget
add_action('plugins_loaded', 'widget_shout_stream_init');
///////////// ACTIONS //////////////////
////////////////////////////////////////
// BELOW is the WIDGET that will be used 
function widget_shout_stream_init() {
// Check for the required API functions
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
  return;
//  main widget function
	function widget_shout_stream($args) {
//  get my options
global $ss_ipstream, $ss_portstream, $ss_mountpoint, $ss_streamname, $ss_interval, $ss_text_stat_0, $ss_text_stat_1, $ss_text_stat_2, $ss_text_stat_3, $ss_text_stat_4, $ss_text_stat_5, $ss_text_stat_6, $ss_text_stat_7, $ss_text_stat_8, $ss_text_stat_9, $ss_text_stat_10, $ss_text_stat_11, $ss_text_stat_12, $ss_text_stat_13, $ss_text_stat_14, $ss_text_stat_15, $ss_text_stat_16, $ss_text_stat_17, $ss_name_1, $ss_name_2, $ss_name_3, $ss_name_4, $ss_name_5, $ss_name_6, $ss_name_7, $ss_name_8, $ss_name_9, $ss_ipstream_1, $ss_ipstream_2, $ss_ipstream_3, $ss_ipstream_4, $ss_ipstream_5, $ss_ipstream_6, $ss_ipstream_7, $ss_ipstream_8, $ss_ipstream_9, $ss_portstream_1, $ss_portstream_2, $ss_portstream_3, $ss_portstream_4, $ss_portstream_5, $ss_portstream_6, $ss_portstream_7, $ss_portstream_8, $ss_portstream_9, $ss_mountpoint_1, $ss_mountpoint_2, $ss_mountpoint_3, $ss_mountpoint_4, $ss_mountpoint_5, $ss_mountpoint_6, $ss_mountpoint_7, $ss_mountpoint_8, $ss_mountpoint_9, $ss_side_stats, $ss_stats, $ss_type, $ss_page, $ss_usage, $ss_page_div, $ss_heading, $ss_sheading, $ss_player_center, $ss_media_caster, $ss_auto_play, $ss_mpwidth, $ss_mpheight;
		extract($args);
		$options = get_option('widget_shout_stream');
		$title = $options['title'];
		$ss_widget_text = $options['ss_widget_text'];
		$ss_widget_img = $options['ss_widget_img'];
		$ss_widget_link = $options['ss_widget_link'];
if ($title=="")         { $title = 'Shout Stream'; }
// Check if Shout Stream separate page has been declared
$SS_page_self = 'http://'.($_SERVER['HTTP_HOST']).($_SERVER['REQUEST_URI']); 
$ss_page = trim(strip_tags(stripslashes(get_option('ss_page'))));
if ($SS_page_self != $ss_page)
{
// start the widget	& Display Title
		echo $before_widget . $before_title . $title . $after_title;
$ss_usage = trim(strip_tags(stripslashes(get_option('ss_usage'))));
if ($ss_usage == 1) { echo SS_error(); } 
else {
// variables from options
// shoutcast or icecast? thats experimental
$ss_type = trim(strip_tags(stripslashes(get_option('ss_type'))));
//main stream
$ss_ipstream = trim(strip_tags(stripslashes(get_option('ss_ipstream'))));
$ss_portstream = trim(strip_tags(stripslashes(get_option('ss_portstream'))));
$ss_mountpoint = trim(strip_tags(stripslashes(get_option('ss_mountpoint'))));
$ss_streamname = trim(strip_tags(stripslashes(get_option('ss_streamname'))));
$ss_media_caster = trim(strip_tags(stripslashes(get_option('ss_media_caster'))));
$ss_auto_play = trim(strip_tags(stripslashes(get_option('ss_auto_play'))));
$ss_mpwidth = trim(strip_tags(stripslashes(get_option('ss_mpwidth'))));
$ss_mpheight = trim(strip_tags(stripslashes(get_option('ss_mpheight'))));
// alt streams
$ss_name_1 = trim(strip_tags(stripslashes(get_option('ss_name_1'))));
$ss_name_2 = trim(strip_tags(stripslashes(get_option('ss_name_2'))));
$ss_name_3 = trim(strip_tags(stripslashes(get_option('ss_name_3'))));
$ss_name_4 = trim(strip_tags(stripslashes(get_option('ss_name_4'))));
$ss_name_5 = trim(strip_tags(stripslashes(get_option('ss_name_5'))));
$ss_name_6 = trim(strip_tags(stripslashes(get_option('ss_name_6'))));
$ss_name_7 = trim(strip_tags(stripslashes(get_option('ss_name_7'))));
$ss_name_8 = trim(strip_tags(stripslashes(get_option('ss_name_8'))));
$ss_name_9 = trim(strip_tags(stripslashes(get_option('ss_name_9'))));
$ss_ipstream_1 = trim(strip_tags(stripslashes(get_option('ss_ipstream_1'))));
$ss_ipstream_2 = trim(strip_tags(stripslashes(get_option('ss_ipstream_2'))));
$ss_ipstream_3 = trim(strip_tags(stripslashes(get_option('ss_ipstream_3'))));
$ss_ipstream_4 = trim(strip_tags(stripslashes(get_option('ss_ipstream_4'))));
$ss_ipstream_5 = trim(strip_tags(stripslashes(get_option('ss_ipstream_5'))));
$ss_ipstream_6 = trim(strip_tags(stripslashes(get_option('ss_ipstream_6'))));
$ss_ipstream_7 = trim(strip_tags(stripslashes(get_option('ss_ipstream_7'))));
$ss_ipstream_8 = trim(strip_tags(stripslashes(get_option('ss_ipstream_8'))));
$ss_ipstream_9 = trim(strip_tags(stripslashes(get_option('ss_ipstream_9'))));
$ss_portstream_1 = trim(strip_tags(stripslashes(get_option('ss_portstream_1'))));
$ss_portstream_2 = trim(strip_tags(stripslashes(get_option('ss_portstream_2'))));
$ss_portstream_3 = trim(strip_tags(stripslashes(get_option('ss_portstream_3'))));
$ss_portstream_4 = trim(strip_tags(stripslashes(get_option('ss_portstream_4'))));
$ss_portstream_5 = trim(strip_tags(stripslashes(get_option('ss_portstream_5'))));
$ss_portstream_6 = trim(strip_tags(stripslashes(get_option('ss_portstream_6'))));
$ss_portstream_7 = trim(strip_tags(stripslashes(get_option('ss_portstream_7'))));
$ss_portstream_8 = trim(strip_tags(stripslashes(get_option('ss_portstream_8'))));
$ss_portstream_9 = trim(strip_tags(stripslashes(get_option('ss_portstream_9'))));
$ss_mountpoint_1 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_1'))));
$ss_mountpoint_2 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_2'))));
$ss_mountpoint_3 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_3'))));
$ss_mountpoint_4 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_4'))));
$ss_mountpoint_5 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_5'))));
$ss_mountpoint_6 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_6'))));
$ss_mountpoint_7 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_7'))));
$ss_mountpoint_8 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_8'))));
$ss_mountpoint_9 = trim(strip_tags(stripslashes(get_option('ss_mountpoint_9'))));
// replace spaces with 	&nbsp;
$ss_streamname = preg_replace('/\ /', '&nbsp;', $ss_streamname);
$ss_name_1 = preg_replace('/\ /', '&nbsp;', $ss_name_1);
$ss_name_2 = preg_replace('/\ /', '&nbsp;', $ss_name_2);
$ss_name_3 = preg_replace('/\ /', '&nbsp;', $ss_name_3);
$ss_name_4 = preg_replace('/\ /', '&nbsp;', $ss_name_4);
$ss_name_5 = preg_replace('/\ /', '&nbsp;', $ss_name_5);
$ss_name_6 = preg_replace('/\ /', '&nbsp;', $ss_name_6);
$ss_name_7 = preg_replace('/\ /', '&nbsp;', $ss_name_7);
$ss_name_8 = preg_replace('/\ /', '&nbsp;', $ss_name_8);
$ss_name_9 = preg_replace('/\ /', '&nbsp;', $ss_name_9);
$ss_side_stats = trim(strip_tags(stripslashes(get_option('ss_side_stats'))));
$ss_stats = trim(strip_tags(stripslashes(get_option('ss_stats'))));
$ss_interval = trim(strip_tags(stripslashes(get_option('ss_interval'))));
// DO SECONDS
if ($ss_interval=="") { $ss_interval = 0; } 
else if ($ss_interval <= 30) { $ss_interval = 30000; }
else if ($ss_interval > 30) { $ss_interval = (intval($ss_interval) * 1000); }
else { $ss_interval = 0; }
// text messages
$ss_text_stat_0 = trim(strip_tags(stripslashes(get_option('ss_text_stat_0'))));
$ss_text_stat_1 = trim(strip_tags(stripslashes(get_option('ss_text_stat_1'))));
$ss_text_stat_2 = trim(strip_tags(stripslashes(get_option('ss_text_stat_2'))));
$ss_text_stat_3 = trim(strip_tags(stripslashes(get_option('ss_text_stat_3'))));
$ss_text_stat_4 = trim(strip_tags(stripslashes(get_option('ss_text_stat_4'))));
$ss_text_stat_5 = trim(strip_tags(stripslashes(get_option('ss_text_stat_5'))));
$ss_text_stat_6 = trim(strip_tags(stripslashes(get_option('ss_text_stat_6'))));
$ss_text_stat_7 = trim(strip_tags(stripslashes(get_option('ss_text_stat_7'))));
$ss_text_stat_8 = trim(strip_tags(stripslashes(get_option('ss_text_stat_8'))));
$ss_text_stat_9 = trim(strip_tags(stripslashes(get_option('ss_text_stat_9'))));
$ss_text_stat_10 = trim(strip_tags(stripslashes(get_option('ss_text_stat_10'))));
$ss_text_stat_11 = trim(strip_tags(stripslashes(get_option('ss_text_stat_11'))));
$ss_text_stat_12 = trim(strip_tags(stripslashes(get_option('ss_text_stat_12'))));
$ss_text_stat_13 = trim(strip_tags(stripslashes(get_option('ss_text_stat_13'))));
$ss_text_stat_14 = trim(strip_tags(stripslashes(get_option('ss_text_stat_14'))));
$ss_text_stat_15 = trim(strip_tags(stripslashes(get_option('ss_text_stat_15'))));
$ss_text_stat_16 = trim(strip_tags(stripslashes(get_option('ss_text_stat_16'))));
$ss_text_stat_17 = trim(strip_tags(stripslashes(get_option('ss_text_stat_17'))));
$ss_page_div = trim(strip_tags(stripslashes(get_option('ss_page_div'))));
$ss_heading = trim(strip_tags(stripslashes(get_option('ss_heading'))));
$ss_sheading = trim(strip_tags(stripslashes(get_option('ss_sheading'))));
$ss_player_center = trim(strip_tags(stripslashes(get_option('ss_player_center'))));
if ($ss_player_center == 0) { $ss_player_center = 'left';}
else if ($ss_player_center == 2) { $ss_player_center = 'right';}
else { $ss_player_center = 'center'; }
// variables from options
// draw widget
// IF WE *DO* WANT FFmp3 as a global player 
if ($ss_media_caster > 2) { 
      echo SS_ffmp3(); 
                          }
// IF WE *DONT* WANT FFmp3 as a global player
else                      {
////////////////////////////////////////
// CHECK IF MSIE
$ss_detect = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
//echo $ss_detect;
if ((strpos($ss_detect, 'MSIE')) > 1 ) { $ss_detect = 1; } else { $ss_detect = 0; }
// If not MSIE and wanna Minicaster there it is...
if ($ss_detect == 0 && $ss_media_caster == 2) { 
      echo '<div style="text-align: ' . $ss_player_center . ';">';
      echo SS_minicaster(); 
      echo '</div>';
                                              }
// If we want MediaPlayer for MSIE or don't wanna Minicaster...
else if ($ss_detect == 1 || $ss_media_caster == 1) { 
      echo '<div style="text-align: ' . $ss_player_center . ';">';
      echo SS_mediaplayer(); 
      echo '</div>';
                                                    }
                          }
// POPUPS
$stream_mumber = 1;
if ($ss_name_1!='' && $ss_ipstream_1!='' && $ss_portstream_1!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_2!='' && $ss_ipstream_2!='' && $ss_portstream_2!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_3!='' && $ss_ipstream_3!='' && $ss_portstream_3!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_4!='' && $ss_ipstream_4!='' && $ss_portstream_4!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_5!='' && $ss_ipstream_5!='' && $ss_portstream_5!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_6!='' && $ss_ipstream_6!='' && $ss_portstream_6!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_7!='' && $ss_ipstream_7!='' && $ss_portstream_7!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_8!='' && $ss_ipstream_8!='' && $ss_portstream_8!='') {$stream_mumber = ($stream_mumber + 1);}
if ($ss_name_9!='' && $ss_ipstream_9!='' && $ss_portstream_9!='') {$stream_mumber = ($stream_mumber + 1);}
if ($stream_mumber > 1) { 
echo '<' . $ss_sheading . ' style="padding-top:5px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_13 . ' <strong>' . $stream_mumber . '</strong></' . $ss_sheading . '>';  
                        }
echo '<ul style="padding-top:5px;">';
echo SS_text_links();
echo '</ul>';
// Sidebar Statistics
if ($ss_side_stats == 1) {
echo '<' . $ss_sheading . ' style="padding:10px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_14 . ' ' . $ss_streamname . '</' . $ss_sheading . '>';
echo '<ul id="ssUPdate" style="padding-top:5px;">';
if ($ss_stats == 0 && $ss_type == 0)      { echo SS_curl(); }
else if ($ss_stats == 1 && $ss_type == 0) { echo SS_fsock(); }
else if ($ss_stats == 0 && $ss_type == 1) { echo SS_ice_curl(); }
else                                      { echo SS_error(); }
echo '</ul>';
// Live Update cURL @ SIDEBAR
if ($ss_interval > 29999 && $ss_stats == 0 && $ss_type == 0)       {
echo '<script type="text/javascript">';
echo 'function SSget_curl() { ssajaxpage(\'' . WP_CONTENT_URL . '/plugins/shout-stream/stats-curl-side.php?ss_ipstream=' . $ss_ipstream . '&ss_portstream=' . $ss_portstream . '&ss_page=' . $ss_page . '&ss_sheading=' . $ss_sheading . '&ss_player_center=' . $ss_player_center . '&ss_stats=' . $ss_stats . '&ss_text_stat_0=' . $ss_text_stat_0 . '&ss_text_stat_1=' . $ss_text_stat_1 . '&ss_text_stat_2=' . $ss_text_stat_2 . '&ss_text_stat_3=' . $ss_text_stat_3 . '&ss_text_stat_4=' . $ss_text_stat_4 . '&ss_text_stat_5=' . $ss_text_stat_5 . '&ss_text_stat_6=' . $ss_text_stat_6 . '&ss_text_stat_7=' . $ss_text_stat_7 . '&ss_text_stat_8=' . $ss_text_stat_8 . '&ss_text_stat_9=' . $ss_text_stat_9 . '&ss_text_stat_12=' . $ss_text_stat_12 . '&ss_text_stat_14=' . $ss_text_stat_14 . '&ss_text_stat_16=' . $ss_text_stat_16 . '\', \'ssUPdate\'); }';
echo 'setInterval(\'SSget_curl()\', ' . $ss_interval . ');';
echo '</script>';
                                                                    }
// Live Update ICE cURL @ SIDEBAR
else if ($ss_interval > 29999 && $ss_stats == 0 && $ss_type == 1)   {
echo  '<script type="text/javascript">';
echo  'function SSget_icecurl() { ssajaxpage(\'' . WP_CONTENT_URL . '/plugins/shout-stream/stats-icecurl-side.php?ss_ipstream=' . $ss_ipstream . '&ss_portstream=' . $ss_portstream . '&ss_streamname=' . $ss_streamname . '&ss_mountpoint=' . $ss_mountpoint . '&ss_text_stat_0=' . $ss_text_stat_0 . '&ss_text_stat_1=' . $ss_text_stat_1 . '&ss_text_stat_2=' . $ss_text_stat_2 . '&ss_text_stat_3=' . $ss_text_stat_3 . '&ss_text_stat_4=' . $ss_text_stat_4 . '&ss_text_stat_5=' . $ss_text_stat_5 . '&ss_text_stat_6=' . $ss_text_stat_6 . '&ss_text_stat_7=' . $ss_text_stat_7 . '&ss_text_stat_8=' . $ss_text_stat_8 . '&ss_text_stat_9=' . $ss_text_stat_9 . '&ss_text_stat_12=' . $ss_text_stat_12 . '&ss_text_stat_16=' . $ss_text_stat_16 . '&ss_page=' . $ss_page  . '&ss_sheading=' . $ss_sheading  . '&ss_player_center=' . $ss_player_center . '\', \'ssUPdate\'); }';
echo  'setInterval(\'SSget_icecurl()\', ' . $ss_interval . ');';
echo  '</script>';
                                                                    }                          
// Live update fsocket @ SIDEBAR
else if ($ss_interval > 29999 && $ss_stats == 1 && $ss_type == 0)   {
echo '<script type="text/javascript">';
echo 'function SSget_fsock() { ssajaxpage(\'' . WP_CONTENT_URL . '/plugins/shout-stream/stats-fsock-side.php?ss_ipstream=' . $ss_ipstream . '&ss_portstream=' . $ss_portstream . '&ss_text_stat_0=' . $ss_text_stat_0 . '&ss_text_stat_1=' . $ss_text_stat_1 . '&ss_text_stat_2=' . $ss_text_stat_2 . '&ss_text_stat_3=' . $ss_text_stat_3 . '&ss_text_stat_4=' . $ss_text_stat_4 . '&ss_text_stat_5=' . $ss_text_stat_5 . '&ss_text_stat_6=' . $ss_text_stat_6 . '&ss_text_stat_7=' . $ss_text_stat_7 . '&ss_text_stat_8=' . $ss_text_stat_8 . '&ss_text_stat_9=' . $ss_text_stat_9  . '&ss_text_stat_16=' . $ss_text_stat_16 . '&ss_page=' . $ss_page .  '&ss_sheading=' . $ss_sheading . '&ss_player_center=' . $ss_player_center . '\', \'ssUPdate\'); }';
echo 'setInterval(\'SSget_fsock()\', ' . $ss_interval . ');';
echo '</script>';
                                                                    }
}
////////////////////////////////////////
if ($ss_widget_img != '')   { 
echo '<p style="padding: 5px 0px 5px 0px; text-align: ' . $ss_player_center . ';">';
echo '<a href="' . $ss_widget_link . '"><img src="' . $ss_widget_img . '" alt="' . $ss_streamname . '" title="' . $ss_streamname . '"></a>'; 
echo '</p>';
                            }
if ($ss_widget_text != '')  { 
echo '<p style="padding: 0;">';
echo $ss_widget_text; 
echo '</p>';
                            }
////////////////////////////////////////
}
////////////////////////////////////////
		echo $after_widget;
}
    }
////////////////////////////////////////
// control panel
	function widget_shout_stream_control() {
		$options = $newoptions = get_option('widget_shout_stream');
		if ( $_POST["shout-stream-submit"] ) {
			$newoptions['title'] = trim(strip_tags(stripslashes($_POST["shout-stream-title"])));
			$newoptions['ss_widget_text'] = trim(stripslashes($_POST["shout-stream-ss_widget_text"]));
			$newoptions['ss_widget_img'] = trim(strip_tags(stripslashes($_POST["shout-stream-ss_widget_img"])));
			$newoptions['ss_widget_link'] = trim(strip_tags(stripslashes($_POST["shout-stream-ss_widget_link"])));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_shout_stream', $options);
		}
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$ss_widget_text = htmlspecialchars($options['ss_widget_text'], ENT_QUOTES);
		$ss_widget_img = htmlspecialchars($options['ss_widget_img'], ENT_QUOTES);
		$ss_widget_link = htmlspecialchars($options['ss_widget_link'], ENT_QUOTES);
	?>
		<div style="text-align: left;">
		<label for="shout-stream-title">Give the widget a title </label>
		<input style="width: 240px;" id="shout-stream-title" name="shout-stream-title" type="text" value="<?php echo $title; ?>" />
		</div>
		<div style="text-align: left;">
		<label for="shout-stream-ss_widget_text">Place any text here</label>
		<input style="width: 240px;" id="shout-stream-ss_widget_text" name="shout-stream-ss_widget_text" type="text" value="<?php echo $ss_widget_text; ?>" />
		</div>
		<div style="text-align: left;">
		<label for="shout-stream-ss_widget_img">Place URL of an image</label>
		<input style="width: 240px;" id="shout-stream-ss_widget_img" name="shout-stream-ss_widget_img" type="text" value="<?php echo $ss_widget_img; ?>" />
		</div>
		<div style="text-align: left;">
		<label for="shout-stream-ss_widget_link">Place any link for the image</label>
		<input style="width: 240px;" id="shout-stream-ss_widget_link" name="shout-stream-ss_widget_link" type="text" value="<?php echo $ss_widget_link; ?>" />
		</div>
		<input type="hidden" id="shout-stream-submit" name="shout-stream-submit" value="1" />
	<?php
                                          } 
// Register Widgets
	register_sidebar_widget('Shout Stream', 'widget_shout_stream');
	register_widget_control('Shout Stream', 'widget_shout_stream_control', 240, 400);
}
// ABOVE is the WIDGET that was used 
////////////////////////////////////////
// BELOW are the functions that will be used 
////////////////////////////////////////
// FFmp3 function starts
function SS_ffmp3() {
global $ss_ipstream, $ss_portstream, $ss_streamname, $ss_mountpoint, $ss_media_caster, $ss_auto_play, $ss_mpwidth, $ss_mpheight, $ss_player_center;
// fix ffmp3 title spaces
$ss_ffmp3title = preg_replace('/\&nbsp;/', '%20', $ss_streamname);
if ($ss_mountpoint == '') { $ss_mountpoint = ';';}
if ($ss_media_caster == 3) { $ffmp3_ID = 'tinyffmp3'; $ffmp3_W = 130; $ffmp3_H = 60; }
elseif ($ss_media_caster == 4) { $ffmp3_ID = 'smallffmp3'; $ffmp3_W = 140; $ffmp3_H = 80; }
elseif ($ss_media_caster == 5) { $ffmp3_ID = 'mediumffmp3'; $ffmp3_W = 180; $ffmp3_H = 80; }
elseif ($ss_media_caster == 6) { $ffmp3_ID = 'longffmp3'; $ffmp3_W = 240; $ffmp3_H = 60; }
elseif  ($ss_media_caster == 7) { $ffmp3_ID = 'customffmp3'; $ffmp3_W = $ss_mpwidth; $ffmp3_H = $ss_mpheight; }
// fix for align sidebar player
$ss_px_h = 'px';
if ( $ss_mpwidth < $ffmp3_W && $ss_media_caster != 7) { $ss_mpwidth = '100'; $ss_px_h = '%'; } 
if ( $ss_mpheight < $ffmp3_H && $ss_media_caster != 7) { $ss_mpheight = $ffmp3_H; }
if ( $ss_auto_play == 1 ) { $ss_autoplay = '&autoplay'; } else { $ss_autoplay = ''; }
$SS_ffmp3 = '<div id="player" style="border: 0px solid #cc0000; padding: 0; width: ' . $ss_mpwidth . $ss_px_h .'; height: ' . $ss_mpheight . 'px; background-color: transparent; text-align: ' . $ss_player_center . '; ">';
$SS_ffmp3 .= '<div  id="' . $ffmp3_ID . '" style="display:inline-block; border: 0px solid #cc0000; padding: 0; width: ' . $ffmp3_W . 'px; height: ' . $ffmp3_H . 'px; background-color: transparent; text-align: center; background-image:url(\'' . WP_CONTENT_URL . '/plugins/shout-stream/' . $ffmp3_ID . '.png\'); background-repeat:no-repeat; ">';
$SS_ffmp3 .= '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' . $ffmp3_W . '" height="' . $ffmp3_H . '" >';
$SS_ffmp3 .= '<param name="movie" value="' . WP_CONTENT_URL . '/plugins/shout-stream/' . $ffmp3_ID . '.swf?url=http%3A%2F%2F' . $ss_ipstream . ':' . $ss_portstream . '/' . $ss_mountpoint . '&title=' . $ss_ffmp3title . $ss_autoplay .'" />';
$SS_ffmp3 .= '<param name="wmode" value="transparent" />';
$SS_ffmp3 .= '<param name="allowscriptaccess" value="sameDomain" />';
$SS_ffmp3 .= '<!--[if !IE]>-->';
$SS_ffmp3 .= '<object type="application/x-shockwave-flash" data="' . WP_CONTENT_URL . '/plugins/shout-stream/' . $ffmp3_ID . '.swf?url=http%3A%2F%2F' . $ss_ipstream . ':' . $ss_portstream . '/' . $ss_mountpoint . '&title=' . $ss_ffmp3title . '" width="' . $ffmp3_W . '" height="' . $ffmp3_H . '">';
$SS_ffmp3 .= '<param name="wmode" value="transparent" />';
$SS_ffmp3 .= '<param name="allowscriptaccess" value="sameDomain" />';
$SS_ffmp3 .= '<!--<![endif]-->';
$SS_ffmp3 .= '<p style="padding: 0; margin: 0; background-color: #ffffff; width: ' . $ffmp3_W . 'px; height: ' . $ffmp3_H . 'px; color: #CC0000; font-size: 12px; font-weight: bold;" ><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /><br />Flash Player 10 is needed!<br />Click to upgrade...</a></p>';
$SS_ffmp3 .= '<!--[if !IE]>-->';
$SS_ffmp3 .= '</object>';
$SS_ffmp3 .= '<!--<![endif]-->';
$SS_ffmp3 .= '</object>';
$SS_ffmp3 .= '</div>';
$SS_ffmp3 .= '</div>';
          return $SS_ffmp3;
}
// FFmp3 function ends
////////////////////////////////////////
// MINICASTER function starts
function SS_minicaster() {
global $ss_ipstream, $ss_portstream, $ss_streamname, $ss_mountpoint, $ss_auto_play;
$minipoint = WP_CONTENT_URL;
$minipoint = preg_replace ('#\b:(|\b)#u', '%3A', $minipoint);
$minicasterurl = ($ss_ipstream . '@' . $ss_portstream . '@' . $ss_streamname . '@' . $ss_mountpoint . '@' . $ss_auto_play);
$SS_minicaster = '<object id="fmp256" type="application/x-shockwave-flash" data="' . WP_CONTENT_URL .  '/plugins/shout-stream/minicaster.swf" width="180" height="70" flashVars="config=' .$minipoint . '/plugins/shout-stream/minicaster.php%3Fminicasterurl%3D' . $minicasterurl . '" />';
$SS_minicaster .= '<param name="movie" value="' . WP_CONTENT_URL . '/plugins/shout-stream/minicaster.swf" />';
$SS_minicaster .= '<param name="wmode" value="transparent" />';
$SS_minicaster .= '<param name="allowScriptAccess" value="sameDomain" />';
$SS_minicaster .= '<param name="flashVars" value="config=' . $minipoint . '/plugins/shout-stream/minicaster.php%3Fminicasterurl%3D' . $minicasterurl . '" />';
$SS_minicaster .= '</object>';
          return $SS_minicaster;
}
// MINICASTER function ends
////////////////////////////////////////
// MEDIAPLAYER function starts
function SS_mediaplayer() {
global $ss_ipstream, $ss_portstream, $ss_type, $ss_mountpoint, $ss_auto_play, $ss_mpwidth, $ss_mpheight;
$SS_media_player_URLtype = $ss_ipstream . ':' . $ss_portstream . '/' . $ss_mountpoint;
$SS_mediaplayer = '<object ID="MediaPlayer" width="' . $ss_mpwidth . '" height="' . $ss_mpheight . '" CLASSID="clsid:6BF52A52-394A-11D3-B153-00C04F79FAA6" standby="Loading Windows Media Player components..." type="application/x-oleobject" />';
$SS_mediaplayer .= '<PARAM NAME="URL" VALUE="http://' . $SS_media_player_URLtype . '" valuetype="ref" />';
$SS_mediaplayer .= '<param value="' . $ss_auto_play . '" name="AutoStart" />';
$SS_mediaplayer .= '<param value="1" name="AudioStream" />';
$SS_mediaplayer .= '<param value="0" name="AutoSize" />';
$SS_mediaplayer .= '<param value="0" name="AnimationAtStart" />';
$SS_mediaplayer .= '<param value="-1" name="AllowScan" />';
$SS_mediaplayer .= '<param value="-1" name="AllowChangeDisplaySize" />';
$SS_mediaplayer .= '<param value="0" name="AutoRewind" />';
$SS_mediaplayer .= '<param value="0" name="Balance" />';
$SS_mediaplayer .= '<param value name="BaseURL" />';
$SS_mediaplayer .= '<param value="5" name="BufferingTime" />';
$SS_mediaplayer .= '<param value name="CaptioningID" />';
$SS_mediaplayer .= '<param value="-1" name="ClickToPlay" />';
$SS_mediaplayer .= '<param value="0" name="CursorType" />';
$SS_mediaplayer .= '<param value="-1" name="CurrentPosition" />';
$SS_mediaplayer .= '<param value="0" name="CurrentMarker" />';
$SS_mediaplayer .= '<param value name="DefaultFrame" />';
$SS_mediaplayer .= '<param value="0" name="DisplayBackColor" />';
$SS_mediaplayer .= '<param value="16777215" name="DisplayForeColor" />';
$SS_mediaplayer .= '<param value="1" name="DisplayMode" />';
$SS_mediaplayer .= '<param value="1" name="DisplaySize" />';
$SS_mediaplayer .= '<param value="-1" name="Enabled" />';
$SS_mediaplayer .= '<param value="-1" name="EnableContextMenu" />';
$SS_mediaplayer .= '<param value="-1" name="EnablePositionControls" />';
$SS_mediaplayer .= '<param value="-1" name="EnableFullScreenControls" />';
$SS_mediaplayer .= '<param value="-1" name="EnableTracker" />';
$SS_mediaplayer .= '<param value="-1" name="InvokeURLs" />';
$SS_mediaplayer .= '<param value="-1" name="Language" />';
$SS_mediaplayer .= '<param value="0" name="Mute" />';
$SS_mediaplayer .= '<param value="0" name="PlayCount" />';
$SS_mediaplayer .= '<param value="0" name="PreviewMode" />';
$SS_mediaplayer .= '<param value="1" name="Rate" />';
$SS_mediaplayer .= '<param value name="SAMILang" />';
$SS_mediaplayer .= '<param value name="SAMIStyle" />';
$SS_mediaplayer .= '<param value name="SAMIFileName" />';
$SS_mediaplayer .= '<param value="-1" name="SelectionStart" />';
$SS_mediaplayer .= '<param value="-1" name="SelectionEnd" />';
$SS_mediaplayer .= '<param value="-1" name="SendOpenStateChangeEvents" />';
$SS_mediaplayer .= '<param value="-1" name="SendWarningEvents" />';
$SS_mediaplayer .= '<param value="-1" name="SendErrorEvents" />';
$SS_mediaplayer .= '<param value="0" name="SendKeyboardEvents" />';
$SS_mediaplayer .= '<param value="0" name="SendMouseClickEvents" />';
$SS_mediaplayer .= '<param value="0" name="SendMouseMoveEvents" />';
$SS_mediaplayer .= '<param value="-1" name="SendPlayStateChangeEvents" />';
$SS_mediaplayer .= '<param value="0" name="ShowCaptioning" />';
$SS_mediaplayer .= '<param value="-1" name="ShowControls" />';
$SS_mediaplayer .= '<param value="-1" name="ShowAudioControls" />';
$SS_mediaplayer .= '<param value="0" name="ShowDisplay" />';
$SS_mediaplayer .= '<param value="0" name="ShowGotoBar" />';
$SS_mediaplayer .= '<param value="0" name="ShowPositionControls" />';
$SS_mediaplayer .= '<param value="-1" name="ShowStatusBar" />';
$SS_mediaplayer .= '<param value="-1" name="ShowTracker" />';
$SS_mediaplayer .= '<param value="0" name="TransparentAtStart" />';
$SS_mediaplayer .= '<param value="0" name="VideoBorderWidth" />';
$SS_mediaplayer .= '<param value="616614" name="VideoBorderColor" />';
$SS_mediaplayer .= '<param value="-1" name="VideoBorder3D" />';
$SS_mediaplayer .= '<param value="100" name="Volume" />';
$SS_mediaplayer .= '<param value="-1" name="WindowlessVideo" />';
$SS_mediaplayer .= '<embed type="application/x-ms-wmp" pluginspage="http://port25.technet.com/pages/windows-media-player-firefox-plugin-download.aspx" name="MediaPlayer" src="http://' . $SS_media_player_URLtype . '" width="' . $ss_mpwidth . '" height="' . $ss_mpheight . '" autostart="' . $ss_auto_play . '" volume="100" SHOWSTATUSBAR="1" />
</embed></object>';
          return $SS_mediaplayer;
}
// MEDIAPLAYER function ends
////////////////////////////////////////
// CURL function starts
function SS_curl_history() {
global $ss_ipstream, $ss_portstream, $ss_streamname, $ss_interval, $ss_heading, $ss_text_stat_0, $ss_text_stat_1, $ss_text_stat_2, $ss_text_stat_3, $ss_text_stat_4, $ss_text_stat_5, $ss_text_stat_6, $ss_text_stat_7, $ss_text_stat_8, $ss_text_stat_9, $ss_text_stat_10, $ss_text_stat_11, $ss_text_stat_12, $ss_text_stat_13, $ss_text_stat_14, $ss_text_stat_15, $ss_text_stat_16, $ss_text_stat_17;
$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
$header[] = "Cache-Control: max-age=0";
$header[] = "Connection: keep-alive";
$header[] = "Keep-Alive: 300";
$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
$header[] = "Accept-Language: en-us,en;q=0.5";
$header[] = "Pragma: "; // browsers keep this blank. 
ini_set("display_errors","On");
ini_set("error_reporting",ini_get("error_reporting") & ~E_WARNING);
$CurlURL_stats = 'http://' . $ss_ipstream . ':' . $ss_portstream . '/index.html';
$CurlURL_history = 'http://' . $ss_ipstream . ':' . $ss_portstream . '/played.html';
$ch1 = curl_init();
$ch2 = curl_init();
curl_setopt ($ch1, CURLOPT_URL, $CurlURL_stats);
curl_setopt ($ch1, CURLOPT_HEADER, false);
curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch1, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch1, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
curl_setopt($ch1, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch1, CURLOPT_REFERER, 'http://www.google.com');
curl_setopt($ch1, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch1, CURLOPT_AUTOREFERER, true);
curl_setopt ($ch2, CURLOPT_URL, $CurlURL_history);
curl_setopt ($ch2, CURLOPT_HEADER, false);
curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch2, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
curl_setopt($ch2, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch2, CURLOPT_REFERER, 'http://www.google.com');
curl_setopt($ch2, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch2, CURLOPT_AUTOREFERER, true);
$mh = curl_multi_init();
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);
$running=null;
do { curl_multi_exec($mh,$running); } while ($running > 0);
$SS_read_curl = curl_exec($ch1);
$SS_read_curl_history = curl_exec($ch2);
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);
$search_and_Destroy = array('@<script[^>]*?>.*?</script>@si',   // Strip out javascript
                            '@<[\\/\\!]*?[^<>]*?>@si',          // Strip out HTML tags
                            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                            '@<![\\s\\S]*?--[ \\t\\n\\r]*>@'    // Strip multi-line comments including CDATA
                            );
$SS_Xplain = preg_replace($search_and_Destroy, '|', $SS_read_curl);
$SS_Xplain .= preg_replace($search_and_Destroy, '|', $SS_read_curl_history);
$SS_lessTop = explode('Current Stream Information', $SS_Xplain, 2);
$SSless_Bottom = explode('Nullsoft', $SS_lessTop[1]);
$SS_Page_Stats = $SSless_Bottom[0];
$SS_Page_History = $SSless_Bottom[1];
$SS_Page_Stats = preg_replace('/\s\s+/', '', $SS_Page_Stats);
$SS_Page_History = preg_replace('/\s\s+/', '', $SS_Page_History);
$SS_curl = explode('|||||', $SS_Page_Stats, 12);
$SS_song = explode('Current Song:', $SS_curl[11], 2);
$SS_song = $SS_song[1];
$SSsongname = explode('|||||', $SS_song);
$SSkbps = preg_replace ( '/[^0-9]/', ' ', $SS_curl[4] );
$SS_kbps = explode(' ', $SSkbps, 46);
$SSlessTop_history = explode('Current Song', $SS_Page_History, 2);
$SSlessBottom_history = explode('Nullsoft', $SSlessTop_history[1], 2);
$SSless_history = $SSlessBottom_history[0];
$SScurl_history = explode('||', $SSless_history);
$SScurl_history = preg_replace('/\|/', '', $SScurl_history);
if ( $SS_curl[2] == 'Server is currently down.' ) 
      { $state = $ss_text_stat_9;
$SS_curl_history = '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_7 . ' ' . $state . '</a></strong></li>';
      }
else if ( $SS_curl[2] == 'Server is currently up and public.' || $SS_curl[2] == 'Server is currently up and private.' )
      {
$state = $ss_text_stat_8;
$SS_curl_history = '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong> ' . $ss_text_stat_1 . ' <strong>' . $SS_kbps[16] . '</strong> kbps</li>';
$SS_curl_history .= '<li>' . $ss_text_stat_2 . ': <strong>' . $SS_kbps[28] . '</strong> ' . $ss_text_stat_3 . ' <strong>' . $SS_kbps[32] . '</strong> (' . $ss_text_stat_4 . ': '.$SS_curl[6].')</li>';
$SS_curl_history .= '<li>' . $ss_text_stat_12 . ': <strong>'.$SS_curl[8].'</strong></li>';
$SS_curl_history .= '<' . $ss_heading . ' style="padding: 10px;">' . $ss_text_stat_5 . '</' . $ss_heading . '>';
$nonengtitle = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SS_curl[10] );
$SS_curl_history .= '<li><strong>' . $nonengtitle . '</strong></li>';
$SS_curl_history .= '<' . $ss_heading . ' style="padding: 10px;">' . $ss_text_stat_6 . '</' . $ss_heading . '>';
$nonengsong = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SSsongname[1] );
$SS_curl_history .= '<li><strong>' . $nonengsong . '</strong></li>';
$SS_curl_history .= '<' . $ss_heading . ' style="padding: 10px;">' . $ss_text_stat_15 . '</' . $ss_heading . '>';
if ($SScurl_history[2] != 0)  {
$SS_curl_history .= '<li>' . $SScurl_history[2] . ' : &nbsp; ' . preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[3] ) . '</li>';
                              }
if ($SScurl_history[4] != 0)  {
$SS_curl_history .= '<li>' . $SScurl_history[4] . ' : &nbsp; ' . preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[5] ) . '</li>';
                              }
if ($SScurl_history[6] != 0)  {
$SS_curl_history .= '<li>' . $SScurl_history[6] . ' : &nbsp; ' .  preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[7] ) . '</li>';
                              }
if ($SScurl_history[8] != 0)  {
$SS_curl_history .= '<li>' . $SScurl_history[8] . ' : &nbsp; ' .  preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[9] ) . '</li>';
                              }
if ($SScurl_history[10] != 0) {
$SS_curl_history .= '<li>' . $SScurl_history[10] . ' : &nbsp; ' .  preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[11] ) . '</li>';
                              }
if ($SScurl_history[12] != 0) {
$SS_curl_history .= '<li>' . $SScurl_history[12] . ' : &nbsp; ' .  preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[13] ) . '</li>';
                              }
if ($SScurl_history[14] != 0) {
$SS_curl_history .= '<li>' . $SScurl_history[14] . ' : &nbsp; ' .  preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[15] ) . '</li>';
                              }
if ($SScurl_history[16] != 0) {
$SS_curl_history .= '<li>' . $SScurl_history[16] . ' : &nbsp; ' .  preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[17] ) . '</li>';
                              }
if ($SScurl_history[18] != 0) {
$SS_curl_history .= '<li>' . $SScurl_history[18] . ' : &nbsp; ' .  preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl_history[19] ) . '</li>';
                              }
      }
else  { $SS_curl_history = '<li><font color="#CC0000"><strong>STREAM CONNECT FAILED</strong></font></li>'; }
          return $SS_curl_history;
}          
// CURL function ends
////////////////////////////////////////
// CURL sidebar function starts
function SS_curl() {
global $ss_ipstream, $ss_portstream, $ss_interval, $ss_page, $ss_stats, $ss_sheading, $ss_player_center, $ss_text_stat_0, $ss_text_stat_1, $ss_text_stat_2, $ss_text_stat_3, $ss_text_stat_4, $ss_text_stat_5, $ss_text_stat_6, $ss_text_stat_7, $ss_text_stat_8, $ss_text_stat_9, $ss_text_stat_12, $ss_text_stat_16;
$CurlURL = 'http://' . $ss_ipstream . ':' . $ss_portstream . '/';
$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
$header[] = "Cache-Control: max-age=0";
$header[] = "Connection: keep-alive";
$header[] = "Keep-Alive: 300";
$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
$header[] = "Accept-Language: en-us,en;q=0.5";
$header[] = "Pragma: "; // browsers keep this blank. 
ini_set("display_errors","On");
ini_set("error_reporting",ini_get("error_reporting") & ~E_WARNING);
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $CurlURL);
curl_setopt ($ch, CURLOPT_HEADER, false);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
$SS_read_curl = curl_exec($ch);
curl_close($ch);
$search_and_Destroy = array('@<script[^>]*?>.*?</script>@si',   // Strip out javascript
                            '@<[\\/\\!]*?[^<>]*?>@si',          // Strip out HTML tags
                            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                            '@<![\\s\\S]*?--[ \\t\\n\\r]*>@'    // Strip multi-line comments including CDATA
                            );
$SS_Xplain = preg_replace($search_and_Destroy, '|', $SS_read_curl);
$SS_lessTop = explode('Current Stream Information', $SS_Xplain, 2);
$SSless_Bottom = explode('Nullsoft', $SS_lessTop[1]);
$SS_Page_Stats = $SSless_Bottom[0];
$SS_Page_History = $SSless_Bottom[1];
$SS_Page_Stats = preg_replace('/\s\s+/', '', $SS_Page_Stats);
$SS_curl = explode('|||||', $SS_Page_Stats, 12);
$SS_song = explode('Current Song:', $SS_curl[11], 2);
$SS_song = $SS_song[1];
$SSsongname = explode('|||||', $SS_song);
$SSkbps = preg_replace ( '/[^0-9]/', ' ', $SS_curl[4] );
$SS_kbps = explode(' ', $SSkbps, 46);
if ( $SS_curl[2] == 'Server is currently down.' ) 
      { $state = $ss_text_stat_9;
echo '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_7 . ' ' . $state . '</a></strong></li>';
      }
else if ( $SS_curl[2] == 'Server is currently up and public.' || $SS_curl[2] == 'Server is currently up and private.' )
      {
$state = $ss_text_stat_8;
echo '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong> ' . $ss_text_stat_1 . ' <strong>' . $SS_kbps[16] . '</strong> kbps</li>';
echo '<li>' . $ss_text_stat_2 . ': <strong>' . $SS_kbps[28] . '</strong> ' . $ss_text_stat_3 . ' <strong>' . $SS_kbps[32] . '</strong> (' . $ss_text_stat_4 . ': '.$SS_curl[6].')</li>';
echo '<li>' . $ss_text_stat_12 . ': <strong>'.$SS_curl[8].'</strong></li>';
if ($ss_page != '' && $ss_stats == 0) { echo '<li><a href="' . $ss_page . '">' . $ss_text_stat_16 . '</a></li>'; }
$nonengtitle = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SS_curl[10] );
echo '<li>' . $ss_text_stat_5 . '<strong>: ' . $nonengtitle . '</strong></li>';
echo '<' . $ss_sheading . ' style="padding: 10px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_6 . '</' . $ss_sheading . '>';
$nonengsong = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SSsongname[1] );
if ($nonengsong != '') { echo '<li><strong>' . $nonengsong . '</strong></li>'; }
else { echo '<li><strong>...</strong></li>'; }
}
}
// CURL sidebar function ends
////////////////////////////////////////
// FSOCKOPEN function starts
function SS_fsock() {
global $ss_ipstream, $ss_portstream, $ss_interval, $ss_heading, $ss_sheading, $ss_page, $ss_player_center, $ss_text_stat_0, $ss_text_stat_1, $ss_text_stat_2, $ss_text_stat_3, $ss_text_stat_4, $ss_text_stat_5, $ss_text_stat_6, $ss_text_stat_7, $ss_text_stat_8, $ss_text_stat_9, $ss_text_stat_16;
$open = fsockopen($ss_ipstream,$ss_portstream,$errno,$errstr,5);
// check stream connection --> WP2.5
if (!$open) { $SS_fsock = '<li><font color="#CC0000"><strong>STREAM CONNECT FAILED</strong></font> <br />error N: ' . $errno . '<br />Check <IP>:<port> configuration</li>'; }
else {
if ($open) { 
fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
$read = fread($open,1000); 
$text = explode("content-type:text/html",$read); 
$text = explode(",",$text[1]); 
} else { $er="Connection Refused!"; } 
if ($text[1]==1) { $state = $ss_text_stat_8; } else { $state = $ss_text_stat_9; } 
if ($er) { echo $er; exit; } 
$text[0] = preg_replace ( '/[^0-9]/', '', $text[0] );
if ($ss_text_stat_9 == $state)
{
$SS_fsock = '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong></li>';
}
else if ($ss_text_stat_8 == $state)
{
$SS_fsock = '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong> ' . $ss_text_stat_1 . ' <strong>' . $text[5] . '</strong> kbps</li>';
$SS_fsock .= '<li>' . $ss_text_stat_2 . ': <strong>' . $text[0] . '</strong> ' . $ss_text_stat_3 . ' <strong>' . $text[3] . '</strong> (' . $ss_text_stat_4 . ': ' . $text[2] . ')</li>';
$SS_page_self = 'http://'.($_SERVER['HTTP_HOST']).($_SERVER['REQUEST_URI']); 
if (($ss_page != '') && ($SS_page_self != $ss_page)) { $SS_fsock .= '<li><a href="' . $ss_page . '">' . $ss_text_stat_16 . '</a></li>'; }
if ($SS_page_self == $ss_page) { $SS_fsock .= '<' . $ss_heading . ' style="padding: 10px;">' . $ss_text_stat_6 . '</' . $ss_heading . '>'; }
else { $SS_fsock .= '<' . $ss_sheading . ' style="padding: 10px; text-align: ' . $ss_player_center . '">' . $ss_text_stat_6 . '</' . $ss_sheading . '>';}
$nonengsong = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $text[6] );
$nonengsong = preg_replace ( '/html/', ' ', $nonengsong );
$nonengsong = preg_replace ( '/body/', ' ', $nonengsong );
$SS_fsock .= '<li><strong>' . $nonengsong . '</strong>	&nbsp;</li>';
}
    fclose($open);
     }
       return $SS_fsock;
}
// FSOCKOPEN function ends
////////////////////////////////////////
// ICE CURL function starts
function SS_ice_curl() {
global $ss_ipstream, $ss_portstream, $ss_streamname, $ss_mountpoint, $ss_interval, $ss_page, $ss_heading, $ss_sheading, $ss_player_center, $ss_text_stat_0, $ss_text_stat_1, $ss_text_stat_2, $ss_text_stat_3, $ss_text_stat_4, $ss_text_stat_5, $ss_text_stat_6, $ss_text_stat_7, $ss_text_stat_8, $ss_text_stat_9, $ss_text_stat_16;
$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
$header[] = "Cache-Control: max-age=0";
$header[] = "Connection: keep-alive";
$header[] = "Keep-Alive: 300";
$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
$header[] = "Accept-Language: en-us,en;q=0.5";
$header[] = "Pragma: "; // browsers keep this blank. 
ini_set("display_errors","On");
ini_set("error_reporting",ini_get("error_reporting") & ~E_WARNING);
$CurlURL = 'http://' . $ss_ipstream . ':' . $ss_portstream . '/status.xsl';
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $CurlURL);
curl_setopt ($ch, CURLOPT_HEADER, false);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
$SS_read_curl = curl_exec($ch);
curl_close($ch);
$search_and_Destroy = array('@<script[^>]*?>.*?</script>@si',   // Strip out javascript
                            '@<[\\/\\!]*?[^<>]*?>@si',          // Strip out HTML tags
                            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                            '@<![\\s\\S]*?--[ \\t\\n\\r]*>@'    // Strip multi-line comments including CDATA
                            );
$SS_Xplain = preg_replace($search_and_Destroy, '|', $SS_read_curl);
$SSlessTop = explode($ss_mountpoint, $SS_Xplain, 2);
$SSlessBottom = explode('||||||||||||', $SSlessTop[1], 2);
$SSless = $SSlessBottom[0];
$SSless = preg_replace('/\s\s+/', '', $SSless);
$SSless = preg_replace('/\|\s/', '', $SSless);
$SSless = preg_replace('/\|\|/', '|', $SSless);
$SScurl = explode('|', $SSless, 40);
$ss_key = array_search('Bitrate:', $SScurl);
$ss_key = ($ss_key + 1);
if (intval($SScurl[$ss_key])<10) {
$state = $ss_text_stat_9;
$SS_ice_curl = '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/status.xsl"  target="_blank">' . $ss_text_stat_7 . ' ' . $state . '</a></strong></li>';
                                 } 
else                             {
$state = $ss_text_stat_8;
$SS_ice_curl = '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/status.xsl"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong> ' . $ss_text_stat_1 . ' <strong>' . $SScurl[$ss_key] . '</strong> kbps</li>';
$ss_key0 = array_search('Current Listeners:', $SScurl); $ss_key0 = ($ss_key0 + 1);
$ss_key1 = array_search('Peak Listeners:', $SScurl); $ss_key1 = ($ss_key1 + 1);
if (($SScurl[$ss_key0] != '') || ($SScurl[$ss_key1] != '')) {
$SScurl[$ss_key0] = preg_replace ( '/[^0-9]/', ' ', $SScurl[$ss_key0] );
$SScurl[$ss_key1] = preg_replace ( '/[^0-9]/', ' ', $SScurl[$ss_key1] );
$SS_ice_curl .= '<li>' . $ss_text_stat_2 . ': <strong>' . $SScurl[$ss_key0] . '</strong> (' . $ss_text_stat_4 . ': '. $SScurl[$ss_key1] .')</li>'; 
                                                            }
$SS_page_self = 'http://'.($_SERVER['HTTP_HOST']).($_SERVER['REQUEST_URI']); 
if (($ss_page != '') && ($SS_page_self != $ss_page)) { 
$SS_ice_curl .= '<li><a href="' . $ss_page . '">' . $ss_text_stat_16 . '</a></li>'; 
}
if ($SS_page_self == $ss_page) {
$SS_ice_curl .= '<' . $ss_heading . ' style="padding: 10px;">' . $ss_text_stat_5 . '</' . $ss_heading . '>';
}
else {
$SS_ice_curl .= '<' . $ss_sheading . ' style="padding: 10px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_5 . '</' . $ss_sheading . '>';
}
$ss_key2 = array_search('Stream Title:', $SScurl); $ss_key2 = ($ss_key2 + 1);
if ($SScurl[$ss_key2] == '') { $SS_ice_curl .= '<li><strong>...</strong>&nbsp;</li>';  }
else  {
$nonengtitle = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl[$ss_key2] );
$SS_ice_curl .= '<li><strong>' . $nonengtitle . '</strong></li>';
      }
if ($SS_page_self == $ss_page) {
$SS_ice_curl .= '<' . $ss_heading . ' style="padding: 10px;">' . $ss_text_stat_6 . '</' . $ss_heading . '>';
}
else {
$SS_ice_curl .= '<' . $ss_sheading . ' style="padding: 10px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_6 . '</' . $ss_sheading . '>';
}
$ss_key3 = array_search('Current Song:', $SScurl); $ss_key3 = ($ss_key3 + 1);
//if ($SScurl[$ss_key3] == '') { $ss_key3 = array_search('Current Track:', $SScurl); $ss_key3 = ($ss_key3 + 1);}
if ($SScurl[$ss_key3] == '') { $SS_ice_curl .= '<li><strong>...</strong>&nbsp;</li>';  }
else  {
$nonengsong = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl[$ss_key3] );
$SS_ice_curl .= '<li><strong>' . $nonengsong . '</strong>&nbsp;</li>'; 
      }
                                 } 
          return $SS_ice_curl;
}          
// ICE CURL function ends
////////////////////////////////////////
// Start text links...
function SS_text_links() {
global $ss_ipstream, $ss_portstream, $ss_mountpoint, $ss_streamname, $ss_name_1, $ss_name_2, $ss_name_3, $ss_name_4, $ss_name_5, $ss_name_6, $ss_name_7, $ss_name_8, $ss_name_9, $ss_ipstream_1, $ss_ipstream_2, $ss_ipstream_3, $ss_ipstream_4, $ss_ipstream_5, $ss_ipstream_6, $ss_ipstream_7, $ss_ipstream_8, $ss_ipstream_9, $ss_portstream_1, $ss_portstream_2, $ss_portstream_3, $ss_portstream_4, $ss_portstream_5, $ss_portstream_6, $ss_portstream_7, $ss_portstream_8, $ss_portstream_9, $ss_mountpoint_1, $ss_mountpoint_2, $ss_mountpoint_3, $ss_mountpoint_4, $ss_mountpoint_5, $ss_mountpoint_6, $ss_mountpoint_7, $ss_mountpoint_8, $ss_mountpoint_9, $ss_text_stat_10, $ss_text_stat_11, $ss_text_stat_13, $ss_type, $ss_media_caster, $ss_auto_play;
// CHECK IF MSIE
$ss_detect = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
if ((strpos($ss_detect, 'MSIE')) > 1 ) { $ss_detect = 1; } else { $ss_detect = 0; }
// Something that minicaster is desperate
$minipointurl = WP_CONTENT_URL;
$minipoint = preg_replace ('#\b:(|\b)#u', '%3A', $minipointurl);
$minicaster_url = ($minipoint . '/plugins/shout-stream/');
$minicasterurl0 = ($ss_ipstream . '@' . $ss_portstream . '@' . $ss_streamname . '@' . $ss_mountpoint . '@' . $ss_auto_play);
//main stream
$SS_text_links .= '<span id="mplayerpopup"><!-- ' . $ss_ipstream . ' ' . $ss_portstream . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl0 . ' ' . $ss_type . ' ' . $ss_mountpoint . ' ' . $ss_streamname . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup\').innerHTML)"><strong>' . $ss_streamname . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">';
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup"><!-- ' . $ss_ipstream . ' ' . $ss_portstream . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl0 . ' ' . $ss_type . ' ' . $ss_mountpoint . ' ' . $ss_streamname . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
//alt1
if ($ss_name_1!='' && $ss_ipstream_1!='' && $ss_portstream_1!='') {
if ($ss_mountpoint_1 == '') { $ss_mountpoint_1 = ';';}
$minicasterurl1 = ($ss_ipstream_1 . '@' . $ss_portstream_1 . '@' . $ss_name_1 . '@' . $ss_mountpoint_1);
$SS_text_links .= '<span id="mplayerpopup1"><!-- ' . $ss_ipstream_1 . ' ' . $ss_portstream_1 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl1 . ' ' . $ss_type . ' ' . $ss_mountpoint_1 . ' ' . $ss_name_1 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup1\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup1\').innerHTML)"><strong>' . $ss_name_1 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup1\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup1\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup1"><!-- ' . $ss_ipstream_1 . ' ' . $ss_portstream_1 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url1 . ' ' . $minicasterurl1 . ' ' . $ss_type . ' ' . $ss_mountpoint_1 . ' ' . $ss_name_1 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup1\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup1\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_1 . ':' . $ss_portstream_1 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_1 . ':' . $ss_portstream_1 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_1 . ':' . $ss_portstream_1 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_1 . ':' . $ss_portstream_1 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt2
if ($ss_name_2!='' && $ss_ipstream_2!='' && $ss_portstream_2!='') {
if ($ss_mountpoint_2 == '') { $ss_mountpoint_2 = ';';}
$minicasterurl2 = ($ss_ipstream_2 . '@' . $ss_portstream_2 . '@' . $ss_name_2 . '@' . $ss_mountpoint_2);
$SS_text_links .= '<span id="mplayerpopup2"><!-- ' . $ss_ipstream_2 . ' ' . $ss_portstream_2 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl2 . ' ' . $ss_type . ' ' . $ss_mountpoint_2 . ' ' . $ss_name_2 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup2\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup2\').innerHTML)"><strong>' . $ss_name_2 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup2\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup2\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup2"><!-- ' . $ss_ipstream_2 . ' ' . $ss_portstream_2 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url2 . ' ' . $minicasterurl2 . ' ' . $ss_type . ' ' . $ss_mountpoint_2 . ' ' . $ss_name_2 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup2\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup2\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_2 . ':' . $ss_portstream_2 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_2 . ':' . $ss_portstream_2 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_2 . ':' . $ss_portstream_2 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_2 . ':' . $ss_portstream_2 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt3
if ($ss_name_3!='' && $ss_ipstream_3!='' && $ss_portstream_3!='') {
if ($ss_mountpoint_3 == '') { $ss_mountpoint_3 = ';';}
$minicasterurl3 = ($ss_ipstream_3 . '@' . $ss_portstream_3 . '@' . $ss_name_3 . '@' . $ss_mountpoint_3);
$SS_text_links .= '<span id="mplayerpopup3"><!-- ' . $ss_ipstream_3 . ' ' . $ss_portstream_3 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl3 . ' ' . $ss_type . ' ' . $ss_mountpoint_3 . ' ' . $ss_name_3 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup3\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup3\').innerHTML)"><strong>' . $ss_name_3 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup3\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup3\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup3"><!-- ' . $ss_ipstream_3 . ' ' . $ss_portstream_3 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url3 . ' ' . $minicasterurl3 . ' ' . $ss_type . ' ' . $ss_mountpoint_3 . ' ' . $ss_name_3 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup3\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup3\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_3 . ':' . $ss_portstream_3 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_3 . ':' . $ss_portstream_3 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_3 . ':' . $ss_portstream_3 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_3 . ':' . $ss_portstream_3 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt4
if ($ss_name_4!='' && $ss_ipstream_4!='' && $ss_portstream_4!='') {
if ($ss_mountpoint_4 == '') { $ss_mountpoint_4 = ';';}
$minicasterurl4 = ($ss_ipstream_4 . '@' . $ss_portstream_4 . '@' . $ss_name_4 . '@' . $ss_mountpoint_4);
$SS_text_links .= '<span id="mplayerpopup4"><!-- ' . $ss_ipstream_4 . ' ' . $ss_portstream_4 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl4 . ' ' . $ss_type . ' ' . $ss_mountpoint_4 . ' ' . $ss_name_4 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup4\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup4\').innerHTML)"><strong>' . $ss_name_4 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup4\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup4\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup4"><!-- ' . $ss_ipstream_4 . ' ' . $ss_portstream_4 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url4 . ' ' . $minicasterurl4 . ' ' . $ss_type . ' ' . $ss_mountpoint_4 . ' ' . $ss_name_4 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup4\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup4\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_4 . ':' . $ss_portstream_4 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_4 . ':' . $ss_portstream_4 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_4 . ':' . $ss_portstream_4 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_4 . ':' . $ss_portstream_4 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt5
if ($ss_name_5!='' && $ss_ipstream_5!='' && $ss_portstream_5!='') {
if ($ss_mountpoint_5 == '') { $ss_mountpoint_5 = ';';}
$minicasterurl5 = ($ss_ipstream_5 . '@' . $ss_portstream_5 . '@' . $ss_name_5 . '@' . $ss_mountpoint_5);
$SS_text_links .= '<span id="mplayerpopup5"><!-- ' . $ss_ipstream_5 . ' ' . $ss_portstream_5 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl5 . ' ' . $ss_type . ' ' . $ss_mountpoint_5 . ' ' . $ss_name_5 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup5\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup5\').innerHTML)"><strong>' . $ss_name_5 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup5\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup5\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup5"><!-- ' . $ss_ipstream_5 . ' ' . $ss_portstream_5 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url5 . ' ' . $minicasterurl5 . ' ' . $ss_type . ' ' . $ss_mountpoint_5 . ' ' . $ss_name_5 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup5\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup5\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_5 . ':' . $ss_portstream_5 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_5 . ':' . $ss_portstream_5 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_5 . ':' . $ss_portstream_5 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_5 . ':' . $ss_portstream_5 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt6
if ($ss_name_6!='' && $ss_ipstream_6!='' && $ss_portstream_6!='') {
if ($ss_mountpoint_6 == '') { $ss_mountpoint_6 = ';';}
$minicasterurl6 = ($ss_ipstream_6 . '@' . $ss_portstream_6 . '@' . $ss_name_6 . '@' . $ss_mountpoint_6);
$SS_text_links .= '<span id="mplayerpopup6"><!-- ' . $ss_ipstream_6 . ' ' . $ss_portstream_6 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl6 . ' ' . $ss_type . ' ' . $ss_mountpoint_6 . ' ' . $ss_name_6 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup6\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup6\').innerHTML)"><strong>' . $ss_name_6 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup6\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup6\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup6"><!-- ' . $ss_ipstream_6 . ' ' . $ss_portstream_6 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url6 . ' ' . $minicasterurl6 . ' ' . $ss_type . ' ' . $ss_mountpoint_6 . ' ' . $ss_name_6 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup6\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup6\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_6 . ':' . $ss_portstream_6 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_6 . ':' . $ss_portstream_6 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_6 . ':' . $ss_portstream_6 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_6 . ':' . $ss_portstream_6 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt7
if ($ss_name_7!='' && $ss_ipstream_7!='' && $ss_portstream_7!='') {
if ($ss_mountpoint_7 == '') { $ss_mountpoint_7 = ';';}
$minicasterurl7 = ($ss_ipstream_7 . '@' . $ss_portstream_7 . '@' . $ss_name_7 . '@' . $ss_mountpoint_7);
$SS_text_links .= '<span id="mplayerpopup7"><!-- ' . $ss_ipstream_7 . ' ' . $ss_portstream_7 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl7 . ' ' . $ss_type . ' ' . $ss_mountpoint_7 . ' ' . $ss_name_7 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup7\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup7\').innerHTML)"><strong>' . $ss_name_7 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup7\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup7\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup7"><!-- ' . $ss_ipstream_7 . ' ' . $ss_portstream_7 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url7 . ' ' . $minicasterurl7 . ' ' . $ss_type . ' ' . $ss_mountpoint_7 . ' ' . $ss_name_7 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup7\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup7\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_7 . ':' . $ss_portstream_7 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_7 . ':' . $ss_portstream_7 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_7 . ':' . $ss_portstream_7 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_7 . ':' . $ss_portstream_7 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt8
if ($ss_name_8!='' && $ss_ipstream_8!='' && $ss_portstream_8!='') {
if ($ss_mountpoint_8 == '') { $ss_mountpoint_8 = ';';}
$minicasterurl8 = ($ss_ipstream_8 . '@' . $ss_portstream_8 . '@' . $ss_name_8 . '@' . $ss_mountpoint_8);
$SS_text_links .= '<span id="mplayerpopup8"><!-- ' . $ss_ipstream_8 . ' ' . $ss_portstream_8 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl8 . ' ' . $ss_type . ' ' . $ss_mountpoint_8 . ' ' . $ss_name_8 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup8\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup8\').innerHTML)"><strong>' . $ss_name_8 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup8\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup8\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup8"><!-- ' . $ss_ipstream_8 . ' ' . $ss_portstream_8 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url8 . ' ' . $minicasterurl8 . ' ' . $ss_type . ' ' . $ss_mountpoint_8 . ' ' . $ss_name_8 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup8\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup8\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_8 . ':' . $ss_portstream_8 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_8 . ':' . $ss_portstream_8 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_8 . ':' . $ss_portstream_8 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_8 . ':' . $ss_portstream_8 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
//alt9
if ($ss_name_9!='' && $ss_ipstream_9!='' && $ss_portstream_9!='') {
if ($ss_mountpoint_9 == '') { $ss_mountpoint_9 = ';';}
$minicasterurl9 = ($ss_ipstream_9 . '@' . $ss_portstream_9 . '@' . $ss_name_9 . '@' . $ss_mountpoint_9);
$SS_text_links .= '<span id="mplayerpopup9"><!-- ' . $ss_ipstream_9 . ' ' . $ss_portstream_9 . ' ' . $ss_detect . ' ' . $ss_media_caster . ' ' . $minipointurl . ' ' . $minicaster_url . ' ' . $minicasterurl9 . ' ' . $ss_type . ' ' . $ss_mountpoint_9 . ' ' . $ss_name_9 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<li><a title="' . $ss_text_stat_10 . '" href="javascript:ss_popup(\'mplayerpopup9\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup9\').innerHTML)"><strong>' . $ss_name_9 . '</strong></a><p style="padding-top: 5px; padding-bottom: 0px; padding-left: 5px; padding-right: 5px; margin: 0;">'; 
$SS_text_links .= '<a title="Flash Player PopUp" href="javascript:ss_popup(\'mplayerpopup9\',\'popup\',\'width=320,height=160\',document.getElementById(\'mplayerpopup9\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-flash.png" alt="Flash Player PopUp" title="Flash Player PopUp"></a>&nbsp;'; 
$SS_text_links .= '<span id="mediaplayerpopup9"><!-- ' . $ss_ipstream_9 . ' ' . $ss_portstream_9 . ' ' . 1 . ' ' . 1 . ' ' . $minipointurl . ' ' . $minicaster_url9 . ' ' . $minicasterurl9 . ' ' . $ss_type . ' ' . $ss_mountpoint_9 . ' ' . $ss_name_9 . ' ' . $ss_auto_play . ' --></span>';
$SS_text_links .= '<a title="Media Player PopUp" href="javascript:ss_popup(\'mediaplayerpopup9\',\'popup\',\'width=320,height=160\',document.getElementById(\'mediaplayerpopup9\').innerHTML)"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-mediap.png" alt="Media Player PopUp" title="Media Player PopUp"></a> '; 
if ($ss_type == 0) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_9 . ':' . $ss_portstream_9 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_9 . ':' . $ss_portstream_9 . '/listen.pls"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
else if ($ss_type == 1) {
$SS_text_links .= '<a href="http://' . $ss_ipstream_9 . ':' . $ss_portstream_9 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-winamp.png" alt="Winamp" title="Winamp"></a>&nbsp;'; 
$SS_text_links .= '<a href="http://' . $ss_ipstream_9 . ':' . $ss_portstream_9 . '/' . $ss_mountpoint . '.m3u"><img src="' . WP_CONTENT_URL . '/plugins/shout-stream/pop-itunes.png" alt="iTunes" title="iTunes"></a>&nbsp;'; 
}
$SS_text_links .= '</p></li>'; 
//////////////////////////////////////
}
// Winamp or iTunes link...
/*
if ($ss_type == 0) { 
$SS_text_links .= '<li><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/listen.pls">' . $ss_text_stat_11 . ' <img src="' . WP_CONTENT_URL . '/plugins/shout-stream/popup.png" alt="' . $ss_text_stat_10 . '" title="' . $ss_text_stat_10 . '"></a></li>';
} 
else if ($ss_type == 1) {
$SS_text_links .= '<li><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/' . $ss_mountpoint . '.m3u">' . $ss_text_stat_11 . ' <img src="' . WP_CONTENT_URL . '/plugins/shout-stream/popup.png" alt="' . $ss_text_stat_10 . '" title="' . $ss_text_stat_10 . '"></a></li>';
}
*/
          return $SS_text_links;
}
////////////////////////////////////////
// Generic error function from configuration...
function SS_error() {
global $ss_text_stat_17;
$SS_error = '<p style="font-weight: bold; color: #CC0000;">' . $ss_text_stat_17 . '</p>';
          return $SS_error;
                    }
// Generic error function from configuration...
////////////////////////////////////////
?>