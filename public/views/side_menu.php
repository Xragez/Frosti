<nav>
    <img src="public/img/logo_white.svg">
    <ul class="side_menu">
        <li>
            <a href="#" class="manage-btn" onclick="submenu_food()">Manage food
                <i class="fas fa-caret-down first"></i>
            </a>
            <ul class="side_menu manage-show" >
                <li><a href="./inventory">My food</a>
                <li><a href="#" name="addProduct" onclick="modal_add_product_menu()">Add Product</a>
                <li><a href="#" onclick="modal_remove_product_menu()">Remove Product</a>
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