<?php
    require_once("classes/application_class.php");
    require_once("classes/DBWorking_class.php");
?>

<form class = "form-horizontal">
    <h1 class="h1">Форма заявки</h1>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Имя пользователя</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id = "username"
                   pattern="^[А-Яа-яЁё\s]+$" required>
        </div>
    </div>
    <div class="form-group">
        <label for="department" class="col-sm-3 control-label">Отдел</label>
        <div class="col-sm-5">
            <select class="form-control" id = "department">
                <option value="-1" selected></option>
                <?php
                    $db = new DBWorking_class("project_bd", "Root123");
                    $depArray = $db->query("SELECT department_name, id FROM department");

                    foreach ($depArray as $item)
                    {
                        echo "<option value= $item[1] >".$item[0]."</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group" id = "possall" style="display: none">
        <label for="position" class="col-sm-3 control-label">Должность</label>
        <div class="col-sm-5">
            <select class="form-control" id = "position">

            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5"></div>
    </div>
    <div class="form-group">
        <label for="brtype" class="col-sm-3 control-label">Тип поломки</label>
        <div class="col-sm-5">
            <select class="form-control" id = "brtype">
                <?php
                $brArray = $db->query("SELECT id, appl_type_name FROM application_type");

                foreach ($brArray as $item)
                {
                    echo "<option value=$item[0]>".$item[1]."</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="urgency" class="col-sm-3 control-label">Срочность</label>
        <div class="col-sm-5">
            <select class="form-control" id = "urgency">
                <option value="2">Низкая</option>
                <option value="1">Средняя</option>
                <option value="0">Высокая</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Опишите </label>
        <div class="col-sm-5">
            <textarea class="form-control" rows="10" id = "description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3">
            <button class="btn" type="button" id="send_btn">Отправить заявку</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $("#send_btn").click(function(){
            var query = "INSERT INTO application (client_fio, id_application_types, id_position, urgency,description, id_status) VALUES ('";
            query += $("#username").val() + "', " + $("#brtype").val() + ", "  +
                $("#position").val() + ", "+ $("#urgency").val() + ", '" + $("#description").val() + "',1)";
            $.ajax({
                type: 'POST',
                url: 'my_staff/write_to_base.php',
                data: {com: query},
                success: function (response) {
                    alert(response);
                },
                error: function () {
                    alert("Не пошло");
                }
            })
        })
    });
</script>

<script type="text/javascript">
        $(document).ready(function () {
            $('#department').change(
                function () {
                    if($("#department").val() == -1) {
                        $("#possall").css({"display": "none"});
                        return;
                    }
                    $.ajax({
                        type: 'GET',
                        url: 'my_staff/get_position.php',
                        data: {depID: $('#department  :selected').val()},
                        success: function (response) {
                            $("#possall").css({"display":"block"})
                            var str = JSON.parse(response);
                            $("#position").html(function () {

                                var temp = "";
                                for(var i = 0; i<str.length; i++) {
                                    temp += "<option value="+str[i][0]+">"+str[i][1]+"</option>";
                                }

                                return temp;
                                })
                            },
                            error: function () {
                                alert("Что-то пошло не так");
                            }
                    })
                }
            )
        });
</script>
