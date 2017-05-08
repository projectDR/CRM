<?php
require_once ("../classes/DBWorking_class.php");
    $db = new DBWorking_class("project_bd", "Root123");

    if(!empty($_POST["com"]))
    {
        $db->insert($_POST["com"]);
        echo $_POST["com"];
    }
    else
        echo "Something is wrong";
?>