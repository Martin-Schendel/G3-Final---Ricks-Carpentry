
<h2>New Order</h2>
<form action="CreateOrder.php" method="post">
    <fieldset>
        <fieldset id="addItemFieldset">
            <legend>Add Item</legend>
            <label for="Item">Item: </label>
            <select name="Item" id="item" onchange="setItemID()">
                <?php require "GetItemOptions.php"?>
            </select>
            <label for="Quantity">Quantity: </label>
            <input type="number" name="Quantity" id="quantity" value="1" onchange="setQuantity()"><br>
            <button type="button" id="AddToOrder" onclick="addToOrder()">Add to Order</button>
        </fieldset>
        <fieldset>
            <legend>Items</legend>
            <table id="orderItems">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </table>
            <button type="button" id="reset" >Cancel Order</button>
        </fieldset>
        <label for="Customer">Customer: </label>
        <select name="Customer">
            <?php require "GetCustomerOptions.php"?>
        </select>
        <label for="Employee">Employee: </label>
        <select name="Employee">
            <?php require "GetEmployeeOptions.php"?>
        </select>
    </fieldset>
    <button>Submit</button>
    <script src="NewOrderScript.js"></script>
</form>