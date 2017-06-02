function accept_appl(id, nick)
{
    if(nick ==undefined) {
        nick =$("#employees").val();
    }

    $.ajax({
        type:"POST",
        url: "../supporting_php/accept-application.php",
        data: {ID: id, NICKNAME: nick},
        success: function(){
            //getApplList("all");
            $("#dialog").dialog("close");
            location.reload();
        },
        error: function()
        {
            alert("don't accept application");
        }

    });
}

function change_appl_status(id, nick) {

    if(nick ==undefined) {
        nick =$("#employees").val();
    }

    $.ajax({
        type: "POST",
        url: "../supporting_php/accept-application.php",
        data: {ID: id, NICKNAME: nick, status: $("#status").val(), type: true},
        success: function (val) {
            // getApplList("all");
            $("#dialog").dialog("close");
            location.reload();
        },
        error: function () {
            alert("don't accept application");
        }

    });
}
