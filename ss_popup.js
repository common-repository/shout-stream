/*
+----------------------------------------------------------------+
|	WordPress Plugin: Shout Stream            								     |
|	http://deuced.net/shout-stream/        						             |
|	File Information:																	             |
|	- Shout Stream Javascript  POPUP window										     |
|	- wp-content/plugins/shout-stream/ss_popup.js                  |
+----------------------------------------------------------------+
*/
function ss_popup(divname,winName,features,curvalue) 
{ 
  w=window.open('',winName,features);
	w.document.write('<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Popup Window</TITLE></HEAD>');
  var stream_array = new Array();
  stream_array = curvalue.split(' ');
  var ss_popupip = stream_array[1];
  var ss_popupport = stream_array[2];
  var ss_detect = stream_array[3];
  var ss_media_caster = stream_array[4];
  var ss_minipointurl = stream_array[5];
  var ss_minicaster_url = stream_array[6];
  var ss_minicasterurl = stream_array[7];
  var ss_type = stream_array[8];
  var ss_mountpoint = stream_array[9];
  var ss_streamname = stream_array[10];
  var ss_auto_play = stream_array[11];
  var SS_media_player_URLtype = ss_popupip + ':' + ss_popupport + '/' + ss_mountpoint; 
	w.document.write('<BODY bgcolor="#000000" topmargin="15" link="#e8e8e8" vlink="#e8e8e8" alink="#e8e8e8">');
  w.document.write('<div style="text-align: center; line-height: 20px; color: #e8e8e8; text-decoration: none; letter-spacing: 0px; font-weight: bold; font-size: 10px; font-family: verdana;">' + ss_streamname +'</div>');
if ((ss_media_caster == 1) || (ss_detect == 1 && ss_media_caster == 2))
{
  w.document.write('<div style="text-align: center;">');  
 	w.document.write('<object id="MediaPlayer" classid="clsid:6BF52A52-394A-11D3-B153-00C04F79FAA6" standby="Loading Windows Media Player components..." width="240" height="80" type="application/x-oleobject" />');
	w.document.write('<param ref value="http://' + SS_media_player_URLtype + '" name="URL" valuetype="ref" />');
	w.document.write('<param value="1" name="AudioStream" />');
	w.document.write('<param value="0" name="AutoSize" />');
	w.document.write('<param value="' + ss_auto_play + '" name="AutoStart" />');
	w.document.write('<param value="0" name="AnimationAtStart" />');
	w.document.write('<param value="-1" name="AllowScan" />');
	w.document.write('<param value="-1" name="AllowChangeDisplaySize" />');
	w.document.write('<param value="0" name="AutoRewind"/>');
	w.document.write('<param value="0" name="Balance" />');
	w.document.write('<param value name="BaseURL" />');
	w.document.write('<param value="5" name="BufferingTime" />');
	w.document.write('<param value name="CaptioningID" />');
	w.document.write('<param value="-1" name="ClickToPlay" />');
	w.document.write('<param value="0" name="CursorType" />');
	w.document.write('<param value="-1" name="CurrentPosition" />');
	w.document.write('<param value="0" name="CurrentMarker" />');
	w.document.write('<param value name="DefaultFrame" />');
	w.document.write('<param value="0" name="DisplayBackColor" />');
	w.document.write('<param value="16777215" name="DisplayForeColor" />');
	w.document.write('<param value="1" name="DisplayMode" />');
	w.document.write('<param value="1" name="DisplaySize" />');
	w.document.write('<param value="-1" name="Enabled" />');
	w.document.write('<param value="-1" name="EnableContextMenu" />');
	w.document.write('<param value="-1" name="EnablePositionControls" />');
	w.document.write('<param value="-1" name="EnableFullScreenControls" />');
	w.document.write('<param value="-1" name="EnableTracker" />');
	w.document.write('<param value="-1" name="InvokeURLs" />');
	w.document.write('<param value="-1" name="Language" />');
	w.document.write('<param value="0" name="Mute" />');
	w.document.write('<param value="0" name="PlayCount" />');
	w.document.write('<param value="0" name="PreviewMode" />');
	w.document.write('<param value="1" name="Rate" />');
	w.document.write('<param value name="SAMILang" />');
	w.document.write('<param value name="SAMIStyle" />');
	w.document.write('<param value name="SAMIFileName" />');
	w.document.write('<param value="-1" name="SelectionStart" />');
	w.document.write('<param value="-1" name="SelectionEnd" />');
	w.document.write('<param value="-1" name="SendOpenStateChangeEvents" />');
	w.document.write('<param value="-1" name="SendWarningEvents" />');
	w.document.write('<param value="-1" name="SendErrorEvents" />');
	w.document.write('<param value="0" name="SendKeyboardEvents" />');
	w.document.write('<param value="0" name="SendMouseClickEvents" />');
	w.document.write('<param value="0" name="SendMouseMoveEvents" />');
	w.document.write('<param value="-1" name="SendPlayStateChangeEvents" />');
	w.document.write('<param value="0" name="ShowCaptioning" />');
	w.document.write('<param value="-1" name="ShowControls" />');
	w.document.write('<param value="-1" name="ShowAudioControls" />');
	w.document.write('<param value="0" name="ShowDisplay" />');
	w.document.write('<param value="0" name="ShowGotoBar" />');
	w.document.write('<param value="0" name="ShowPositionControls" />');
	w.document.write('<param value="-1" name="ShowStatusBar" />');
	w.document.write('<param value="-1" name="ShowTracker" />');
	w.document.write('<param value="0" name="TransparentAtStart" />');
	w.document.write('<param value="0" name="VideoBorderWidth" />');
	w.document.write('<param value="616614" name="VideoBorderColor" />');
	w.document.write('<param value="-1" name="VideoBorder3D" />');
	w.document.write('<param value="100" name="Volume" />');
	w.document.write('<param value="-1" name="WindowlessVideo" />');
	w.document.write('<embed src="http://' + SS_media_player_URLtype + '" pluginspage="http://port25.technet.com/pages/windows-media-player-firefox-plugin-download.aspx" showstatusbar="1" name="MediaPlayer" autostart="' + ss_auto_play + '" volume="100" type="application/x-ms-wmp" height="80" width="240">');
	w.document.write('</embed>');
	w.document.write('</object>');
  w.document.write('</div>');  
}
else if (ss_detect == 0 && ss_media_caster == 2)
{
  w.document.write('<div style="text-align: center; height: 70px;">');  
	w.document.write('<object id="fmp256" type="application/x-shockwave-flash" data="' + ss_minipointurl + '/plugins/shout-stream/minicaster.swf" width="180" height="70" flashVars="config=' + ss_minicaster_url + 'minicaster.php%3Fminicasterurl%3D' + ss_minicasterurl + '" />');
	w.document.write('<param name="movie" value="' + ss_minipointurl + '/plugins/shout-stream/minicaster.swf" />');
	w.document.write('<param name="wmode" value="transparent" />');
	w.document.write('<param name="allowScriptAccess" value="sameDomain" />');
	w.document.write('<param name="flashVars" value="config=' + ss_minicaster_url + 'minicaster.php%3Fminicasterurl%3D' + ss_minicasterurl + '" />');
	w.document.write('</object>');
  w.document.write('</div>');  
}
else
{
  var ff_streamname = ss_streamname.replace(/&nbsp;/g,'%20');
	if (ss_auto_play == 1) { var ss_auto_play = '&autoplay'; } else { var ss_auto_play = ''; }
	w.document.write('<div id="player" style="border: 0px solid #cc0000; padding-top: 10px; padding-bottom: 10px; background-color: transparent; text-align: center; ">');
	w.document.write('<div style="display:inline-block; border: 0px solid #ffffff; padding: 0; width: 240px; height: 60px; background-color: transparent; background-image:url(\'' + ss_minipointurl + '/plugins/shout-stream/longffmp3.png\'); background-repeat:no-repeat;">');
	w.document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="240" height="60" id="longffmp3">');
	w.document.write('<param name="movie" value="' + ss_minipointurl + '/plugins/shout-stream/longffmp3.swf?url=http%3A%2F%2F' + SS_media_player_URLtype + '&title=' + ff_streamname + ss_auto_play +'" />');
	w.document.write('<param name="wmode" value="transparent" />');
	w.document.write('<param name="allowscriptaccess" value="sameDomain" />');
	w.document.write('<!--[if !IE]>-->');
	w.document.write('<object type="application/x-shockwave-flash" data="' + ss_minipointurl + '/plugins/shout-stream/longffmp3.swf?url=http%3A%2F%2F' + SS_media_player_URLtype + '&title=' + ff_streamname + ss_auto_play +'" width="240" height="60">');
	w.document.write('<param name="wmode" value="transparent" />');
	w.document.write('<param name="allowscriptaccess" value="sameDomain" />');
	w.document.write('<!--<![endif]-->');
	w.document.write('<p style="padding: 0; margin: 0; background-color: #000000; width: 240px; height: 80px; color: #CC0000; font-size: 12px; font-weight: bold; font-family: verdana;" ><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /><br />Flash Player 10 is needed! <br /> Click to Upgrade!</a></p>');
	w.document.write('<!--[if !IE]>-->');  
	w.document.write('</object>');
	w.document.write('<!--<![endif]-->');  
	w.document.write('</object>');
  w.document.write('</div>');  
  w.document.write('</div>');  
}
  w.document.write('<div style="text-align: center; line-height: 20px; color: #e8e8e8; text-decoration: none; letter-spacing: 0px; font-weight: bold; font-size: 10px; font-family: verdana;"><a href="javascript:self.close()">Close Popup</a></div>');
	w.document.write('</BODY></HTML>');
  w.document.close();  
}
/*
+--------------------------------------------------------------------------------+
| The following code was found @ DYNAMIC DRIVE                                   |
| Dynamic Ajax Content- © Dynamic Drive DHTML code library (www.dynamicdrive.com)|
| This notice MUST stay intact for legal use                                     |
| Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code       |
+--------------------------------------------------------------------------------+
*/
var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""
function ssajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}
function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText

}
function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}
/*
+--------------------------------------------------------------------------------+
| The following code is using SWFObject to check flash version                   |
| Less than Flash player 10 requires latest version                              |
+--------------------------------------------------------------------------------+
*/
swfobject.registerObject("tinyffmp3", "10.0.0");
swfobject.registerObject("smallffmp3", "10.0.0");
swfobject.registerObject("mediumffmp3", "10.0.0");
swfobject.registerObject("longffmp3", "10.0.0");
swfobject.registerObject("customffmp3", "10.0.0");