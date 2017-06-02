$('#department').change(
    function () {
        departmentOnChange();
    }
)

function departmentOnChange(){
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


$("#send_btn").click(function(){
    console.log("в ф-ии кнопки формы");
    var reg = /^[а-яА-ЯЁё\s-]{3,}$/;

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
            alert("Заявка принята. Вашей заявке присвоен " + response + ", по которому вы сможете отследить её статус в дальнейшем.");
        },
        error: function () {
            alert("Не пошло");
        }
    });
})


function get_appl_status() {
    id = $("#applid").val();
    if(!id)
    {
        alert("Не указан номер заявки");
        return;
    }
    $.ajax({
        type:"POST",
        url: "../supporting_php/application_status.php",
        data: {applid: id},
        success: function (form) {
            $("#applid").val(null);
            $("#dialog").html(form);
            $( "#dialog" ).dialog( "open" );
        },
        error: function () {
            alert("вместо формы мне втирают дичь");
        }
    });
}

