var orderItems = [];
var itemName, quantity;
var orderItemsDiv = document.getElementById("orderItems");
function addToOrder() {
    orderItems += {
        itemName: itemName,
        Quantity: quantity,
    };
    updateOrderItemsDiv();
    resetItemInputs();
}
function setItemName() {
    itemName = document.getElementById("item").value;
}
function setquantity() {
    quantity = document.getElementById("quantity").value;
}
function resetItemInputs() {
    itemName = "";
    quantity = "";
}
function updateOrderItemsDiv() {
    var newDiv = document.createElement("div");
    newDiv.innerHTML =
        "<span>" + itemName + " </span><span> " + quantity + "</span>";
}
