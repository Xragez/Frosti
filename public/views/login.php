<!DOCTYPE html>
</head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
            
            <div class="login-container">
                <div class="logo">
                    <img src="public/img/logo.svg">
                </div>
                <form class="login" action="login" method="POST">
                    <div class="text">email</div>
                    <input class="login" name="email" type="text" placeholder="email@email.com">
                    <div class="text">password</div>
                    <input class="login" name="password" type="password" placeholder="password">
                    <div class="error-msg">
                        <?php if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <button type="submit">LOGIN</button>
                </form>
            </div>
            
    </div>
</body>