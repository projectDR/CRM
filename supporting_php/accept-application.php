<?php
require_once ("../classes/DBWorking_class.php");

if(!empty($_POST["ID"]))
{
    $db = new DBWorking_class("project_bd", "Root123");
    if($_POST["type"]==true)
    {
        $db->query( 'update application set id_employees= 
(select e.id from employee e where nickname =$1), id_status = $2 where application.id = $3',
            Array($_POST["NICKNAME"], $_POST["status"], $_POST["ID"]));
    }
    else $db->query( 'update application set id_employees= 
(select e.id from employee e where nickname =$1), id_status = 3 where application.id =$2',
        Array($_POST["NICKNAME"], $_POST["ID"]));
}
?>