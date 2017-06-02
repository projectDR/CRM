<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="js/copyright.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/other_scripts.js"></script>
</head>
    <body>
    <?php include('header.php'); ?>
    <div class="it-asist"></div>
    <section>
        <article>
            <form> <!--Будет выводиться авторизованным пользователям -->
                <div class='switches'>

                </div>
            </form>
            <div class="panel panel-default appl" id="main-content">
                <?php
                if (!isset($_SESSION["type"])) include('appl.php');?> <!--Будет выводиться не авторизованным пользователям -->
            </div>
        </article>
    </section>
    <div id="dialog">
    </div>
    <script src="js/application.js"></script>
    <script src="js/get_application.js"></script>
    <script src="js/set_application.js"></script>
    <script src="js/employee.js"></script>
    <script src="js/reg_auth.js"></script>
    <script src="js/other_scripts.js"></script>

    <?php  if(isset($_SESSION["type"])) echo '
    <script>
    
        getSwitches();
        if(window.location.hash == "#application_list")
            {
               //switchOnChange();
               getApplList("all");
            }
        else if(window.location.hash == "#employees_list")
            {
            get_employees_list();
            }
        
    </script> ';
    ?>
    </body>
</html>