<?php
$output = '[';
$db = new SQLite3('./.db.db');
$res = $db->query("SELECT * FROM store");
while ($row = $res->fetchArray()) {
    $added_date = $row['added_date'];
    $description = $row['description'];
    $icon = $row['icon'];
    $app_id = $row['app_id'];
    $name = $row['name'];
    $url = $row['url'];
    $version = $row['version'];
    $version_code = $row['version_code'];
    if(!empty($url))
    {
    $output.='{"added_date":"'.$added_date.'","description":"'.$description.'","icon":"'.$icon.'","id":"'.$app_id.'","name":"'.$name.'","url":"'.$url.'","verison":"'.$version.'","version_code":"'.$version_code.'"},';
    }
}
$x = substr($output, -1);
if($x == ",")
{
    $output=substr_replace($output,"",-1);
}
$output.=']';
echo $output;
?>