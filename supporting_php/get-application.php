<?php

require_once("../classes/DBWorking_class.php");
session_start();
$db = new DBWorking_class("project_bd", "Root123");

$result = $db->select("select urgency,client_fio, department_name, position_name, at.appl_type_name,  a.description, a.id_status, e.nickname
			    from employee e right join application a 
			    on e.id = a.id_employees
			    join application_type at
                            on a.id_application_types = at.id
                            join position p
                            on a.id_position = p.id
                            join department d
                            on p.id_departments = d.id
                            where a.id = $1", Array($_POST["ID"])
                    );

$html = '<form class = "form-horizontal">
                <h1 class="h1">Форма заявки</h1>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Фамилия Имя Отчество</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id = "username" readonly value="'.$result[0][1].'">
                    </div>
                </div>
            <div class="form-group">
                <label for="department" class="col-sm-3 control-label">Отдел</label>
                     <div class="col-sm-7">
                            <input type="text" class="form-control" id = "department" readonly value="'.$result[0][2].'">
                     </div>
            </div>
            <div class="form-group">
                <label for="position" class="col-sm-3 control-label">Должность</label>
                      <div class="col-sm-7">
                            <input type="text" class="form-control"  id = "position" readonly value="'.$result[0][3].'">
                      </div>
            </div>
            <div class="form-group">
                <label for="brtype" class="col-sm-3 control-label">Тип заявки</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"  id = "brtype" readonly value="'.$result[0][4].'">
                        </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Описание проблемы</label>
                <div class="col-sm-7">
                    <textarea class="form-control" rows="10" id = "description" readonly >'.$result[0][5].'</textarea>
                </div>
            </div>
             <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Тип заявки</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="status">
                               <option value="1">Создана</option>
                               <option value="2">Назначена</option>
                               <option value="3">Выполняется</option>
                               <option value="4">Выполнена</option>
                               <option value="5">Отменена</option>
                            </select>
                        </div>
            </div>
                <div class="form-group">
                    <label for="urgency" class="col-sm-3 control-label">Срочность</label>
                    <div class="col-sm-7">
                        <div class="oval" id="urgency"></div>
                    </div>
                </div>';
    if ($_SESSION["type"]=="t")
    {
        $html.=    '<div class="form-group">
                <label for="employees" class="col-sm-3 control-label">Исполнитель</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="employees">';

        $employee = $db->select("select * from employee e where e.employee_type=false", Array());
        foreach ($employee  as $item)
        {
            $html.='<option value="'.$item[3].'">'.$item[1].'</option>';
        }

        $html.=                    '</select>
                        </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3">
                    <button class="btn" type="submit" onclick="accept_appl('.$_POST["ID"].')">Назначить заявку</button>
                </div>
                <div class="col-sm-offset-3">
                    <button class="btn" type="submit" onclick="change_appl_status(' .$_POST["ID"]. ')">Изменить статус заявки</button>
                </div>
            
            </div>
            </form> ';
    }
    else {

            $html .= '<div class="form-group">
                <div class="col-sm-offset-3">
                    <button class="btn" type="submit" onclick="accept_appl('.$_POST["ID"].',\''.$_SESSION["login"].'\')">Принять заявку</button>
                </div>
                <div class="col-sm-offset-3">
                    <button class="btn" type="submit" onclick="change_appl_status('.$_POST["ID"].',\''.$_SESSION["login"].'\')">Изменить статус заявки</button>
                </div>
            
            </div>
            </form> ';
        }


echo json_encode(array("values"=>$result[0],"appl_form"=>$html),JSON_UNESCAPED_UNICODE);
?>

