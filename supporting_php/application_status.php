<?php
require_once ("../classes/application_class.php");
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.06.17
 * Time: 11:47
 */
if(!isset($_POST["applid"]))
{
    die("you failed");
}
$id = $_POST["applid"];
$result = Application_class::get_status($id);
if(!$result)
{
    die("Такой заявки не существует");
}
switch ($result[4])
{
    case "0" : $urgency = "Высокая"; break;
    case "1" : $urgency = "Средняя"; break;
    case "2" : $urgency = "Низкая"; break;
}
echo '
    <form class = "form-horizontal">
    <h1 class="h1">Статус заявки</h1>
    <div class="form-group">
        <label for="applnum" class="col-sm-3 control-label">Номер заявки</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "applnum" value="'.$result[0].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="status" class="col-sm-3 control-label">Статус</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "status" value="'.$result[6].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="cons" class="col-sm-3 control-label">Исполнитель</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "cons" value="'.$result[7].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="fio" class="col-sm-3 control-label">ФИО заявителя</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "fio" value="'.$result[1].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="type" class="col-sm-3 control-label">Тип заявки</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "type" value="'.$result[2].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="position" class="col-sm-3 control-label">Должность заявителя</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "position" value="'.$result[3].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="urgency" class="col-sm-3 control-label">Срочность</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "urgency" value="'.$urgency.'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-5">
            <textarea class="form-control" rows="10" id = "description" disabled>'.$result[5].'</textarea>
        </div>
    </div>
</form>';
?>