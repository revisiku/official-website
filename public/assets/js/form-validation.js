let error;

function emailValidation(elm, required = true) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (required && (elm.val() == '' || !regex.test(elm.val()))) {
        error = true;
        elm.addClass('is-invalid border-danger');
    } else {
        error = false;
        elm.removeClass('is-invalid border-danger')
    }
}

function numberValidation(elm, required = true) {
    if (required && elm.val() == '' || (elm.val() != '' && isNaN(elm.val()) == true)) {
        error = true;
        elm.addClass('is-invalid border-danger');
    } else {
        error = false;
        elm.removeClass('is-invalid border-danger')
    }
}

function inputValidation(elm, required = true) {
    if (required && elm.val() == '') {
        error = true;
        elm.addClass('is-invalid border-danger');
    } else {
        error = false;
        elm.removeClass('is-invalid border-danger')
    }
}
