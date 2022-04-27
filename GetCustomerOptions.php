<?php
include "config.php";

$query = <<<HEREDOC
SELECT `CustomerID`, CONCAT(`CustFirstName`, " ", `CustLastName`) AS CustomerName FROM `customer`;
HEREDOC;

 $result = $conn->query($query);
 $numRows = $result->num_rows;
 while ($row = $result->fetch_assoc()){
    $CustomerID = htmlspecialchars($row['CustomerID']);
    $CustomerName = htmlspecialchars($row['CustomerName']);
    echo("<option value=\"$CustomerID\">$CustomerName</option>");
 }