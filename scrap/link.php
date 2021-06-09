<?php 
include 'simple_html_dom.php';
$moni = "dance";
$j = 1;
for ($i=0; $i < 100000; $i++) { 
	if ($i==0) {
	$google = file_get_html("https://search.yahoo.com/search?p=$moni&fr=yfp-t&ei=UTF-8&fp=1");
	}else{
	$google = file_get_html("https://search.yahoo.com/search?p=$moni&fr=yfp-t&ei=UTF-8&fp=1&pstart=".($i+1));

	}

foreach ($google->find(".title a") as $key => $value) {
	echo $j.". ".$value->href."<br><br><br>";
	$j++;
}
}