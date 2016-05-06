function radioChecked() {
    var radios = document.getElementsByName('visits[type]');
    for (var i = 0, length = radios.length; i < length; i++) {
        switch (radios[i].checked) {
            case 1:
                formPlanedVisitAction();
                break;
            case 2:
                formConsultVisitAction();
                break;
            case 3:
                formObserveVisitAction();
                break;
            case 4:
                formInquiryVisitAction();
                break;
            case 5:
                formClaimVisitAction();
                break;
            default: break;
        }
    }
}