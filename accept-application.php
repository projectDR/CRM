<?php
require_once ("classes/DBWorking_class.php");

if(!empty($_POST["ID"]))
{
    $db = new DBWorking_class("project_bd", "Root123");
    if($_POST["type"]==true)
    {
        $db->insert( 'update application set id_employees= (select e.id from employee e where nickname =\''.$_POST["NICKNAME"].'\'), id_status = \''.$_POST["status"].'\'where application.id ='.$_POST["ID"]);
    }
    else $db->insert( 'update application set id_employees= (select e.id from employee e where nickname =\''.$_POST["NICKNAME"].'\'), id_status = 3 where application.id ='.$_POST["ID"]);
}
?>