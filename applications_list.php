<?php
require_once("classes/DBWorking_class.php");
$db = new DBWorking_class("project_bd", "Root123");
$result = $db->select("select a.id, urgency, department_name, at.appl_type_name,aps.status_name
                            from application_status aps join application a 
                            on a.id_status = aps.id
                            join application_type at
                            on a.id_application_types = at.id 
                            join position p 
                            on a.id_position = p.id
                            join department d 
                            on p.id_departments = d.id
");
foreach ($result as $item)
{
    if($item[1]==0)
        echo "<div class='appl_link' onclick='getApplication(\"$item[0]\")'>
                   <div class='appl_info'>
                        <div class=\"circle\" style=\"background-color:red\"></div>  $item[2] $item[3]
                   </div> 
                   <div class='appl_status'>$item[4]</div>
              </div>";
    else if ($item[1]==1)
        echo "<div class='appl_link' onclick='getApplication(\"$item[0]\")' > 
                   <div class='appl_info'>
                        <div class=\"circle\" style=\"background-color:yellow\"></div>  $item[2] $item[3]
                   </div>  
                   <div class='appl_status'> $item[4]</div>
              </div>";
    else echo "<div class='appl_link' onclick='getApplication(\"$item[0]\")' > 
                   <div class='appl_info'>
                        <div class=\"circle\" style=\"background-color:green\"></div>  $item[2] $item[3]
                   </div> 
                   <div class='appl_status'>$item[4]</div>
               </div>";
}
?>