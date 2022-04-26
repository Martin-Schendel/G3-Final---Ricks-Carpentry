SELECT ordersummary.OrderID AS "Order ID", 
customer.CustFirstName + " " + customer.CustLastName AS Customer, 
employee.EmpFirstName + " " + employee.EmpLastName AS Employee, 
ordersummary.OrderDate AS "Order Date", 
ordersummary.OrderTotalPrice AS "Sale Total" ,
ordersummary.OrderTotalPrice - SUM(item.ItemWholesaleCost) AS Profit
FROM ordersummary, customer, employee, orderitem, item
WHERE ordersummary.CustomerID = customer.CustomerID 
    AND ordersummary.EmployeeID = employee.EmployeeID 
    AND ordersummary.OrderID = orderitem.OrderID
    AND orderitem.ItemID = item.ItemID
    AND ordersummary.OrderDate >= cast((now()) as date)
GROUP BY ordersummary.OrderID;

-- NEED TO CHECK THE CAST IN LINE 12