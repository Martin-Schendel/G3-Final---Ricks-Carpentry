<?php
session_start();
require('Config.php');

// Get items

$stmt = $conn->query('SELECT * FROM Item');

$items = array();
$ids = array();
$prices = array();
$created = false;
$id = 0;
$total = 0.0;

if($stmt->num_rows > 0){
    
    while($row = $stmt->fetch_assoc()){
       $items[$row["ItemName"]] = "itemm" . $row["ItemID"];
       $ids[$row["ItemName"]] = $row["ItemID"];
       $prices[$row["ItemName"]] = $row['ItemSalePrice'];
    }
}

$sql = "Insert into orderitem Values ";

foreach($items as $key => $value){
    if(isset($_POST[$value])){

        if(!$created){
            $CreateSummorySql = "Insert into ordersummary(CustomerID,EmployeeId,OrderTotalPrice) "
            . "Values ( " . $_POST['Customer'] . "," . $_POST['Employee'] . ",100);";
            
            $QueryResult = $conn -> query($CreateSummorySql);

            if(!$QueryResult){
                Echo($CreateSummorySql . "<br>");
                Echo(mysqli_error($conn));
            }

            $GetSummorySql = "Select OrderID From ordersummary Where OrderDate =  " . 
            "(Select Max(OrderDate) from ordersummary)";

            $result = $conn -> query($GetSummorySql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $id = $row['OrderID'];
                }
            }

            $created=true;

        }

        //checks if the last character in the sql creatiion script is )
        //if it isn't that means that this isn't the first value and it puts in a comma.
        if(substr($sql,-1) != ' '){
            $sql .= ",";
        }

        $itemID = $ids[$key];
        $qty = $_POST[$items[$key]];
        $price = $prices[$key];
        $filled = 'Unfilled';

        $sql .= "($id, $itemID,$qty,$price,'$filled')";

        $total += $_POST[$items[$key]] * $prices[$key];
    }
}

$sql .= ";";

$queryCheck = $conn -> query($sql);

if(!$queryCheck){
    echo($sql);
    Echo(mysqli_error($conn));
}

$PriceSql = "UPDATE ordersummary SET OrderTotalPrice = $total WHERE OrderID = $id;";

$conn -> query($PriceSql);

header("Location: index.php");

?>
