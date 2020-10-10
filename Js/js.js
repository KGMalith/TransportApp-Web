$.validate();


$('#pass1, #pass2').on('keyup', function () {
    console.log('working');
    if ($('#pass1').val() == $('#pass2').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else
        $('#message').html('Not Matching').css('color', 'red');
});