/**
 * Created by root on 15.05.17.
 */

$(document).ready(function () {
    $('#department').change(
        function () {
            if($("#department").val() == -1) {
                $("#possall").css({"display": "none"});
                return;
            }
            $.ajax({
                type: 'GET',
                url: '../supporting_php/get_position.php',
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

$(document).ready(function () {
    $("#send_btn").click(function(){

        var reg = /^[а-яА-Я\s-]{3,}$/;
        if(!reg.test($("#username").val()))
        {
            $("#username").css("background-color", "red");
            return;
        }
        $.ajax({
            type: 'POST',
            url: '../supporting_php/write_to_base.php',
            data: {
                name: $("#username").val(),
                brtype: $("#brtype").val(),
                pos: $("#position").val(),
                urgency: $("#urgency").val(),
                description: $("#description").val()
            },
            success: function (response) {
                alert("Данные успешно добавлены \n" + response);
            },
            error: function () {
                alert("Не пошло");
            }
        })
    })
});


$("input[name='appls_type']").change(function () {
    getApplList($("input[name='appls_type']:checked").val());
});

function getApplList(checkedType)
{
    $.ajax({
        type:"POST",
        url: "../supporting_php/applications_list.php",
        data:{type:checkedType},
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
        url: "../supporting_php/get-application.php",
        data: {ID: id},
        success: function(appl){
            var res = jQuery.parseJSON(appl);
            $("#dialog").html(res.appl_form);
            $( "#dialog" ).dialog( "open" );
            $("#status option[value='"+res.values[6]+"'").prop('selected', true);
            if (res.values[0]==0)
                $("#urgency").css({"background-color": "red"});
            else if (res.values[0]==1)
                $("#urgency").css({"background-color": "yellow"});
            else
                $("#urgency").css({"background-color": "green"});
        },
        error: function()
        {
            alert("don't get application");
        }

    });
}

function accept_appl(id)
{
    nickname ="PPetrov";
    $.ajax({
        type:"POST",
        url: "../supporting_php/accept-application.php",
        data: {ID: id, NICKNAME: nickname},
        success: function(){
            $("#dialog").dialog("close");
            getApplList($("input[name='appls_type']:checked"));
        },
        error: function()
        {
            alert("don't accept application");
        }

    });
}

function change_appl_status(id) {
    nickname ="PPetrov";
    $.ajax({
        type:"POST",
        url: "../supporting_php/accept-application.php",
        data: {ID: id, NICKNAME: nickname, status:$("#status").val(), type: true},
        success: function(val){
            $("#dialog").dialog("close");
            getApplList();
        },
        error: function()
        {
            alert("don't accept application");
        }

    });
}
