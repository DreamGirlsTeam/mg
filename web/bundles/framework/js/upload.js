function radioChecked() {
    var radios = document.getElementsByName('visits[type]');
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            //var data = i;
            $.ajax({
                type: 'POST',
                url: "doctor/visit",
                data: i,
                success: function(data, dataType) {
                }
            });
        }
    }
}