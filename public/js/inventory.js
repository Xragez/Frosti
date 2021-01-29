
function submenu_food(){
    document.querySelector(".manage-show").classList.toggle("show");
}
function submenu_recipes(){
    document.querySelector(".recipe-show").classList.toggle("show");
}
function modal_add_product_menu(){
    document.querySelector(".select-item").style.display = "flex";
}
function modal_cancel(){
    const elements = document.querySelectorAll(".modal");
    for (i = 0; i < elements.length; i++ ){
        elements[i].style.display = "none";
    }
}
function modal_remove_product_menu(){
    document.querySelector(".remove-item").style.display = "flex";
}

const checkbox = document.querySelectorAll('input[type="checkbox"]');
const itemIds = document.querySelectorAll('td[class="item-remove-id"]');

for (let i = 0; i < checkbox.length; i++ ){
    checkbox[i].name = itemIds[i].innerHTML;
    console.log(checkbox[i].name);
}