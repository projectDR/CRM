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
        <label for="username" class="col-sm-3 control-label">Номер заявки</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" value="'.$result[0].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Статус</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" value="'.$result[6].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">ФИО заявителя</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" value="'.$result[1].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Тип заявки</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" value="'.$result[2].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Должность заявителя</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" value="'.$result[3].'" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Срочность</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username" value="'.$urgency.'" disabled>
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