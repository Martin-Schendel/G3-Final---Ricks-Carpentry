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
    AND ordersummary.OrderDate >= cast((now() - interval 1 month) as date)
GROUP BY ordersummary.OrderID
ORDER BY ordersummary.OrderDate ASC;
HEREDOC;

 $MonthlyProfit = 0;
 $result = $conn->query($query);
 $numRows = $result->num_rows;
 while ($row = $result->fetch_assoc()){
    $OrderID = htmlspecialchars($row['Order ID']);
    $Customer = htmlspecialchars($row['Customer']);
    $Employee = htmlspecialchars($row['Employee']);
    $OrderDate = htmlspecialchars($row['Order Date']);
    $SaleTotal = htmlspecialchars(number_format((double)$row['Sale Total'],2));
    $Profit = htmlspecialchars(number_format((double)$row['Profit'],2));
    $MonthlyProfit += $Profit;
    echo(<<<HEREDOC
    <tr>
    <td>$OrderID</td>
    <td>$Customer</td>
    <td>$Employee</td>
    <td>$OrderDate</td>
    <td>$$SaleTotal</td>
    <td>$$Profit</td>
</tr>
HEREDOC);
 }