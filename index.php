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
    <?php include('header.php');?>
    <div class="it-asist"></div>
    <section>
        <article>
            <form> <!--Будет выводиться авторизованным пользователям -->
                <div class='switches'>

                </div>
            </form>
            <div class="panel panel-default appl" id="main-content">
                <?php
                if (!isset($_SESSION["type"])) include('appl.php'); ?> <!--Будет выводиться не авторизованным пользователям -->
            </div>
        </article>
    </section>
    <div id="dialog">
    </div>
    <script src="js/ajax.js"></script>
    <?php if(isset($_SESSION["type"])) echo '
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
    ?>  <!-- script>
        alert(22);
        $("select[name='appls_type']").change(function () {
            getApplList($("select[name='appls_type'] option:checked").val());
        });
    </script -->
    </body>
</html>