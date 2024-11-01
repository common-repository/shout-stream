<?php
//Shout Stream options page
// this clears all options
if (get_option('reset_shout_stream') == 'YES') { reset_shout_stream_options(); }
else {
// some conditions useful for radio buttons to remember their values
if (get_option('ss_usage') == 0) { $ss_usage_a = 'checked="checked"'; }
else if (get_option('ss_usage') == 1) { $ss_usage_b = 'checked="checked"'; }
else if (get_option('ss_usage') == 2) { $ss_usage_c = 'checked="checked"'; }
else { $ss_usage_a = ''; $ss_usage_b = ''; $ss_usage_c = ''; }
if (get_option('ss_media_caster') == 0) { $ss_media_caster_a = 'checked="checked"'; }
else if (get_option('ss_media_caster') == 1) { $ss_media_caster_b = 'checked="checked"'; }
else if (get_option('ss_media_caster') == 2) { $ss_media_caster_c = 'checked="checked"'; }
else if (get_option('ss_media_caster') == 3) { $ss_media_caster_d = 'checked="checked"'; }
else if (get_option('ss_media_caster') == 4) { $ss_media_caster_e = 'checked="checked"'; }
else if (get_option('ss_media_caster') == 5) { $ss_media_caster_f = 'checked="checked"'; }
else if (get_option('ss_media_caster') == 6) { $ss_media_caster_g = 'checked="checked"'; }
else if (get_option('ss_media_caster') == 7) { $ss_media_caster_h = 'checked="checked"'; }
else { $ss_media_caster_a = ''; $ss_media_caster_b = ''; $ss_media_caster_c = ''; $ss_media_caster_d = ''; $ss_media_caster_e = ''; $ss_media_caster_f = ''; $ss_media_caster_g = ''; $ss_media_caster_h = ''; }
if (get_option('ss_auto_play') == 0) { $ss_auto_play_a = 'checked="checked"'; }
else if (get_option('ss_auto_play') == 1) { $ss_auto_play_b = 'checked="checked"'; }
else { $ss_auto_play_a = ''; $ss_auto_play_b = ''; }
if (get_option('ss_player_center') == 0) { $ss_player_center_a = 'checked="checked"'; }
else if (get_option('ss_player_center') == 1) { $ss_player_center_b = 'checked="checked"'; }
else if (get_option('ss_player_center') == 2) { $ss_player_center_c = 'checked="checked"'; }
else { $ss_player_center_a = ''; $ss_player_center_b = ''; $ss_player_center_c = ''; }
if (get_option('ss_side_stats') == 0) { $ss_side_stats_a = 'checked="checked"'; }
else if (get_option('ss_side_stats') == 1) { $ss_side_stats_b = 'checked="checked"'; }
else { $ss_side_stats_a = ''; $ss_side_stats_b = ''; }
if (get_option('ss_page_stats') == 0) { $ss_page_stats_a = 'checked="checked"'; }
else if (get_option('ss_page_stats') == 1) { $ss_page_stats_b = 'checked="checked"'; }
else { $ss_page_stats_a = ''; $ss_page_stats_b = ''; }
if (get_option('ss_stats') == 0) { $ss_stats_a = 'checked="checked"'; }
else if (get_option('ss_stats') == 1) { $ss_stats_b = 'checked="checked"'; }
else { $ss_stats_a = ''; $ss_stats_b = ''; }
if (get_option('ss_type') == 0) { $ss_type_a = 'checked="checked"'; }
else if (get_option('ss_type') == 1) { $ss_type_b = 'checked="checked"'; }
else { $ss_type_a = ''; $ss_type_b = ''; }
}
// default messages in case there are no custom messages
if (get_option('ss_page_div') != '') {$ss_page_div = get_option('ss_page_div');} else {$ss_page_div = 'background-color: transparent; border: 1px solid #999999; padding:0;';}
if (get_option('ss_heading') != '') {$ss_heading = get_option('ss_heading');} else {$ss_heading = 'h6';}
if (get_option('ss_sheading') != '') {$ss_sheading = get_option('ss_sheading');} else {$ss_sheading = 'h6';}
if (get_option('ss_text_stat_0') != '') {$ss_text_stat_0 = get_option('ss_text_stat_0');} else {$ss_text_stat_0 = 'Stream is';}
if (get_option('ss_text_stat_1') != '') {$ss_text_stat_1 = get_option('ss_text_stat_1');} else {$ss_text_stat_1 = '@';}
if (get_option('ss_text_stat_2') != '') {$ss_text_stat_2 = get_option('ss_text_stat_2');} else {$ss_text_stat_2 = 'Listeners';}
if (get_option('ss_text_stat_3') != '') {$ss_text_stat_3 = get_option('ss_text_stat_3');} else {$ss_text_stat_3 = 'of';}
if (get_option('ss_text_stat_4') != '') {$ss_text_stat_4 = get_option('ss_text_stat_4');} else {$ss_text_stat_4 = 'Peak';}
if (get_option('ss_text_stat_5') != '') {$ss_text_stat_5 = get_option('ss_text_stat_5');} else {$ss_text_stat_5 = 'Stream Title';}
if (get_option('ss_text_stat_6') != '') {$ss_text_stat_6 = get_option('ss_text_stat_6');} else {$ss_text_stat_6 = 'Current Song';}
if (get_option('ss_text_stat_7') != '') {$ss_text_stat_7 = get_option('ss_text_stat_7');} else {$ss_text_stat_7 = 'Stream is currently';}
if (get_option('ss_text_stat_8') != '') {$ss_text_stat_8 = get_option('ss_text_stat_8');} else {$ss_text_stat_8 = 'UP';}
if (get_option('ss_text_stat_9') != '') {$ss_text_stat_9 = get_option('ss_text_stat_9');} else {$ss_text_stat_9 = 'DOWN';}
if (get_option('ss_text_stat_10') != '') {$ss_text_stat_10 = get_option('ss_text_stat_10');} else {$ss_text_stat_10 = '[popup]';}
if (get_option('ss_text_stat_11') != '') {$ss_text_stat_11 = get_option('ss_text_stat_11');} else {$ss_text_stat_11 = 'WINAMP or iTUNES';}
if (get_option('ss_text_stat_12') != '') {$ss_text_stat_12 = get_option('ss_text_stat_12');} else {$ss_text_stat_12 = 'Average Time';}
if (get_option('ss_text_stat_13') != '') {$ss_text_stat_13 = get_option('ss_text_stat_13');} else {$ss_text_stat_13 = 'Available Streams';}
if (get_option('ss_text_stat_14') != '') {$ss_text_stat_14 = get_option('ss_text_stat_14');} else {$ss_text_stat_14 = 'Stats for';}
if (get_option('ss_text_stat_15') != '') {$ss_text_stat_15 = get_option('ss_text_stat_15');} else {$ss_text_stat_15 = 'Recent Songs';}
if (get_option('ss_text_stat_16') != '') {$ss_text_stat_16 = get_option('ss_text_stat_16');} else {$ss_text_stat_16 = 'Recent song history';}
if (get_option('ss_text_stat_17') != '') {$ss_text_stat_17 = get_option('ss_text_stat_17');} else {$ss_text_stat_17 = 'Configuration Error!';}
// OK, let's get the form...
echo '<div class="wrap">';
echo '<h2>Shout Stream Options</h2>';
?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table" style="background-color: #fffffa; border: 1px solid #cccccc; width: 760px;">
<tr valign="center" >
<th scope="row" style="text-align: justify;"><strong>Shout Stream Usage</strong><br />
<small>Before doing anything else please inform Shout Stream WHERE are you gonna use it. If you are gonna use it in a separate page go and create it, publish it and come back to write it's URL else leave blank.</small></th>
<td><span style="font-weight: bold;">&nbsp;&nbsp; As WIDGET <input type="radio" name="ss_usage" value="0" <?php echo $ss_usage_a ?> /></span><br />
<span style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp; In a PAGE <input type="radio" name="ss_usage" value="1" <?php echo $ss_usage_b ?> /></span><br />
<span style="font-weight: bold;">BOTH usages <input type="radio" name="ss_usage" value="2" <?php echo $ss_usage_c ?> /></span>
</td>
<td>
Main Stream Type is: <span style="padding-left:10px; font-weight: bold;">Shoutcast <input type="radio" name="ss_type" value="0" <?php echo $ss_type_a ?> /></span> 
<span style="padding-left:10px; font-weight: bold;">Icecast <input type="radio" name="ss_type" value="1" <?php echo $ss_type_b ?> /></span>
<p></p>
Shout Stream page URL<br />
<input type="text" size="40" name="ss_page" value="<?php echo get_option('ss_page'); ?>" />
</td>
</tr>
</table>
<br />
<table class="form-table" style="background-color: #fffffa; border: 1px solid #cccccc; width: 760px;">
<tr valign="center">
<th scope="row" style="text-align: justify;"><strong>Default Stream</strong><br />
<small>Here is where you gonna set your Default Stream. Fill a Stream Name, IP and Port. Mountpoint are only for icecast streams.</small></th>
<td style="text-align: center;">Stream NAME <br />
<input type="text" size="18" name="ss_streamname" value="<?php echo get_option('ss_streamname'); ?>" /></td>
<td style="text-align: center;">Stream IP or Domain <br />
<input type="text" size="20" name="ss_ipstream" value="<?php echo get_option('ss_ipstream'); ?>" /></td>
<td style="text-align: center;">PORT <br />
<input type="text" size="5" name="ss_portstream" value="<?php echo get_option('ss_portstream'); ?>" /></td>
<td style="text-align: center;">Mountpoint<br />
<input type="text" size="10" name="ss_mountpoint" value="<?php echo get_option('ss_mountpoint'); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row" style="text-align: justify;"><strong>Alternative Streams</strong><br />
<small>If there are any other alternative streams set them here filling each row just like the Default, fill the Name, IP and PORT. <br />Don't leave blank rows between streams and don't leave empty fields if a stream exists. <br />Fill the rows starting from the first one. Remove by leaving a full row blank. Mountpoint are only for icecast streams.</small></th>
<td style="text-align: center;">Stream NAME <br />
<input type="text" size="18" name="ss_name_1" value="<?php echo get_option('ss_name_1'); ?>" /><br />
<input type="text" size="18" name="ss_name_2" value="<?php echo get_option('ss_name_2'); ?>" /><br />
<input type="text" size="18" name="ss_name_3" value="<?php echo get_option('ss_name_3'); ?>" /><br />
<input type="text" size="18" name="ss_name_4" value="<?php echo get_option('ss_name_4'); ?>" /><br />
<input type="text" size="18" name="ss_name_5" value="<?php echo get_option('ss_name_5'); ?>" /><br />
<input type="text" size="18" name="ss_name_6" value="<?php echo get_option('ss_name_6'); ?>" /><br />
<input type="text" size="18" name="ss_name_7" value="<?php echo get_option('ss_name_7'); ?>" /><br />
<input type="text" size="18" name="ss_name_8" value="<?php echo get_option('ss_name_8'); ?>" /><br />
<input type="text" size="18" name="ss_name_9" value="<?php echo get_option('ss_name_9'); ?>" /></td>
<td style="text-align: center;">Stream IP or Domain <br />
<input type="text" size="20" name="ss_ipstream_1" value="<?php echo get_option('ss_ipstream_1'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_2" value="<?php echo get_option('ss_ipstream_2'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_3" value="<?php echo get_option('ss_ipstream_3'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_4" value="<?php echo get_option('ss_ipstream_4'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_5" value="<?php echo get_option('ss_ipstream_5'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_6" value="<?php echo get_option('ss_ipstream_6'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_7" value="<?php echo get_option('ss_ipstream_7'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_8" value="<?php echo get_option('ss_ipstream_8'); ?>" /><br />
<input type="text" size="20" name="ss_ipstream_9" value="<?php echo get_option('ss_ipstream_9'); ?>" /></td>
<td style="text-align: center;">PORT <br />
<input type="text" size="5" name="ss_portstream_1" value="<?php echo get_option('ss_portstream_1'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_2" value="<?php echo get_option('ss_portstream_2'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_3" value="<?php echo get_option('ss_portstream_3'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_4" value="<?php echo get_option('ss_portstream_4'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_5" value="<?php echo get_option('ss_portstream_5'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_6" value="<?php echo get_option('ss_portstream_6'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_7" value="<?php echo get_option('ss_portstream_7'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_8" value="<?php echo get_option('ss_portstream_8'); ?>" /><br />
<input type="text" size="5" name="ss_portstream_9" value="<?php echo get_option('ss_portstream_9'); ?>" /></td>
<td style="text-align: center;">Mountpoint <br />
<input type="text" size="10" name="ss_mountpoint_1" value="<?php echo get_option('ss_mountpoint_1'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_2" value="<?php echo get_option('ss_mountpoint_2'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_3" value="<?php echo get_option('ss_mountpoint_3'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_4" value="<?php echo get_option('ss_mountpoint_4'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_5" value="<?php echo get_option('ss_mountpoint_5'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_6" value="<?php echo get_option('ss_mountpoint_6'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_7" value="<?php echo get_option('ss_mountpoint_7'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_8" value="<?php echo get_option('ss_mountpoint_8'); ?>" /><br />
<input type="text" size="10" name="ss_mountpoint_9" value="<?php echo get_option('ss_mountpoint_9'); ?>" /></td>
</tr>
</table>
<br />
<table class="form-table" style="background-color: #fffffa; border: 1px solid #cccccc; width: 760px;">
<tr valign="center" >
<th scope="row" style="width: 350px; text-align: justify;"><strong>Shout Stream Player</strong><br />
<small>Do you want to enable a player for your stream? And if yes, do you want FFmp3 or Minicaster or Media Player? I suggest you try <strong>FFmp3</strong> since it can be seen in ALL browsers. 
Set Width and Height for the Media player (if chosen). 
Minicaster which has a fixed size of 180x80 pixels. 
FFmp3 comes in four sizes, Tiny:130X60, Small:140X80, Medium:180X80 and Long:240X60 (<em>a custom size could be used BUT ONLY IF you can compile it in haXe, more info on this in Shout Stream website</em>).</small></th>
<td style="text-align: right; padding-right: 30px; font-weight: bold;"> 
No Player <input type="radio" name="ss_media_caster" value="0" <?php echo $ss_media_caster_a ?> /><br />
Media Player <input type="radio" name="ss_media_caster" value="1" <?php echo $ss_media_caster_b ?> /><br />
Minicaster <input type="radio" name="ss_media_caster" value="2" <?php echo $ss_media_caster_c ?> /><br />
Tiny FFmp3 <input type="radio" name="ss_media_caster" value="3" <?php echo $ss_media_caster_d ?> /><br />
Small FFmp3 <input type="radio" name="ss_media_caster" value="4" <?php echo $ss_media_caster_e ?> /><br />
Medium FFmp3 <input type="radio" name="ss_media_caster" value="5" <?php echo $ss_media_caster_f ?> /><br />
Long FFmp3 <input type="radio" name="ss_media_caster" value="6" <?php echo $ss_media_caster_g ?> /><br />
Custom FFmp3 <input type="radio" name="ss_media_caster" value="7" <?php echo $ss_media_caster_h ?> /></td>
<td>Autoplay  &nbsp;
<span style="font-weight: bold;">NO <input type="radio" name="ss_auto_play" value="0" <?php echo $ss_auto_play_a ?> /></span> &nbsp;
<span style="font-weight: bold;">YES <input type="radio" name="ss_auto_play" value="1" <?php echo $ss_auto_play_b ?> /></span> &nbsp;
<br /><br />
Width and Height for Media Player<br />
Width: <input type="text" size="5" name="ss_mpwidth" value="<?php echo get_option('ss_mpwidth'); ?>" /> Height: <input type="text" size="5" name="ss_mpheight" value="<?php echo get_option('ss_mpheight'); ?>" /><br />
<br />
Set Align for your sidebar Player<br />
<span style="font-weight: bold;">Left <input type="radio" name="ss_player_center" value="0" <?php echo $ss_player_center_a ?> /></span> &nbsp;
<span style="font-weight: bold;">Center <input type="radio" name="ss_player_center" value="1" <?php echo $ss_player_center_b ?> /></span> &nbsp;
<span style="font-weight: bold;">Right <input type="radio" name="ss_player_center" value="2" <?php echo $ss_player_center_c ?> /></span>
</td>
</tr>
</table>
<br />
<table class="form-table" style="background-color: #fffffa; border: 1px solid #cccccc; width: 760px;">
<tr valign="center" >
<th scope="row"  style="text-align: justify;"><strong>Shoutcast Stats</strong><br />
<small>Do you want to display Stats for your Default Shoutcast stream? And if you do, do you want them in your sidebar, in your page or both? Recommended method is cURL but if it doesn't work try fsocket, else disable stats. If you also want to enable AJAX live update set the seconds between updates, NO less than 30 sec, 0 means disable live update.</small></th>
<td><span style="font-weight: bold;padding-left:2px;">Disable Sidebar Stats <input type="radio" name="ss_side_stats" value="0" <?php echo $ss_side_stats_a ?> /></span><br />
<span style="font-weight: bold;padding-left:2px;">Enable Sidebar Stats &nbsp;<input type="radio" name="ss_side_stats" value="1" <?php echo $ss_side_stats_b ?> /></span><br />
<br />
<span style="font-weight: bold;padding-left:20px;">Disable Page Stats <input type="radio" name="ss_page_stats" value="0" <?php echo $ss_page_stats_a ?> /></span><br />
<span style="font-weight: bold;padding-left:20px;">Enable Page Stats &nbsp;<input type="radio" name="ss_page_stats" value="1" <?php echo $ss_page_stats_b ?> /></span></td>
<td><span style="padding-left:50px;">Method to fetch Stats</span><span style="padding-left:30px;">Heading Page/Sidebar</span><br />
<span style="padding-left:50px; font-weight: bold;">cURL <input type="radio" name="ss_stats" value="0" <?php echo $ss_stats_a ?> /></span> &nbsp;
<span style="font-weight: bold;">fsocket <input type="radio" name="ss_stats" value="1" <?php echo $ss_stats_b ?> /></span> &nbsp; <span style="padding-left:30px;"><input type="text" size="2" name="ss_heading" value="<?php echo $ss_heading; ?>" /> <input type="text" size="2" name="ss_sheading" value="<?php echo $ss_sheading; ?>" /></span>
<p style="padding:0;margin:0;height: 10px;">&nbsp;</p>
<span style="padding-left:30px;"> Seconds between updates: <input type="text" size="2" name="ss_interval" value="<?php echo get_option('ss_interval'); ?>" /></span>
<p style="padding:0;margin:0;height: 10px;">&nbsp;</p>
<span style="padding-left:20px;">DIV <strong>style</strong> for stats on a page, <strong>NO quotes</strong></span><br />
<input type="text" size="40" name="ss_page_div" value="<?php echo $ss_page_div; ?>" /></td>
</tr>
</table>
<br />
<table class="form-table" style="background-color: #fffffa; border: 1px solid #cccccc; width: 760px;">
<tr valign="center">
<th scope="row" style="text-align: justify;"><strong>Custom Text Messages</strong><br />
<small>And these are all messages that Shout Stream displays as it runs. Change them with your own or let the defaults. Localization is easier that way. Enjoy...</small></th>
<td>
<input type="text" size="20" name="ss_text_stat_0" value="<?php echo $ss_text_stat_0; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_1" value="<?php echo $ss_text_stat_1; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_2" value="<?php echo $ss_text_stat_2; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_3" value="<?php echo $ss_text_stat_3; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_4" value="<?php echo $ss_text_stat_4; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_5" value="<?php echo $ss_text_stat_5; ?>" /><br />
<td>
<input type="text" size="20" name="ss_text_stat_6" value="<?php echo $ss_text_stat_6; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_7" value="<?php echo $ss_text_stat_7; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_8" value="<?php echo $ss_text_stat_8; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_9" value="<?php echo $ss_text_stat_9; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_10" value="<?php echo $ss_text_stat_10; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_11" value="<?php echo $ss_text_stat_11; ?>" /><br />
<td>
<input type="text" size="20" name="ss_text_stat_12" value="<?php echo $ss_text_stat_12; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_13" value="<?php echo $ss_text_stat_13; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_14" value="<?php echo $ss_text_stat_14; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_15" value="<?php echo $ss_text_stat_15; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_16" value="<?php echo $ss_text_stat_16; ?>" /><br />
<input type="text" size="20" name="ss_text_stat_17" value="<?php echo $ss_text_stat_17; ?>" /><br />
</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="ss_streamname,ss_ipstream,ss_portstream,ss_name_1,ss_name_2,ss_name_3,ss_name_4,ss_name_5,ss_name_6,ss_name_7,ss_name_8,ss_name_9,ss_ipstream_1,ss_ipstream_2,ss_ipstream_3,ss_ipstream_4,ss_ipstream_5,ss_ipstream_6,ss_ipstream_7,ss_ipstream_8,ss_ipstream_9,ss_portstream_1,ss_portstream_2,ss_portstream_3,ss_portstream_4,ss_portstream_5,ss_portstream_6,ss_portstream_7,ss_portstream_8,ss_portstream_9,ss_mountpoint,ss_mountpoint_1,ss_mountpoint_2,ss_mountpoint_3,ss_mountpoint_4,ss_mountpoint_5,ss_mountpoint_6,ss_mountpoint_7,ss_mountpoint_8,ss_mountpoint_9,ss_usage,ss_page,ss_type,ss_media_caster,ss_auto_play,ss_mpwidth,ss_mpheight,ss_player_center,ss_side_stats,ss_page_stats,ss_heading,ss_sheading,ss_page_div,ss_interval,ss_stats,ss_text_stat_0,ss_text_stat_1,ss_text_stat_2,ss_text_stat_3,ss_text_stat_4,ss_text_stat_5,ss_text_stat_6,ss_text_stat_7,ss_text_stat_8,ss_text_stat_9,ss_text_stat_10,ss_text_stat_11,ss_text_stat_12,ss_text_stat_13,ss_text_stat_14,ss_text_stat_15,ss_text_stat_16,ss_text_stat_17" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
<?php 
//////////////////////////////
// from this point and below 
// uninstallation proccess
//////////////////////////////
?>
<hr style="color: #CC0000;">
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<h2>Shout Stream Uninstall</h2>
<p style="width: 260px;"><small>This action deletes all Shout Stream values. <strong>ATTENTION: Action cannot be undone.</strong></small></p>
<h4>DELETE SHOUT STREAM VALUES?</h4> 
<p>
<span style="background-color: #008800; color: #ffffff; margin-left: 3px; padding: 10px 30px 10px 30px; border:1px solid #008800; font-weight: bold;"> NO <input type="radio" name="reset_shout_stream" value="NO" checked="checked" /></span> 
<span style="background-color: #CC0000; color: #ffffff; margin-right: 3px; padding: 10px 30px 10px 30px; border:1px solid #CC0000;"><strong> YES </strong> <input type="radio" name="reset_shout_stream" value="YES" /></span>
</p>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="reset_shout_stream" />
<p class="submit" >
<input type="submit" class="button-primary" value="<?php _e('YES, i am SURE, DELETE NOW!') ?>" />
</p>
<p style="width: 260px;"><small>After this step deactivate Shout Stream from plugins menu and delete its folder.</small></p>
</form>

