<?php
$ss_ipstream = $_GET['ss_ipstream'];
$ss_portstream = $_GET['ss_portstream'];
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
$ss_heading = $_GET['ss_heading'];
/////////////////////////
// FSOCKOPEN function
$open = fsockopen($ss_ipstream,$ss_portstream,$errno,$errstr,5);
// check stream connection --> WP2.5
if (!$open) { echo '<ul><li><font color="#CC0000"><strong>STREAM CONNECT FAILED</strong></font> <br />error N: ' . $errno . '<br />Check <IP>:<port> configuration</li></ul>'; }
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
echo '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong></li>';
}
else if ($ss_text_stat_8 == $state)
{
echo '<li><strong><a href="http://' . $ss_ipstream . ':' . $ss_portstream . '/"  target="_blank">' . $ss_text_stat_0 . ' ' . $state . '</a></strong> ' . $ss_text_stat_1 . ' <strong>' . $text[5] . '</strong> kbps</li>';
echo '<li>' . $ss_text_stat_2 . ': <strong>' . $text[0] . '</strong> ' . $ss_text_stat_3 . ' <strong>' . $text[3] . '</strong> (' . $ss_text_stat_4 . ': ' . $text[2] . ')</li>';
echo '<' . $ss_heading . ' style="padding: 10px;">' . $ss_text_stat_6 . '</' . $ss_heading . '>'; 
$nonengsong = preg_replace ( '/[^a-zA-Z0-9]/', ' ', $text[6] );
$nonengsong = preg_replace ( '/html/', ' ', $nonengsong );
$nonengsong = preg_replace ( '/body/', ' ', $nonengsong );
echo '<li><strong>' . $nonengsong . '</strong>	&nbsp;</li>';
}
    fclose($open);
     }
// FSOCKOPEN function
/////////////////////////
?>