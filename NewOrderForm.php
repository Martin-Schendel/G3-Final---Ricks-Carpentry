
<h2>New Order</h2>
<form action="CreateEmployee.php" method="post">
    
    <fieldset>
        <label for="Customer">Customer: </label>
        <select name="Customer">
            <?php include_once "GetCustomerOptions.php"?>
        </select>
        <fieldset>
            <legend>Items</legend>
            <div id="orderItems">

            </div>
        </fieldset>
        <fieldset>
            <legend>Add Item</legend>
            <label for="Item">Item: </label>
            <select name="Item" id="item" onchange="setItemName()">
                <?php include_once "GetCustomerOptions.php"?>
            </select>
            <label for="Quantity">Quantity: </label>
            <input type="number" name="Quantity" id="quantity" value="1" onchange="setItemID()"><br>
            <button id="AddToOrder" onclick="addToOrder()">Add to Order</button>
        </fieldset>
    </fieldset>
    <br>
    <br>
    <button>Submit</button>
    <script src="NewOrderScript.js"></script>
</form>