<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <ul class="nav nav-pills">
            <!--Эти ссылки будут выводиться для авторизованного исполнителя -->
            <li><a href="#">Профиль</a></li>
            <li><a href="#application_list" onclick="getApplList('all')">Список заявок</a></li>
            <li><a href="#employees_list" onclick="get_employees_list()">Список исполнителей</a></li>

            <?php
            session_start();
            $login = $_SESSION["login"];
                if(!isset($_SESSION["login"]))
                {
                    echo '<button type="button" class="btn btn-default navbar-btn"
                                    id="log-in-button" onclick="get_reg_auth_form(\'login\')">Войти</button>
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-up-button " onclick="get_reg_auth_form(\'create\')">Зарегестрироваться</button>';
                }
                else {
                    echo '<button type="button" class="btn btn-default navbar-btn"
                                    id="log-in-button" onclick="get_reg_auth_form(\'login\')">Выйти</button>
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-up-button " onclick="get_reg_auth_form(\'create\')">'.$login.'</button>';
                }
            ?>
        </ul>
    </div>
    </nav>
</header>
