<?php

require_once ("../classes/DBWorking_class.php");
require_once ("../classes/application_class.php");



$name = htmlspecialchars($_POST["name"]);
$description = htmlspecialchars($_POST["description"]);

$db = new DBWorking_class("project_bd", "Root123");
$apl = new Application_class(array($_POST["name"], $_POST["brtype"], $_POST["pos"], $_POST["urgency"], $_POST["description"]));

if($apl->validate())
{
    $my_query = "INSERT INTO application (client_fio, id_application_types, id_position, urgency,description, id_status) 
VALUES ($1, $2, $3, $4, $5, 1)";

    $db->query($my_query,Array($apl->username, $apl->brtype, $apl->position, $apl->urgency, $apl->description));
    $res = $db->select("SELECT MAX(id) FROM application",[]);
    echo $res[0][0]." номер";
    //echo $my_query;
}
else
    echo "Something is wrong ";
?>