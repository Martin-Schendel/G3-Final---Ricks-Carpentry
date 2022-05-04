<?php
include "config.php";

$query = <<<HEREDOC
SELECT ordersummary.OrderID AS "Order ID", 
CONCAT(customer.CustFirstName, " ", customer.CustLastName) AS Customer, 
CONCAT(employee.EmpFirstName, " ", employee.EmpLastName) AS Employee,  
ordersummary.OrderDate AS "Order Date", 
ordersummary.OrderTotalPrice AS "Sale Total" ,
SUM(orderitem.quantity * item.ItemWholesaleCost) AS Cost
FROM ordersummary, customer, employee, orderitem, item
WHERE ordersummary.CustomerID = customer.CustomerID 
    AND ordersummary.EmployeeID = employee.EmployeeID 
    AND ordersummary.OrderID = orderitem.OrderID
    AND orderitem.ItemID = item.ItemID
    AND ordersummary.OrderDate >= cast((now() - interval 1 day) as date)
GROUP BY ordersummary.OrderID
ORDER BY ordersummary.OrderDate ASC;
HEREDOC;

 $DailyProfit = 0;
 $result = $conn->query($query);
 $numRows = $result->num_rows;
 $row = 0;
 while ($row = $result->fetch_assoc()){
    $OrderID = htmlspecialchars($row['Order ID']);
    $Customer = htmlspecialchars($row['Customer']);
    $Employee = htmlspecialchars($row['Employee']);
    $OrderDate = htmlspecialchars($row['Order Date']);
    $total = htmlspecialchars($row['Sale Total']);
    $cost = htmlspecialchars($row['Cost']);
    $SaleProfit = $total - $cost;

    $FancyDate = strtotime($OrderDate);

    $DisplayDate = trim(date("D M d h:i:s",$FancyDate),chr(0xC2).chr(0xA0));

    $SaleTotal = htmlspecialchars(number_format((double)$row['Sale Total'],2));
    $Profit = htmlspecialchars(number_format((double)$SaleProfit,2));
    $DailyProfit += $Profit;
    $Profit = htmlspecialchars(number_format((double)$row['Profit'],2));
    $DailyProfit += (double)$row['Profit'];
    echo(<<<HEREDOC
    <tr>
    <td>$OrderID</td>
    <td>$Customer</td>
    <td>$Employee</td>
    <td>$DisplayDate</td>
    <td>$$SaleTotal</td>
    <td>$$Profit</td>
</tr>
HEREDOC);
 }
