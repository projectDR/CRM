<?php
session_start();
$login = $_SESSION["login"];
$fio = $_SESSION["fio"];
$type = $_SESSION["type"];
echo '   
        <form class="form-horizontal" id="loginForm" name="loginForm" method="post"> <fieldset>
        <legend>Профиль пользователя '.$login.'</legend>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">ФИО</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id = "fio" value="'.$fio.'" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="urgency" class="col-sm-3 control-label">Тип сотрудника</label>
            <div class="col-sm-5">
                <select class="form-control" id = "staff" disabled>';

if($type == "t")
echo '
                    <option value="1" selected>Менеджер</option>
                    <option value="0">Исполнитель</option>';
else
    echo '
                    <option value="1">Менеджер</option>
                    <option value="0"selected>Исполнитель</option>';
echo'
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Логин</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id = "login" value="'.$login.'" disabled>
            </div>
        </div>
        <!-- ФИО, никнэйм, тип аккаунта(исполнитель\менеджер) и пароль--> </fieldset> </form>';

if(!isset($_SESSION["fio"]))
    echo "fio is empty";
?>