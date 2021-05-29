<?php

$db = new SQLite3("./api/ott.db");
$message = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>Servers Updated!</h4></div>";
$mess = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>DNS Deleted!</h4></div>";
$res = $db->query("SELECT * \r\n\t\t\t\t  FROM dns \r\n\t\t\t\t  WHERE id='" . $_GET["update"] . "'");
while ($row = $res->fetchArray()) {
    $id = $row["id"];
    $b = $row["url"];
}
if (isset($_POST["submit"])) {
    $db->exec("UPDATE dns SET url='" . $_POST["b"] . "'\r\n\t\t\t\t\t\t  WHERE \r\n\t\t\t\t\t\t\t  id='" . $_POST["id"] . "'");
    header("Location: dns.php?m=" . $message);
}
include "includes/header.php";
echo " <!-- Begin Page Content -->\n        <div class=\"container-fluid\">\n\n";
if (isset($_GET["m"])) {
    echo $_GET["m"];
}
echo "          <!-- Page Heading -->\n          <h1 class=\"h3 mb-1 text-gray-800\"> Server Control</h1>\n\n              <!-- Custom codes -->\n                <div class=\"card border-left-primary shadow h-100 card shadow mb-4\">\n                <div class=\"card-header py-3\">\n                <h6 class=\"m-0 font-weight-bold text-primary\"><i class=\"fa fa-server\"></i> Edit Server</h6>\n                </div>\n                <div class=\"card-body\">\n                        <form method=\"post\">\n                        <div class=\"form control\">\n                                    <label class=\"control-label \" for=\"b\"><strong>\n                                        URL</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input class=\"form-control text-primary\" id=\"b\" name=\"b\"  value=\"" . $b . "\" type=\"text\"/>\n";
echo "     <input class=\"hidden\" id=\"id\" name=\"id\"  value=\"" . $id . "\" type=\"hidden\"/>\n";
echo "                                    </div></br>\n                                    \n                                <div class=\"form-group\">\n                                    <div>\n                                        <button class=\"btn btn-success btn-icon-split\" name=\"submit\" type=\"submit\">\n                        <span class=\"icon text-white-50\"><i class=\"fas fa-check\"></i></span><span class=\"text\">Submit</span>\n                        </button>\n                                    </div>\n\n                                </div>\n                            </form>\n                </div>\n              </div>\n            </div>";
include "includes/footer.php";
echo "</body>\n";

?>