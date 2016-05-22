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
$body = $("body");
$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }
});
