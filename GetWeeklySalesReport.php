<?php
include "config.php";

$query = <<<HEREDOC
SELECT ordersummary.OrderID AS "Order ID", 
CONCAT(customer.CustFirstName, " ", customer.CustLastName) AS Customer, 
CONCAT(employee.EmpFirstName, " ", employee.EmpLastName) AS Employee, 
ordersummary.OrderDate AS "Order Date", 
ordersummary.OrderTotalPrice AS "Sale Total" ,
ordersummary.OrderTotalPrice - SUM(item.ItemWholesaleCost) AS Profit
FROM ordersummary, customer, employee, orderitem, item
WHERE ordersummary.CustomerID = customer.CustomerID 
    AND ordersummary.EmployeeID = employee.EmployeeID 
    AND ordersummary.OrderID = orderitem.OrderID
    AND orderitem.ItemID = item.ItemID
    AND ordersummary.OrderDate >= cast((now() - interval 7 day) as date)
GROUP BY ordersummary.OrderID
ORDER BY ordersummary.OrderDate ASC;
HEREDOC;

 $WeeklyProfit = 0;
 $result = $conn->query($query);
 $numRows = $result->num_rows;
 
 while ($row = $result->fetch_assoc()){
    $OrderID = htmlspecialchars($row['Order ID']);
    $Customer = htmlspecialchars($row['Customer']);
    $Employee = htmlspecialchars($row['Employee']);
    $OrderDate = htmlspecialchars($row['Order Date']);

    $FancyDate = strtotime($OrderDate);

    $DisplayDate = trim(date("D M d h:i:s",$FancyDate),chr(0xC2).chr(0xA0));

    $SaleTotal = htmlspecialchars(number_format((double)$row['Sale Total'],2));
    $Profit = htmlspecialchars(number_format((double)$row['Profit'],2));
    $WeeklyProfit += $Profit;
    echo(<<<HEREDOC
    <tr>
    <td>$OrderID</td>
    <td>$Customer</td>
    <td>$Employee</td>
    <td>$DisplayDate</td>
    <td>$SaleTotal</td>
    <td>$Profit</td>
</tr>
HEREDOC);
 }