<?php
$db = new SQLite3('./.db.db');
$res = $db->query("SELECT * FROM rss WHERE id='1'");
$row = $res->fetchArray();
$title = $row['title'];
$description = $row['description'];
$output='{"title": "'.$title.'","description": "'.$description.'"}';
echo $output;
?>