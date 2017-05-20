<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/copyright.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/other_scripts.js"></script>
</head>
    <body>
    <?php include('header.php')?>
    <div class="it-asist"></div>
    <section>
        <article>
            <form> <!--Будет выводиться авторизованным пользователям -->
                <div class='switches'>
                    <select name="appls_type">
                        <option value="all" selected="selected">Все заявки </option>
                        <option value="1"> Созданные заявки </option>
                        <option value="2"> Назначенные заявки </option>
                        <option value="3"> Выполняемые заявки </option>
                        <option value="4"> Выполненные заявки </option>
                        <option value="5"> Отмененные заявки </option>
                    </select>
                </div>
            </form>
            <div class="panel panel-default appl" id="main-content">
                <?php include('appl.php')?> <!--Будет выводиться не авторизованным пользователям -->
            </div>
        </article>
    </section>
    <div id="dialog">
    </div>
    <script src="js/ajax.js"></script>
    <script>
       // $("select[name='appls_type']").change();
    </script>
    </body>
<?php

?>
</html>