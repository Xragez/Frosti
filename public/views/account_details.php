<?php
session_start();
?>
<!DOCTYPE html>
</head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <script src="https://kit.fontawesome.com/8d0c9bc700.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/inventory.js" defer></script>
    <title>My food</title>
</head>
<body>
    <div class="base-container">
        <?php include('side_menu.php') ?>
        <main>
            <header>
                <div class="search-bar">
                    <h1 class="text">
                        Account details
                    </h1>
                </div>
                <?php include('account_dropdown.php')?>
            </header>
            <section class="user_details">
                <div class="details">
                    <h3>First Name:</h3>
                    <h4><?= $_SESSION['name'] ?></h4>
                </div>
                <div class="details">
                    <h3>Last Name:</h3>
                    <h4><?= $_SESSION['surname'] ?></h4>
                </div>
                <div class="details">
                    <h3>Username:</h3>
                    <h4><?= $_SESSION['username'] ?></h4>
                </div>
                <div class="details">
                    <h3>Email:</h3>
                    <h4><?= $_SESSION['email'] ?></h4>
                </div>
            </section>
        </main>
    </div>
</body>