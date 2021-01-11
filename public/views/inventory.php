<!DOCTYPE html>
</head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/8d0c9bc700.js" crossorigin="anonymous"></script>
    <title>INVENTORY</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo_white.svg">
            <ul class="side_menu">
                <li>
                    <a href="#">Manage food</a>
                    <ul class="side_menu" >
                        <li><a href="#">My food</a>
                        <li><a href="#">Add Item</a>
                        <li><a href="#">Remove Item</a>
                    </ul>
                </li>
                <li>
                    <a href="#">Recipes</a>
                </li>
            </ul>
        </nav>

        <main>
            <header>
                <div class="search-bar">
                    <form>
                        <input placeholder="search">
                    </form>
                </div>
                <div class="account">

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