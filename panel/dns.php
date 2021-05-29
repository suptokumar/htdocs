<?php/

$db = new SQLite3("./api/ott.db");
$message = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>Servers Updated!</h4></div>";
$mess = "<div class=\"alert alert-primary\" id=\"flash-msg\"><h4><i class=\"icon fa fa-check\"></i>DNS Deleted!</h4></div>";
$db->exec("CREATE TABLE IF NOT EXISTS dns(id INTEGER PRIMARY KEY NOT NULL,url VARCHAR(50))");
$res = $db->query("SELECT * FROM dns");
if (isset($_GET["delete"])) {
    $db->exec("DELETE FROM dns WHERE id=" . $_GET["delete"]);
    header("Location: dns.php?m=" . $mess);
}
include "includes/header.php";
echo "\r\n\r\n\t\r\n<div class=\"modal fade\" id=\"confirm-delete\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">\r\n    <div class=\"modal-dialog\">\r\n        <div class=\"modal-content\">\r\n            <div class=\"modal-header\">\r\n                <h2>Confirm</h2>\r\n            </div>\r\n            <div class=\"modal-body\">\r\n                Do you really want to delete?\r\n            </div>\r\n            <div class=\"modal-footer\">\r\n                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>\r\n                <a class=\"btn btn-danger btn-ok\">Delete</a>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n<main role=\"main\" class=\"col-15 pt-4 px-5\"><div class=\"row justify-text-center\"><div class=\"chartjs-size-monitor\" style=\"position:absolute ; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;\"><div class=\"chartjs-size-monitor-expand\" style=\"position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;\"><div style=\"position:absolute;width:1000000px;height:1000000px;left:0;top:0\"></div></div><div class=\"chartjs-size-monitor-shrink\" style=\"position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;\"><div style=\"position:absolute;width:200%;height:200%;left:0; top:0\"></div></div></div>\r\n          <div id=\"main\">\r\n            \r\n\r\n          <!-- Page Heading -->\r\n          <h1 class=\" h3 mb-1 text-gray-800\"> User Dashboard</h1>\r\n                        <a button class=\"btn btn-success btn-icon-split\" id=\"button\" href=\"./create_dns.php\">\r\n                        <span class=\"icon text-white-50\"><i class=\"fas fa-check\"></i></span><span class=\"text\">Create</span>\r\n                        </button></a>\r\n          </div>\r\n\t\t<div class=\"table-responsive\">\r\n\t\t\t<table class=\"table table-striped table-sm\">\r\n\t\t\t<thead class= \"text-primary\">\r\n\t\t\t\t<tr>\t\t\t\t  \r\n                  <th>URL</th>\r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t  <th>Edit</th>\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\t  <th>Delete</th>\r\n                </tr>\r\n              </thead>\r\n\t\t\t";
while ($row = $res->fetchArray()) {
    echo "              <tbody class=\" text-primary\">  \t\t  \r\n                  <td>";
    echo $row["url"];
    echo "</td>\r\n                  <td><a class=\"btn btn-warning btn-icon-split\" href=\"./update_dns.php?update=";
    echo $row["id"];
    echo "\"><span class=\"icon text-white-50\"><i class=\"fa fa-pen\" ></i></span></a></td>\r\n                  <td><a class=\"btn btn-danger btn-icon-split\" href=\"#\" data-href=\"./dns.php?delete=";
    echo $row["id"];
    echo "\" data-toggle=\"modal\" data-target=\"#confirm-delete\"><span class=\"icon text-white-50\"><i class=\"fa fa-trash\"></i></span></a></td>\r\n\t\t\t\t</tr>\r\n\t\t\t</tbody>\r\n\t\t\t";
}
echo "\t\t\t</table>\r\n\t\t</div>\r\n</main>\r\n\r\n    <br><br><br>\r\n";
include "includes/footer.php";
echo "    <script>\r\n\$('#confirm-delete').on('show.bs.modal', function(e) {\r\n    \$(this).find('.btn-ok').attr('href', \$(e.relatedTarget).data('href'));\r\n});\r\n    </script>\r\n</body>\r\n\r\n</html>";

?>