$("label[for='form_username']").html('Ім\'я користувача');
$("label[for='form_password']").html('Пароль');
$("form[name='form']").validationEngine();
$('#form_username').addClass('validate[required]');
$('#form_password').addClass('validate[required]');
$(':button').html('Увійти');
$("form[name='medical_staff']").validationEngine();
$("form[name='reg_info']").validationEngine();
$("form[name='conf_person']").validationEngine();
