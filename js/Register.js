$(function() {


    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });


});

function selectForm(ele){

        if (ele == 'login') {
           // alert('login');
            document.getElementById("register-form").style.display="none";
            document.getElementById("login-form").style.display="block";

        }
        if (ele == 'register') {

        }// your code here



}
