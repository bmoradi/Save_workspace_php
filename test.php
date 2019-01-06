<?php

include_once "Save_workspace.php";

$xx = new Save_workspace_PHP();
$a = 5;
$b = 6;
$a = array("ali");
$xx->delete_workspace();
$xx->save_workspace(get_defined_vars());
//var_dump(get_defined_vars());


//var_export
//$b = var_export($a, true);
//var_dump($b);