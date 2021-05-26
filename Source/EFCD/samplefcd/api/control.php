<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$lurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER["PHP_SELF"]);
$output='Ian'; $db = new SQLite3('./.db.db');

$res = $db->query("SELECT * FROM control WHERE id='1'");
$row = $res->fetchArray();
//$status = $row['status'];
$backgroundColor = $row['backgroundColor'];
$version = $row['version'];
//$apk = $row['apk'];
$host = $row['host'];
$hosts_url = $row['hosts_url'];
$hosts_name = $row['hosts_name'];
$hosts2_url = $row['hosts2_url'];
$hosts2_name = $row['hosts2_name'];
$hosts3_url = $row['hosts3_url'];
$hosts3_name = $row['hosts3_name'];
$output ='{"status": "active", "backgroundColor": "'.$backgroundColor.'", "version": "'.$version.'", "apk": "", "host": "'.$host.'", "host_urls": [{"name":"'.$hosts_name.'", "url":"'.$hosts_url.'"},{"name":"'.$hosts2_name.'", "url":"'.$hosts2_url.'"},{"name":"'.$hosts3_name.'", "url":"'.$hosts3_url.'"}],"rss": "'.$lurl.'/rss.php", "addons": "'.$lurl.'/addons.php", "storeConfig": "'.$lurl.'/store.php", "icons": ';

$res = $db->query("SELECT * FROM laf WHERE id='1'");
$row = $res->fetchArray();
$live = $row['live'];
$logo = $row['logo'];
$banner = $row['banner'];
$banner2 = $row['banner2'];
$banner3 = $row['banner3'];
$banner4 = $row['banner4'];
$banner5 = $row['banner5'];
$catchup = $row['catchup'];
$movie = $row['movie'];
$series = $row['series'];
$settings = $row['settings'];
$background = $row['background'];
$netflix = $row['netflix'];
$youtube = $row['youtube'];
$playstore = $row['playstore'];
$settings2 = $row['settings2'];
$appdrawer = $row['appdrawer'];
$output.='{"live": "'.$live.'","logo": "'.$logo.'","banner": "'.$banner.'","banner2": "'.$banner2.'","banner3": "'.$banner3.'","banner4": "'.$banner4.'","banner5": "'.$banner5.'","catchup": "'.$catchup.'","movie": "'.$movie.'","series": "'.$series.'","settings": "'.$settings.'","background": "'.$background.'","netflix": "'.$netflix.'","youtube": "'.$youtube.'","playstore": "'.$playstore.'","settings2": "'.$settings2.'","appdrawer": "'.$appdrawer.'"}}';
echo $output;
?>