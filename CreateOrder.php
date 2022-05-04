<?php
session_start();
require('Config.php');

// Get items and put the values in associative arrays
$stmt = $conn->query('SELECT * FROM Item');
$items = array();
$ids = array();
$prices = array();
$created = false;
$id = 0;
if($stmt->num_rows > 0){
    
    while($row = $stmt->fetch_assoc()){
       $items[$row["ItemName"]] = "itemm" . $row["ItemID"];
       $ids[$row["ItemName"]] = $row["ItemID"];
       $prices[$row["ItemName"]] = $row['ItemSalePrice'];
    }
}
// check if the any items have quantity > 0, if they do,
// Create the ordersummary record only once, then use it's insert id to
// create records for each item with quantity > 0 
foreach($items as $key => $value){
    if(isset($_POST[$value])&&($_POST[$value]!=0)){
        if(!$created){
            $CreateSummarySql = $conn->prepare("Insert into ordersummary(CustomerID,EmployeeId,OrderTotalPrice) Values ( " 
            . $_POST['Customer'] . ", " 
            . $_POST['Employee'] . ", " 
            . $_POST['orderTotal'] . ");");
            $QueryResult = $CreateSummarySql->execute();
            $OrderID = $conn->insert_id;
            if(!$QueryResult){
                Echo($CreateSummarySql . "<br>");
                Echo(mysqli_error($conn));
            }
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $id = $row['OrderID'];
                }
            }
            $created=true;
        }
        $sql = $conn->prepare("INSERT INTO orderitem VALUES(?,?,?,?,?);");
        $itemID = $ids[$key];
        $qty = $_POST[$items[$key]];
        $price = $prices[$key];
        $filled = 'Unfilled';
        $sql->bind_param('iiids', $id, $itemID, $qty, $price, $filled);
        $sql->execute();
    }
}
header("Location: index.php");
?>
