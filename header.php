<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <ul class="nav nav-pills">
            <!--Эти ссылки будут выводиться для авторизованного исполнителя -->
            <li><a href="#">Профиль</a></li>
            <li><a href="#application_list" onclick="getApplList('all')">Список заявок</a></li>
        <button type="button" class="btn btn-default navbar-btn"
                id="log-in-button" onclick="get_reg_auth_form('login')">Войти</button>
        <button type="button" class="btn btn-default navbar-btn"
                id="log-up-button " onclick="get_reg_auth_form('create')">Зарегестрироваться</button>
        </ul>
    </div>
    </nav>
</header>