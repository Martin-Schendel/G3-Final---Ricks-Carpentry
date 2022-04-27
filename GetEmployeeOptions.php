<?php
include "config.php";

$query = <<<HEREDOC
SELECT `EmployeeID`, `EmpFirstName` FROM `employee`;
HEREDOC;

 $result = $conn->query($query);
 $numRows = $result->num_rows;
 while ($row = $result->fetch_assoc()){
    $EmployeeID = htmlspecialchars($row['EmployeeID']);
    $EmpFirstName = htmlspecialchars($row['EmpFirstName']);
    echo("<option value=\"$EmployeeID\">$EmpFirstName</option>");
 }