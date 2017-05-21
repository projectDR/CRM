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


function getApplList(checkedType)
{
   // var redirect = '/application_list';
   // history.pushState('', '', redirect);
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


function get_employees_list()
{
    $.ajax({
        type:"POST",
        url: "../supporting_php/employee_list.php",
        success: function(val){
            var res = jQuery.parseJSON(val);
            $("#main-content").html(res.employee_table);
             for (var i=0; i<res.values.length; i++)
            {
                $("#"+res.values[i][0]+res.values[i][2]+"").text(res.values[i][4]);
            }
        },
        error: function()
        {
            alert("don't get employee_list");
        }

    });
}

function switchOnChange(){
    window.location.hash = "#application_list";
    getApplList($("select[name='appls_type'] option:checked").val());
}

function getSwitches() {
    $.ajax({
        type:"POST",
        url: "../supporting_php/get_switches.php",
        success: function(val){
            var res = jQuery.parseJSON(val);
            var s = $("<select name='appls_type' onchange='switchOnChange()'/>");
            $("<option />", {value: 'all', text: 'все заявки', selected:'selected'}).appendTo(s);
            for(var i=0; i< res.length; i++) {
                $("<option />", {value: res[i][0], text: res[i][1]}).appendTo(s);
            }
            s.appendTo(".switches");
        },
        error: function()
        {
            alert("don't get swithes");
        }

    });
}
