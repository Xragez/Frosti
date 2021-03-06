<?php
    session_start();
?>
<!DOCTYPE html>
</head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <title>Register</title>
    <script type="text/javascript" src="./public/js/register_validation.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2>Sign up for free</h2>
            <form class="register" action="register" method="POST">
                <div class="text">First Name</div>
                <input class="register" name="name" required="required" type="text" placeholder="First name">
                <div class="text">Last Name</div>
                <input class="register" name="surname" required="required" type="text" placeholder="Last name">
                <div class="text">Username</div>
                <input class="register" name="username" required="required" type="text" placeholder="Username">
                <div class="text">Email address</div>
                <input class="register" name="email" required="required" type="text" placeholder="Email address">
                <div class="text">Password</div>
                <input class="register" name="password" required="required" type="password" placeholder="Password">
                <div class="text">Confirm password</div>
                <input class="register" name="confirmedPassword" required="required" type="password" placeholder="Password">
                <button type="submit">CREATE ACCOUNT</button>
            </form>
            <div class="login-footer"">Already have an account? &nbsp;
            <a href="login">Log In</a>
        </div>
        </div>

    </div>
</body>
