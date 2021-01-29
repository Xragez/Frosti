const search =  document.querySelector("input[placeholder='search']");
const itemContainer = document.querySelector(".item-container");


search.addEventListener("keyup", function (event) {
   if(event.key === "Enter"){
       event.preventDefault();

       const data = {search: this.value};

       fetch("/search", {
           method: "POST",
           headers:{
               'Content-Type': 'application/json'
           },
           body: JSON.stringify(data)
       }).then(function (response){
           return response.json();
       }).then(function (items){
          itemContainer.innerHTML = '';
          loadItems(items)
       });
   }
});


function loadItems(items) {
    items.forEach(item => {
        console.log(item);
        createItem(item);
    })
}

function createItem(item){
    const template = document.querySelector("#item-template");

    const clone = template.content.cloneNode(true);
    const name = clone.querySelector("#name");
    name.innerHTML = item.name;
    const quantity = clone.querySelector("#quantity");
    quantity.innerHTML = item.quantity;
    const category = clone.querySelector("#category");
    category.innerHTML = item.category;
    const exp_date = clone.querySelector("#exp_date");
    exp_date.innerHTML = item.exp_date;

    itemContainer.appendChild(clone);
}