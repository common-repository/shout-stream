<?php
$ss_ipstream = $_GET['ss_ipstream'];
$ss_portstream = $_GET['ss_portstream'];
$ss_streamname = $_GET['ss_streamname'];
$ss_mountpoint = $_GET['ss_mountpoint'];
$ss_text_stat_0 = $_GET['ss_text_stat_0'];
$ss_text_stat_1 = $_GET['ss_text_stat_1'];
$ss_text_stat_2 = $_GET['ss_text_stat_2'];
$ss_text_stat_3 = $_GET['ss_text_stat_3'];
$ss_text_stat_4 = $_GET['ss_text_stat_4'];
$ss_text_stat_5 = $_GET['ss_text_stat_5'];
$ss_text_stat_6 = $_GET['ss_text_stat_6'];
$ss_text_stat_7 = $_GET['ss_text_stat_7'];
$ss_text_stat_8 = $_GET['ss_text_stat_8'];
$ss_text_stat_9 = $_GET['ss_text_stat_9'];
$ss_text_stat_16 = $_GET['ss_text_stat_16'];
$ss_page = $_GET['ss_page'];
$ss_sheading = $_GET['ss_sheading'];
$ss_player_center = $_GET['ss_player_center'];
/////////////////////////
// ICE CURL function
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
echo '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/status.xsl"  target="_blank">' . $ss_text_stat_7 . ' ' . $state . '</a></strong></li>';
                                 } 
else                             {
$state = $ss_text_stat_8;
echo '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/status.xsl"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong> ' . $ss_text_stat_1 . ' <strong>' . $SScurl[$ss_key] . '</strong> kbps</li>';
$ss_key0 = array_search('Current Listeners:', $SScurl); $ss_key0 = ($ss_key0 + 1);
$ss_key1 = array_search('Peak Listeners:', $SScurl); $ss_key1 = ($ss_key1 + 1);
if (($SScurl[$ss_key0] != '') || ($SScurl[$ss_key1] != '')) { 
$SScurl[$ss_key0] = preg_replace ( '/[^0-9]/', ' ', $SScurl[$ss_key0] );
$SScurl[$ss_key1] = preg_replace ( '/[^0-9]/', ' ', $SScurl[$ss_key1] );
echo '<li>' . $ss_text_stat_2 . ': <strong>' . $SScurl[$ss_key0] . '</strong> (' . $ss_text_stat_4 . ': '. $SScurl[$ss_key1] .')</li>'; 
                                                            }
$SS_page_self = 'http://'.($_SERVER['HTTP_HOST']).($_SERVER['REQUEST_URI']); 
if (($ss_page != '') && ($SS_page_self != $ss_page)) { 
echo '<li><a href="' . $ss_page . '">' . $ss_text_stat_16 . '</a></li>'; 
}
echo '<' . $ss_sheading . ' style="padding: 10px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_5 . '</' . $ss_sheading . '>';
$ss_key2 = array_search('Stream Title:', $SScurl); $ss_key2 = ($ss_key2 + 1);
if ($SScurl[$ss_key2] == '') { echo '<li><strong>...</strong>&nbsp;</li>';  }
else  {
$nonengtitle = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl[$ss_key2] );
echo '<li><strong>' . $nonengtitle . '</strong></li>';
      }
echo '<' . $ss_sheading . ' style="padding: 10px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_6 . '</' . $ss_sheading . '>';
$ss_key3 = array_search('Current Song:', $SScurl); $ss_key3 = ($ss_key3 + 1);
//if ($SScurl[$ss_key3] == '') { $ss_key3 = array_search('Current Track:', $SScurl); $ss_key3 = ($ss_key3 + 1);}
if ($SScurl[$ss_key3] == '') { echo '<li><strong>...</strong>&nbsp;</li>';  }
else  {
$nonengsong = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SScurl[$ss_key3] );
echo '<li><strong>' . $nonengsong . '</strong>&nbsp;</li>'; 
      }
                                 } 
// ICE CURL function
/////////////////////////
?>