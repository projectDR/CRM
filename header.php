<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <ul class="nav nav-pills">
            <?php
            session_start();
            $login = $_SESSION["login"];
                if(!isset($_SESSION["login"]))
                {
                    echo '<div class="navbar-left">
                            <input type="text" class="navbar-text" id = "applid" placeholder="№ заявки">
                          <button type="submit" class="btn btn-default navbar-btn"
                                    id="log-up-button " 
                                    onclick="get_appl_status()">
                                    Узнать статус</button>
                          </div>
                          
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-in-button" onclick="get_reg_auth_form(\'login\')">Войти</button>
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-up-button " onclick="get_reg_auth_form(\'create\')">Зарегестрироваться</button>';
                }
                else if ($_SESSION["type"]=="f"){
                    echo ' <li><a href="#application_list" onclick="getApplList(\'all\')">Список заявок</a></li>
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-in-button" onclick="log_out()">Выйти</button>
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-up-button " onclick="profile()">'.$login.'</button>';
                }
                else
                    echo '<li><a href="#employees_list" onclick="get_employees_list()">Список исполнителей</a></li>
                          <li><a href="#application_list" onclick="getApplList(\'all\')">Список заявок</a></li>
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-in-button" onclick="log_out()">Выйти</button>
                          <button type="button" class="btn btn-default navbar-btn"
                                    id="log-up-button " onclick="profile()">'.$login.'</button>';
            ?>
        </ul>
    </div>
    </nav>
</header>
