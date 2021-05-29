<?php 
$jsondata = file_get_contents("./includes/eggzie.json");
$data = json_decode($jsondata, true);
$json = $data["info"];
$col = $json["aa"];
$lang = ($json["aa"] == "1" ? "selected" : "");
$lang1 = ($json["aa"] == "2" ? "selected" : "");
$lang2 = ($json["aa"] == "3" ? "selected" : "");
$lang3 = ($json["aa"] == "4" ? "selected" : "");
$lang4 = ($json["aa"] == "5" ? "selected" : "");
$lang5 = ($json["aa"] == "6" ? "selected" : "");
$lang6 = ($json["aa"] == "7" ? "selected" : "");
$lang7 = ($json["aa"] == "8" ? "selected" : "");
$lang8 = ($json["aa"] == "9" ? "selected" : "");
$lang9 = ($json["aa"] == "11" ? "selected" : "");
$lang10 = ($json["aa"] == "12" ? "selected" : "");
$lang11 = ($json["aa"] == "13" ? "selected" : "");
$lang12 = ($json["aa"] == "14" ? "selected" : "");
$message = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>Theme Updated!</h4></div>";
if( isset($_POST["submit"]) ) 
{
    $jsonData = file_get_contents("./includes/eggzie.json");
    $date = date("d-m-Y H:i:s");
    $time = time();
    $egg = base64_encode($date);
    $egg1 = sha1($egg);
    $egg2 = $json["ii"] + 1;
    $arrayData = json_decode($jsonData, true);
    $replacementData = array( "info" => array( "aa" => $_POST["aa"], "bb" => $date, "cc" => $time, "dd" => $egg, "ff" => $egg2, "gg" => $egg1 ) );
    $newArrayData = array_replace_recursive($arrayData, $replacementData);
    $newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
    file_put_contents("./includes/eggzie.json", $newJsonData);
    header("Location: colour.php?message=" . $message);
}

include("includes/header.php");
print " <!-- Begin Page Content -->\n";
print "        <div class=\"container-fluid\">\n";
print "\n";
if( isset($_GET["message"]) ) 
{
    echo $_GET["message"];
}

print "          <!-- Page Heading -->\n";
print "          <h1 class=\"h3 mb-1 text-gray-800\">Colour Changes</h1>\n";
print "         \n";
print "          <!-- Content Row -->\n";
print "          <div class=\"row\">\n";
print "\n";
print "            <!-- First Column -->\n";
print "            <div class=\"col-lg-12\">\n";
print "\n";
print "              <!-- Custom codes -->\n";
print "                <div class=\"card border-left-primary shadow h-100 card shadow mb-4\">\n";
print "                <div class=\"card-header py-3\">\n";
print "                <h6 class=\"m-0 font-weight-bold text-primary\"><i class=\"fa fa-paintbrush\"></i> Colours</h6>\n";
print "                </div>\n";
print "                <div class=\"card-body\">\n";
print "                            <form method=\"post\">\n";
print "\t\t\t\t\t\t\t<div class=\"form-group \">\n";
print "                            <label class=\"control-label requiredField\" for=\"aa\" >\n";
print "                            <strong> Pick Your Colour</strong>\n";
print "                            </label>\n";
print "                            <select class=\"select form-control text-primary\" id=\"select\" name=\"aa\">\n";
print "\t\t\t\t\t\t\t\t<option value=\"1\"" . $lang . ">Purple</option>\n";
print "                                <option value=\"2\"" . $lang1 . ">Blue</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"3\"" . $lang2 . ">Red</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"4\"" . $lang3 . ">Orange</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"13\"" . $lang11 . ">Yellow</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"5\" " . $lang4 . ">Green</option>\n";
print "                                <option value=\"6\"" . $lang5 . ">Teal</option>\n";
print "                                <option value=\"7\"" . $lang6 . ">Cyan</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"8\"" . $lang7 . ">Gray</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"9\"" . $lang8 . ">Dark-Gray</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"14\"" . $lang12 . ">Black</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"11\"" . $lang9 . ">Purple-Black</option>\n";
print "\t\t\t\t\t\t\t\t<option value=\"12\"" . $lang10 . ">Black-Gray</option>\n";
print "                            </select>\n";
print "\t\t\t\t\t\t\t</div>\n";
print "                        <button class=\"btn btn-success btn-icon-split\" name=\"submit\" type=\"submit\">\n";
print "                        <span class=\"icon text-white-50\"><i class=\"fas fa-check\"></i></span><span class=\"text\">Submit</span>\n";
print "                        </button>\n";
print "              </div>\n";
print "            </div>\n";
print "            </div>\n";
print "            </div>\n";
print "            </div>\n";
print "\n";
print "    <br><br><br>";
include("includes/footer.php");
require("includes/egz.php");
print "</body>\n";

