<?php 
$frm = file_get_contents("http://ahdesigns.xyz/TESTER/FC/t2/fiver/api/control.php");
print_r(json_decode($frm));
?>