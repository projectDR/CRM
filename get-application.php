<?php

require_once("classes/DBWorking_class.php");
$db = new DBWorking_class("project_bd", "Root123");

$result = $db->query("select urgency,client_fio, department_name, position_name, at.appl_type_name,  a.description
                            from application a join application_type at
                            on a.id_application_types = at.id
                            join position p
                            on a.id_position = p.id
                            join department d
                            on p.id_departments = d.id
                            where a.id = ".$_POST['ID']
                    );
echo json_encode($result[0],JSON_UNESCAPED_UNICODE);
?>