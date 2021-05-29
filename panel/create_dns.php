<?php

$db = new SQLite3("./api/ott.db");
if (isset($_POST["submit"])) {
    $db->exec("INSERT INTO dns(url) VALUES('" . $_POST["b"] . "')");
    header("Location: dns.php");
}
include "includes/header.php";
echo " <!-- Begin Page Content -->\n        <div class=\"container-fluid\">\n\n          <!-- Page Heading -->\n          <h1 class=\"h3 mb-1 text-gray-800\">Server Control</h1>\n         \n          <!-- Content Row -->\n          <div class=\"row\">\n\n            <!-- First Column -->\n            <div class=\"col-lg-12\">\n\n              <!-- Custom codes -->\n                <div class=\"card border-left-primary shadow h-100 card shadow mb-4\">\n                <div class=\"card-header py-3\">\n                <h6 class=\"m-0 font-weight-bold text-primary\"><i class=\"fa fa-server\"></i> Create Server</h6>\n                </div>\n            <div class=\"card-body\">\n                            <form method=\"post\">\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"b\">\n                                        <strong>Dns</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n                                        <input class=\"form-control text-primary\" id=\"b\" name=\"b\" placeholder=\"server.xyz:80\" type=\"text\"/>\n                                    </div>\n\n                                </div>\n                                <div class=\"form-group\">\n                                    <div>\n                                        <button class=\"btn btn-success btn-icon-split\" name=\"submit\" type=\"submit\">\n                        <span class=\"icon text-white-50\"><i class=\"fas fa-check\"></i></span><span class=\"text\">Submit</span>\n                        </button>\n                                    </div>\n\n                                </div>\n                            </form>\n                        </div>\n                    </div>\n                </div>\n\n        </div>\n    </div>\n    <br><br><br>";
include "includes/footer.php";
echo "      </body>\n";

?>