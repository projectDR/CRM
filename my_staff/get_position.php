<?php
    require_once ("../classes/DBWorking_class.php");

    $db = new DBWorking_class("project_bd", "Root123");
    $arr = array();

    if(!empty($_GET['depID']))
    {
        $values = $db->select('SELECT id, position_name FROM position WHERE id_departments='.$_GET['depID']);
        foreach ($values as $item)
        {
            $temp = array("id" => $item[0], "name" => $item[1]);
            array_push($arr,$item);
        }
        echo json_encode($arr);
    }
    else
        echo json_encode("Пхп наговнил");
?>