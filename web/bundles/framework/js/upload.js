function radioChecked() {
    var radios = document.getElementsByName('visits[type]');
    var path = "";
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            switch (i) {
                case 0:
                    path = "{{ path('planed_visit') }}";
                    break;
                case 1:
                    formConsultVisitAction();
                    break;
                case 2:
                    formObserveVisitAction();
                    break;
                case 3:
                    formInquiryVisitAction();
                    break;
                case 4:
                    formClaimVisitAction();
                    break;
                default:
                    break;
            }
        }
    }


    $.ajax({
        type: 'POST',
        url: path,
        success: function(data) {
            alert(data);
        }
    });
}