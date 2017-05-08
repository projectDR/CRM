<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css" type="text/css">
</head>
    <body>
    <?php include('header.php')?>
    <div class="it-asist"></div>
    <section>
        <aside class="left">
            <ul class="nav nav-pills nav-stacked">
                <!--Эти ссылки будут выводиться для авторизованного исполнителя -->
                <li><a href="#">Профиль</a></li>
                <li><a href="#">Список заявок</a></li>
            </ul>
        </aside>
        <article>
            <div class="panel panel-default appl" id="main-content">
                <!-- ?php include('appl.php')? -->
                <?php include('applications_list.php')?>
            </div>
        </article>
    </section>

    <script>
        function getApplication(id){
            $.ajax({
                type:"POST",
                url: "get-application.php",
                data: {ID: id},
                success: function(appl){
                    var res = jQuery.parseJSON(appl);

                    $("#username").val(res[1]);
                    $("#department").val(res[2]);
                    $("#position").val(res[3]);
                    $("#brtype").val(res[4]);
                    $("#description").val(res[5]);
                    if (res[0]==0)
                        $("#urgency").css({"background-color": "red"});
                    else if (res[0]==1)
                        $("#urgency").css({"background-color": "yellow"});
                    else
                        $("#urgency").css({"background-color": "green"});
                },
                error: function()
                {

                }

            });
        }
    </script>
    </body>
<?php

?>
</html>