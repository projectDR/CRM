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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script>
        $( function() {
            $( "#dialog" ).dialog({
                autoOpen: false,
                width: "50%",
                height:"auto",
                show: {
                },
                hide: {
                }
            });

            $("#log-in-button").on( "click", function() {
                $("#dialog").html( '<form id="loginForm" name="loginForm" method="post"> <fieldset> ' +
                    '<legend>Введите данные для входа</legend>' +
                    '<!-- Тут будут поля для ввода логина и пароля--> </fieldset> </form>');
            $( "#dialog" ).dialog( "open" );
            });

            $("#log-up-button").on( "click", function() {
                $("#dialog").html( '<form id="loginForm" name="loginForm" method="post"> <fieldset> ' +
                    '<legend>Форма регистрации</legend>' +
                    '<!-- ФИО и пароль--> </fieldset> </form>');
                $( "#dialog" ).dialog( "open" );
            });
        });
    </script>
</head>
    <body>
    <?php include('header.php')?>
    <div class="it-asist"></div>
    <section>
        <article>
            <div class="panel panel-default appl" id="main-content">
                <?php include('appl.php')?>
                <div id="dialog">

                </div>
            </div>
        </article>
    </section>

    <script>


        function getApplList()
        {
            $.ajax({
                type:"POST",
                url: "applications_list.php",
                success: function(applList){
                    $("#main-content").html(applList);
                },
                error: function()
                {
                  alert("don't get application list");
                }
            });
        }

        function getApplication(id){

            $.ajax({
                type:"POST",
                url: "get-application.php",
                data: {ID: id},
                success: function(appl){
                    var res = jQuery.parseJSON(appl);
                    $("#dialog").html(res.appl_form);
                    $( "#dialog" ).dialog( "open" );
                    $("#username").val(res.values[1]);
                    $("#department").val(res.values[2]);
                    $("#position").val(res.values[3]);
                    $("#brtype").val(res.values[4]);
                    $("#description").val(res.values[5]);
                    if (res.values[0]==0)
                        $("#urgency").css({"background-color": "red"});
                    else if (res.values[0]==1)
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