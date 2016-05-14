$("#form_save").click(function (event) {
    event.preventDefault();
    $.ajax({
        url: "/doctor/treat",
        data: {"search" : $("#form_symptoms").val()},
        type: "POST",
        dataType: "json",
        success: function(data) {
            console.log($("#form_symptoms").val());
            console.log(data);
        }
    })
});
