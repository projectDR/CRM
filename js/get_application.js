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
            if (res.values[7])
                $("#employees option[value='"+res.values[7]+"'").prop('selected', true);

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

