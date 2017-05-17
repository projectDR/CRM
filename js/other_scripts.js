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

    $("#log-in-button").on( "click", function() {
        $("#dialog").html( '<form id="loginForm" name="loginForm" method="post"> <fieldset> ' +
            '<legend>Введите данные для входа</legend>' +
            '<!-- Тут будут поля для ввода логина и пароля--> </fieldset> </form>');
        $( "#dialog" ).dialog( "open" );
    });

    $("#log-up-button").on( "click", function() {
        $("#dialog").html( '<form id="loginForm" name="loginForm" method="post"> <fieldset> ' +
            '<legend>Форма регистрации</legend>' +
            '<!-- ФИО, никнэйм, тип аккаунта(исполнитель\менеджер) и пароль--> </fieldset> </form>');
        $( "#dialog" ).dialog( "open" );
    });
});