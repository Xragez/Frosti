
<!DOCTYPE html>
</head>
<link rel="stylesheet" type="text/css" href="public/css/style.css">
<script src="https://kit.fontawesome.com/8d0c9bc700.js" crossorigin="anonymous"></script>
<script src="public/js/script.js"></script>
<title>My food</title>
</head>
<body>
<div class="base-container">
    <nav>
        <img src="public/img/logo_white.svg">
        <ul class="side_menu">
            <li>
                <a href="#" class="manage-btn" onclick="submenu_food()">Manage food
                    <i class="fas fa-caret-down first"></i>
                </a>
                <ul class="side_menu manage-show" >
                    <li><a href="#">My food</a>
                    <li><a href="#">Add Item</a>
                    <li><a href="#">Remove Item</a>
                </ul>
            </li>
            <li>
                <a href="#" class="recipe-btn" onclick="submenu_recipes()">Recipes
                    <i class="fas fa-caret-down second"></i>
                </a>
                <ul class="side_menu recipe-show" >
                    <li><a href="#">My recipes</a>
                    <li><a href="#">Add recipe</a>
                    <li><a href="#">Remove recipe</a>

                </ul>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class="search-bar">
                <h1 class="text">
                    Account details
                </h1>
            </div>
            <div class="account">
                <?php
                echo $_SESSION['username'];
                ?>
            </div>
        </header>
        <section class="user_details">
            <div class="details">
                <h3>First Name:</h3>
            </div>
            <div class="details">
                <h3>Last Name:</h3>
            </div>
            <div class="details">
                <h3>Username:</h3>
            </div>
            <div class="details">
                <h3>Email:</h3>
            </div>
        </section>
    </main>
</div>
</body>