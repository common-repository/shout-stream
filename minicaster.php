<?php
$minicasterurl = $_GET['minicasterurl'];
$minicasterurl = explode('@', $minicasterurl);
$website = $_SERVER['SERVER_NAME'];
echo '<?xml version="1.0" encoding="utf-8" ?>';
?>
<config version="1T" xmlns="http://www.draftlight.net/dnex/config/ns/1T/">
<mp3cast>
<?php if ( $minicasterurl[3] != '' ) { ?>
  <mount>http://<?php echo $minicasterurl[0] ?>:<?php echo $minicasterurl[1] ?>/<?php echo $minicasterurl[3] ?></mount>
<?php } else if ( $minicasterurl[3] == '' ) { ?>
  <mount>http://<?php echo $minicasterurl[0] ?>:<?php echo $minicasterurl[1] ?>/;</mount>
<?php } ?>
  <website>http://<?php echo $website; ?>/</website>
  <title><?php echo $minicasterurl[2] ?></title>
</mp3cast>
<init autoplay="<?php echo $minicasterurl[4] ?>" volume="100" reload="10" xfade="1" />
</config>