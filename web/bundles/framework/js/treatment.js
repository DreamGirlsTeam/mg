$("#form_save").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: "/doctor/treat",
        data: {"search" : $("#form_symptoms").val()},
        type: "POST",
        dataType: "json",
        success: function(data) {
            if (data.illnesses) {
                $('.ill_heading').html("<h3>Оберіть діагноз зі списку:</h3>");
                $('.illnesses').html(data.illnesses);
            }
            if (data.valid) {
                content = "Будь ласка, оберіть симптоми " + data.valid + " зі списку";
                alert(content);
            }
            if(data.count) {
                alert("Будь ласка, введіть від 2-х до 10 симптомів");
            }
        }
    })
});
$body = $("body");
$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }
});


