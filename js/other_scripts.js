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


function log_out() {
    url = "../reg_auth/log-out.php";
    $(location).attr('href', url);
}

function profile() {
    url = "../reg_auth/profile.php";
    $(location).attr('href', url);
}