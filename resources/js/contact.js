$('#contact-form').on('submit', function () {

    $(".is-invalid").removeClass("is-invalid");

    let name = $('#name');
    let email = $('#email');
    let message = $('#message');
    let invalid = false;
    let emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


    if(name.val().trim().length === 0) {
        invalid = true;
        name.addClass('is-invalid');
    }

    if(email.val().trim().length === 0 || !emailRegex.test(email.val())) {
        invalid = true;
        email.addClass('is-invalid');
    }

    if(message.val().trim().length === 0) {
        invalid = true;
        message.addClass('is-invalid');
    }

    if(invalid) return false;
})
