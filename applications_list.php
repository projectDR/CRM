<?php
require_once("classes/DBWorking_class.php");
$db = new DBWorking_class("project_bd", "Root123");
$result = $db->query("select a.id, urgency, department_name, at.appl_type_name
                            from application a join application_type at
                            on a.id_application_types = at.id 
                            join position p 
                            on a.id_position = p.id
                            join department d 
                            on p.id_departments = d.id
");
foreach ($result as $item)
{
    if($item[1]==0)
        echo "<div class='appl_link'><a onclick='getApplication(\"$item[0]\")' class='open_modal_link' ><div class=\"circle\" style=\"background-color:red\"></div>  $item[2] $item[3]</a></div>>";
    else if ($item[1]==1)
        echo "<div class='appl_link'> <a  onclick='getApplication(\"$item[0]\")' class='open_modal_link' ><div class=\"circle\" style=\"background-color:yellow\"></div>  $item[2] $item[3]</a></div>";
    else echo "<div class='appl_link'> <a  onclick='getApplication(\"$item[0]\")' class='open_modal_link' ><div class=\"circle\" style=\"background-color:green\"></div>  $item[2] $item[3]</a></div>";
}
?>