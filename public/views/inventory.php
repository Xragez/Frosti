<!DOCTYPE html>
</head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/8d0c9bc700.js" crossorigin="anonymous"></script>
    <script src="public/js/script.js"></script>
    <title>My food</title>
</head>
<body>
    <div class="base-container">
        <div class="modal select-item">
            <div class="modal-content">
                <h2 class="text">Add product</h2>
                <form>
                    <div class="text">Product name</div>
                    <div class="select-item-name">
                        <select>Name</select>
                    </div>
                    <div class="text">Category</div>
                    <div class="select-item-category">
                        <select>Category</select>
                    </div>
                    <div class="text">Quantity</div>
                    <input  name="quantity">
                    <div class="text">Expiration date</div>
                    <input  name="quantity">
                    <div class="two-buttons">
                        <button type="submit">Add</button>
                        <button>Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <nav>
            <img src="public/img/logo_white.svg">
            <ul class="side_menu">
                <li>
                    <a href="#" class="manage-btn" onclick="submenu_food()">Manage food
                        <i class="fas fa-caret-down first"></i>
                    </a>
                    <ul class="side_menu manage-show" >
                        <li><a href="#">My food</a>
                        <li><a href="#" onclick="modal_add_product()">Add Product</a>
                        <li><a href="#">Remove Product</a>
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
                <h1>My food</h1>
                <div class="search-bar">
                    <form>
                        <input placeholder="search">
                    </form>
                </div>
                <div class="account">
                    <?php
                    echo $_SESSION['username'];
                    ?>
                </div>
            </header>
            <section class="inventory">
                <table class="inventory_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Milk</td>
                            <td>200 ml</td>
                            <td>Drinks</td>
                            <td>10.10.2020</td>
                        </tr>
                        <tr>
                            <td>Milk</td>
                            <td>200 ml</td>
                            <td>Drinks</td>
                            <td>10.10.2020</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>

    </div>
</body>