<?php
$ss_ipstream = $_GET['ss_ipstream'];
$ss_portstream = $_GET['ss_portstream'];
$ss_page = $_GET['ss_page'];
$ss_sheading = $_GET['ss_sheading'];
$ss_player_center = $_GET['ss_player_center'];
$ss_stats = $_GET['ss_stats'];
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
$ss_text_stat_12 = $_GET['ss_text_stat_12'];
$ss_text_stat_16 = $_GET['ss_text_stat_16'];
/////////////////////////
// CURL function
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
if ($ss_page != '') { echo '<li><a href="' . $ss_page . '">' . $ss_text_stat_16 . '</a></li>'; }
$nonengtitle = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SS_curl[10] );
echo '<li>' . $ss_text_stat_5 . '<strong>: ' . $nonengtitle . '</strong></li>';
echo '<' . $ss_sheading . ' style="padding: 10px; text-align: ' . $ss_player_center . ';">' . $ss_text_stat_6 . '</' . $ss_sheading . '>';
$nonengsong = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $SSsongname[1] );
if ($nonengsong != '') { echo '<li><strong>' . $nonengsong . '</strong></li>'; }
else { echo '<li><strong>...</strong></li>'; }
}
// CURL function
/////////////////////////
?>