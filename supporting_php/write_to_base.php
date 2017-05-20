<?php

    require_once ("../classes/DBWorking_class.php");
    require_once ("../classes/application_class.php");
    $db = new DBWorking_class("project_bd", "Root123");
    $apl = new Application_class(array($_POST["name"], $_POST["brtype"], $_POST["pos"], $_POST["urgency"], $_POST["description"]));

    if($apl->validate())
    {
        $my_query = "INSERT INTO application (client_fio, id_application_types, id_position, urgency,description, id_status) 
VALUES ('$apl->username', $apl->brtype, $apl->position, $apl->urgency, '$apl->description', 1)";

        $db->query($my_query);
        echo $my_query;
    }
    else
        echo "Something is wrong ";
?>