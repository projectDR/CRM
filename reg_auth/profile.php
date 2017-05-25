<?php
session_start();
$login = $_SESSION["login"];
echo '        <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/copyright.js"></script>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="../js/other_scripts.js"></script>
    
        <form class="form-horizontal" id="loginForm" name="loginForm" method="post"> <fieldset>
        <legend>Профиль пользователя '.$login.'</legend>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">ФИО</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id = "fio" value="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="urgency" class="col-sm-3 control-label">Тип сотрудника</label>
            <div class="col-sm-5">
                <select class="form-control" id = "staff">
                    <option value="1">Менеджер</option>
                    <option value="0">Исполнитель</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Логин</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id = "login" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Пароль</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id = "password" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Повтор пароля</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id = "password-rep" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 control-label">
                <button class="btn" type="button" id="send_btn1" onclick="add_user()">Отправить</button>
            </div>
        </div>
        <!-- ФИО, никнэйм, тип аккаунта(исполнитель\менеджер) и пароль--> </fieldset> </form>';
?>