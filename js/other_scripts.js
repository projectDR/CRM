/**
 * Created by root on 15.05.17.
 */
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
});

function get_reg_auth_form(tp) {
    $.ajax({
        type:"POST",
        url: "../reg_auth/login_auth_form.php",
        data: {type: tp},
        success: function (form) {
            $("#dialog").html(form);
            $( "#dialog" ).dialog( "open" );
        },
        error: function () {
            alert("вместо формы мне втирают дичь");
        }
    });
}

function add_user() {
    if($("#password").val() !== $("#password-rep").val())
    {
        alert("Пароли не совпадают");
        return;
    }
    if($("#password").val().trim() == '' || $("#password").val() === null)
    {
        alert("Пароль пуст");
        $("#password").clear();
        return;
    }
    $.ajax({
        type:"POST",
        url: "../supporting_php/add_user.php",
        data: {
            fio: $("#fio").val(),
            staff: $("#staff").val(),
            login: $("#login").val(),
            passsword: $("#password").val()
        },
        success: function (response) {
            if(response == "fail")
            {
                alert("Логин уже существует");
                return;
            }
            alert("Данные успешно добавлены \n" + response);
            $( "#dialog" ).dialog( "close" );
        },
        error: function () {
            alert("Не пошло добавление");
        }
    });
}

function verify() {
    $.ajax({
        type:"POST",
        url: "../reg_auth/verify_user.php",
        data: {
            login: $("#login").val(),
            password: $("#password").val()
        },
        success: function (response) {
            //alert("Существование юзера: " + response);
           $( "#dialog" ).dialog( "close" );
            var res = jQuery.parseJSON(response);
            if(res[0][2]=="f")
            {
                window.location.hash = "#application_list";
            }
            else if (res[0][2]=="t")
            {
                window.location.hash = "#employees_list";
            }
            location.reload();
        },
        error: function () {
            alert("Не пошло");
        }
    });
}

function log_out() {
    url = "../reg_auth/log-out.php";
    $(location).attr('href', url);
}