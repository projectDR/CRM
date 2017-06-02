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