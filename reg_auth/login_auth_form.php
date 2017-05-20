<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19.05.17
 * Time: 17:23
 */
if($_POST["type"] == "login")
{
    echo '<form class="form-horizontal" id="loginForm" name="loginForm" method="post"> <fieldset> 
            <legend>Введите данные для входа</legend>
        <div class="form-group">
            <label for="login" class="col-sm-3 control-label">Логин</label>
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
            <div class="col-sm-offset-2">
                <button class="btn" type="button" id="send_btn1" onclick="verify()">Отправить</button>
            </div>
        </div> </fieldset> </form>';
}
else
{
    if(true)
    {
        echo '<form class="form-horizontal" id="loginForm" name="loginForm" method="post"> <fieldset>
        <legend>Форма регистрации</legend>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">ФИО</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id = "fio" required>
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
            <div class="col-sm-offset-2">
                <button class="btn" type="button" id="send_btn1" onclick="add_user()">Отправить</button>
            </div>
        </div>
        <!-- ФИО, никнэйм, тип аккаунта(исполнитель\менеджер) и пароль--> </fieldset> </form>';
    }
}

echo '';
?>