<?php
echo '</div>';
///////// RESETS ALL VALUES /////////////
function reset_shout_stream_options() 
{
delete_option('ss_streamname');
delete_option('ss_ipstream');
delete_option('ss_portstream');
delete_option('ss_mountpoint');
delete_option('ss_name_1');
delete_option('ss_name_2');
delete_option('ss_name_3');
delete_option('ss_name_4');
delete_option('ss_name_5');
delete_option('ss_name_6');
delete_option('ss_name_7');
delete_option('ss_name_8');
delete_option('ss_name_9');
delete_option('ss_ipstream_1');
delete_option('ss_ipstream_2');
delete_option('ss_ipstream_3');
delete_option('ss_ipstream_4');
delete_option('ss_ipstream_5');
delete_option('ss_ipstream_6');
delete_option('ss_ipstream_7');
delete_option('ss_ipstream_8');
delete_option('ss_ipstream_9');
delete_option('ss_portstream_1');
delete_option('ss_portstream_2');
delete_option('ss_portstream_3');
delete_option('ss_portstream_4');
delete_option('ss_portstream_5');
delete_option('ss_portstream_6');
delete_option('ss_portstream_7');
delete_option('ss_portstream_8');
delete_option('ss_portstream_9');
delete_option('ss_mountpoint_1');
delete_option('ss_mountpoint_2');
delete_option('ss_mountpoint_3');
delete_option('ss_mountpoint_4');
delete_option('ss_mountpoint_5');
delete_option('ss_mountpoint_6');
delete_option('ss_mountpoint_7');
delete_option('ss_mountpoint_8');
delete_option('ss_mountpoint_9');
delete_option('ss_usage');
delete_option('ss_page');
delete_option('ss_type');
delete_option('ss_media_caster');
delete_option('ss_auto_play');
delete_option('ss_mpwidth');
delete_option('ss_mpheight');
delete_option('ss_player_center');
delete_option('ss_side_stats');
delete_option('ss_page_stats');
delete_option('ss_page_div');
delete_option('ss_heading');
delete_option('ss_sheading');
delete_option('ss_interval');
delete_option('ss_stats');
delete_option('ss_text_stat_0');
delete_option('ss_text_stat_1');
delete_option('ss_text_stat_2');
delete_option('ss_text_stat_3');
delete_option('ss_text_stat_4');
delete_option('ss_text_stat_5');
delete_option('ss_text_stat_6');
delete_option('ss_text_stat_7');
delete_option('ss_text_stat_8');
delete_option('ss_text_stat_9');
delete_option('ss_text_stat_10');
delete_option('ss_text_stat_11');
delete_option('ss_text_stat_12');
delete_option('ss_text_stat_13');
delete_option('ss_text_stat_14');
delete_option('ss_text_stat_15');
delete_option('ss_text_stat_16');
delete_option('ss_text_stat_17');
// above fields are gonna delete
delete_option('reset_shout_stream');
}
///////// RESETS ALL VALUES /////////////
?>