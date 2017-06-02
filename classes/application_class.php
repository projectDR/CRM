<?php
require_once ("DBWorking_class.php");
class Application_class
{
    public $username, $department, $position, $brtype, $urgency, $description;

    function __construct($data)
    {
        $this->username = isset($data[0]) ? $data[0] : "guest";
        $this->brtype = isset($data[1]) ? $data[1] : null;
        $this->position = isset($data[2]) ? $data[2] : null;
        $this->urgency = isset($data[3]) ? $data[3] : null;
        $this->description = isset($data[4]) ? $data[4] : "";
    }

    function validate()
    {
        $rus_pattern = "^[А-яЁё\s]{3,}$";

        return !empty($this->username) && !empty($this->position) && !empty($this->brtype) && mb_ereg_match($rus_pattern, $this->username);
    }

    public static function get_status($id)
    {
        $db = new DBWorking_class("project_bd", "Root123");
        /*$appl = $db->select("SELECT * FROM application WHERE id=$1",[$id]);
        $appl_tp = $db->select("SELECT appl_type_name FROM application_type WHERE id=$1", [$appl[0][2]]);
        $position = $db->select("SELECT position_name FROM position WHERE id=$1", [$appl[0][3]]);*/
        $appl = $db->select("SELECT a.id, a.client_fio, aty.appl_type_name, pos.position_name, a.urgency, 
                                      a.description, ast.status_name, e.employee_name
                                    FROM application a 
                                    join application_type aty on a.id_application_types=aty.id
                                    join position pos on a.id_position=pos.id
                                    join application_status ast on a.id_status=ast.id
                                    left join employee e on a.id_employees = e.id
                                    WHERE a.id=$1", [$id]);
        return $appl[0];
    }
}