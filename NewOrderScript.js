var orderItems = [];
var itemID, itemName, quantity;
var orderItemsDiv = document.getElementById("orderItems");
function addToOrder() {
    orderItems += {
        itemID: itemID,
        itemName: itemName,
        Quantity: quantity,
    };
    updateOrderItemsDiv();
}
function setItemID() {
    try {
        select = document.getElementById("item");
        itemID = select.value;
        itemName = select.options[select.selectedIndex].text;
    } catch {
        document.getElementById("addItemFieldset").remove();
    }
}
setItemID();
function setQuantity() {
    quantity = document.getElementById("quantity").value;
}
setQuantity();
function updateOrderItemsDiv() {
    var newDiv = document.createElement("tr");
    newDiv.innerHTML =
        "<td>" +
        itemName +
        ' </td><td><input type="number" id="itemm' +
        itemID +
        '" value="' +
        quantity +
        '"></input></td><td>Price</td>';
    orderItemsDiv.appendChild(newDiv);
    removeItemOption(itemID);
    setItemID();
    setQuantity();
}
function removeItemOption(itemID) {
    try {
        var opt = document.getElementById("item" + itemID);
        opt.remove();
    } catch {}
}
