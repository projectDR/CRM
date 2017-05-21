<?php
require_once("../classes/DBWorking_class.php");
$db = new DBWorking_class("project_bd", "Root123");
$statusArray = $db->select("SELECT * FROM application_status", Array());

echo json_encode($statusArray,JSON_UNESCAPED_UNICODE);

?>