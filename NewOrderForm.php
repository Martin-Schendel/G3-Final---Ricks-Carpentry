<h2>New Order</h2>
<form action="CreateOrder.php" method="post">
    <fieldset id="masterFeild">
        
            <legend>Order</legend>
            <style>table{border:none;margin-top:0px;background-color:rgba(0,0,0,0);}td{background-color:rgba(0, 0, 0, 0);border:none;}</style>
            <table>
                <tr>
                    <td><button type="button" onclick="increaseQuantity(2);">White Bread</button></td>
                    <td><button type="button" onclick="increaseQuantity(3);">Wheat Bread</button></td>
                </tr>
                <tr>
                    <td><button type="button" onclick="increaseQuantity(4);">White Buns</button></td>
                    <td><button type="button" onclick="increaseQuantity(5);">Wheat Buns</button></td>
                </tr>
                <tr>
                    <td><button type="button" onclick="increaseQuantity(6);">Flatbread</button></td>
                    <td><button type="button" onclick="increaseQuantity(7);">French Bread</button></td>
                </tr>
            </table>
            <table id="orderItems">
                <tbody><tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </tbody><tr><td>White Bread </td>
            <td><input type="number" id="itemm2" name="itemm2" value="0"></td>
            <td id="price2">Price</td></tr>
            <tr>
                <td>Wheat Bread </td>
            <td><input type="number" id="itemm3" name="itemm3" value="0"></td>
            <td id="price3">Price</td></tr>
            <tr>
                <td>White Buns </td>
            <td><input type="number" id="itemm4" name="itemm4" value="0"></td>
            <td id="price4">Price</td></tr>
            <tr>
                <td>Wheat Buns </td>
            <td><input type="number" id="itemm5" name="itemm5" value="0"></td>
            <td id="price5">Price</td></tr>
            <tr>
                <td>Flatbread </td>
            <td><input type="number" id="itemm6" name="itemm6" value="0"></td>
            <td id="price6">Price</td></tr>
            <tr>
                <td>French Bread </td>
            <td><input type="number" id="itemm7" name="itemm7" value="0"></td>
            <td id="price7">Price</td></tr>
            <tr>
                <td></td>
                <td style="text-align:right">Total:</td>
                <td><input type="number"id="orderTotal" step="0.01" name="orderTotal" value="0.00" style="width:100px"></td>
            </tr>
        </table>
            <button type="button" id="reset" onclick="resetQuantities()">Cancel Order</button><br>
        
        <label for="Customer">Customer: </label>
        <select name="Customer" id="Customer">
            <?php require "GetCustomerOptions.php"?>
        </select>
        <br/>
        <a href="#newCustomerForm"><button type="button"> + Add New Customer</button></a><br/>
        <label for="Employee">Employee: </label>
        <select name="Employee" id="Employee">
            <?php require "GetEmployeeOptions.php"?>
        </select>
        <input type="submit" value="Submit">
    </fieldset>
</form>
    <hr>
    <?php include "NewCustForm.html";?>
    <script src="script.js"></script>
    <script>setPrices()</script>
</form>
