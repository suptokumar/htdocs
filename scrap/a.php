<?php 
include 'simple_html_dom.php';
error_reporting(1);
$strJsonFileContents = file_get_contents("a.json");
$array = json_decode($strJsonFileContents, true);
	foreach ($array['events'] as $k => $v) {
		if (isset($v['page_search_term'])) {
if($html = file_get_html("https://images.search.yahoo.com/search/images;_ylt=Awr9Jnkziq5g9QgAHcSJzbkF;_ylu=c2VjA3NlYXJjaARzbGsDYnV0dG9u;_ylc=X1MDOTYwNjI4NTcEX3IDMgRhY3RuA2NsawRjc3JjcHZpZANMUjhpdWpFd0xqSXcuMXdCWUs1MW1BcEFNVEUyTGdBQUFBQkVUZU16BGZyA3NmcARmcjIDc2EtZ3AEZ3ByaWQDT2VfeV9VUlpUYy4xMTVzMXNsVEFPQQRuX3N1Z2cDMTAEb3JpZ2luA2ltYWdlcy5zZWFyY2gueWFob28uY29tBHBvcwMwBHBxc3RyAwRwcXN0cmwDBHFzdHJsAzUEcXVlcnkDc3VwdG8EdF9zdG1wAzE2MjIwNTEzOTI-?p=".str_replace(" ", "+", $v['page_search_term'])."&fr=sfp&fr2=sb-top-images.search&ei=UTF-8&n=60&x=wrt")){
foreach ($html->find("img") as $key => $img) {
	if ($img->src!='/images/branding/searchlogo/1x/googlelogo_desk_heirloom_color_150x55dp.gif') {
		echo $img;
	// $image = file_get_contents();
// 	$name = "../images/".time().rand().".jpg";

// 	$myfile = fopen("images/".$name, "w") or die("Unable to open file!");
// fwrite($myfile, $image);
// fclose($myfile);
	}
echo "Doing...<br>";
};
}
}
	}

 ?>