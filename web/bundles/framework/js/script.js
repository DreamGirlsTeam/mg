
$("label[for='form_username']").html('Ім\'я користувача');
$("label[for='form_password']").html('Пароль');
$("form[name='form']").validationEngine();
$('#form_username').addClass('validate[required]');