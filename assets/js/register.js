$(document).ready(function() {
    $welcomeContainer = $('#welcome-container');

    $registerContainer = $('#register-container');
    $registerPageBtn = $('#register-page-btn');
    $registerBackToWelcome = $('#register-back-to-welcome');

    $loginContainer = $('#login-container');
    $loginPageBtn = $('#login-page-btn');
    $loginBackToWelcome = $('#login-back-to-welcome');

    // register clicked
    $registerPageBtn.on('click', function() {
        $welcomeContainer.hide();
        $registerContainer.show();
    });

    // login clicked
    $loginPageBtn.on('click', function() {
        $welcomeContainer.hide();
        $loginContainer.show();
    });

    // from register, go back to welcome clicked
    $registerBackToWelcome.on('click', function() {
        $welcomeContainer.show();
        $registerContainer.hide();
    });

    // from login, go back to welcome clicked
    $loginBackToWelcome.on('click', function() {
        $welcomeContainer.show();
        $loginContainer.hide();
    });

});