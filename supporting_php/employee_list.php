<?php
require_once("../classes/DBWorking_class.php");
$db = new DBWorking_class("project_bd", "Root123");

$result = $db->select("select a.id_application_types, at.appl_type_name, a.id_employees,e.employee_name, count(a.id_application_types) 
                            from application_status aps join application a 
                            on a.id_status = aps.id
                            join application_type at
                            on a.id_application_types = at.id
                            join employee e
                            on a.id_employees = e.id
                            where a.id_status = 4
                            group by  e.employee_name,at.appl_type_name, a.id_application_types, a.id_employees", Array());

$appl_type = $db->select("select * from application_type a", Array());
$employee = $db->select("select * from employee e", Array());


$table = "<div class='employees'><table>";

$tr.= "<tr><th >Тип поломки\Исполнитель</th>";
for ($j=0; $j< count($employee); $j++) {
    $tr.="<th class='tab_head'>".$employee[$j][1]."</th>";
}
$tr.= "</tr>";
for ($i =0; $i< count($appl_type); $i++)
{
    $tr.="<tr id=><td>".$appl_type[$i][1]."</td>";
    for ($j=0; $j< count($employee); $j++)
    {
        $tr.="<td id='".$appl_type[$i][0].$employee[$j][0]."'></td>";
    }
    $tr.="</tr>";
}

$table.=$tr;
$table.="</table></div>";

echo json_encode(array("values"=>$result,"employee_table"=>$table),JSON_UNESCAPED_UNICODE);
?>


