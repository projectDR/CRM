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



$html = '<form class = "form-horizontal">
                <h1 class="h1">Форма заявки</h1>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Фамилия Имя Отчество</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id = "username" readonly>
                    </div>
                </div>
            <div class="form-group">
                <label for="department" class="col-sm-3 control-label">Отдел</label>
                     <div class="col-sm-7">
                            <input type="text" class="form-control" id = "department" readonly>
                     </div>
            </div>
            <div class="form-group">
                <label for="position" class="col-sm-3 control-label">Должность</label>
                      <div class="col-sm-7">
                            <input type="text" class="form-control"  id = "position" readonly>
                      </div>
            </div>
            <div class="form-group">
                <label for="brtype" class="col-sm-3 control-label">Тип заявки</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"  id = "brtype" readonly>
                        </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Описание проблемы</label>
                <div class="col-sm-7">
                    <textarea class="form-control" rows="10" id = "description" readonly></textarea>
                </div>
            </div>
                <div class="form-group">
                    <label for="urgency" class="col-sm-3 control-label">Срочность</label>
                    <div class="col-sm-7">
                        <div class="oval" id="urgency"></div>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-sm-offset-3">
                    <button class="btn" type="submit">Принять заявку</button>
                </div>
            </div>
            </form> ';


echo json_encode(array("values"=>$result[0],"appl_form"=>$html),JSON_UNESCAPED_UNICODE);
?>