<?php
include "config.php";

$query = "SELECT `CustomerID`,
 CONCAT(`CustFirstName`, " ", `CustLastName`) AS CustomerName
 FROM `customer`;"

 $result = $conn->query($query);
 $numRows = $result->num_rows;
 for ($i = 0; $i < $numRows; $i++){
    $result->data_seek($i);
    $CustomerID = htmlspecialchars($result->fetch_assoc()['CustomerID']);
    $CustomerName = htmlspecialchars($result->fetch_assoc()['CustomerName']);
    echo("<option value=\"$CustomerID\">$CustomerName</option>")
 }