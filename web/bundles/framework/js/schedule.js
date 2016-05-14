$("form[name='form']").validationEngine();
$('#form_save').click(function(event){
    event.preventDefault();
    $.ajax({
        url: "/reception/schedule/",
        data: {"number" : $("#form_number").val()},
        type: "POST",
        dataType: "json",
        success: function(data) {
            $(".works").html(data.content);
        }
    });
});
function sendWorks(event){
    var map = {};
    $.each($(".form_patients select"), function( index, value ) {
        map[index] = value.value;
    });
    event.preventDefault();
    $.ajax({
        url: "/reception/schedule/submit",
        data: {"works" : map},
        type: "POST",
        dataType: "json",
        success: function(data) {
            if (data.process) {
                window.location="/reception/schedule/result";
            }
        }
    });
}
$body = $("body");
$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }
});
