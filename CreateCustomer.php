<?php
session_start();
require('Config.php');

if (isset($_POST['CustFirstName'])&&
    isset($_POST['CustLastName'])&&
    isset($_POST['CustEmail'])&&
    isset($_POST['CustPhone'])){

        $fname = $_POST['CustFirstName'];
        $lname= $_POST['CustLastName'];
        $email= $_POST['CustEmail'];
        $phone= $_POST['CustPhone'];
        $id = null;

        $stmt = $conn->prepare("INSERT INTO customer VALUES(?,?,?,?,?)");

        $stmt->bind_param("issss",$id,$fname,$lname,$email,$phone);
       
       
// Defining variables and set to empty values
$CustFirstNameErr = $CustLastNameErr = $CustEmailErr = $CustPhoneErr = $CustUsernameErr = "";
$CustFirstName = $CustLastName = $CustEmail = $CustPhone = $CustUsername = "";

//Moved function because it was causing an error--mccarthy
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if (empty($_POST["CustUsername"])) {
    //     $CustUsernameErr = "Username is required";
    // }
    // else {
    //     $CustUsername = test_input($_POST["CustUserame"]);
    //         // check if name only contains letters
    //         if (!preg_match("/^[a-zA-Z]*$/",$CustUsername)) {
    //         $CustUsernameErr = "Only letters allowed";
    //         }
    //     }

    if (empty($_POST["CustFirstName"])) {
       // $CustFirstNameErr = "First name is required";
        header( "Location: Customers.php?name=empty" );
        exit();
    }
    else {
        $CustFirstName = test_input($_POST["CustFirstName"]);
            // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$CustFirstName)) {
            //$CustFirstNameErr = "Only letters allowed";
            header( "Location: Customers.php?name=numbers" );
            exit();
            }
        }
    
    if (empty($_POST["CustLastName"])) {
        //$CustLastNameErr = "Last name is required";
        header( "Location: Customers.php?lastName=empty" );
        exit();
            }
    else {
        $CustLastName = test_input($_POST["CustLastName"]);
        // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$CustLastName)) {
            //$CustLastNameErr = "Only letters allowed";
            header( "Location: Customers.php?lastName=numbers" );
            exit();
            }
    }

    if (empty($_POST["CustEmail"])) {
        //$CustEmailErr = "Email is required";
        header( "Location: Customers.php?email=empty" );
            exit();
        } 
    else {
        $CustEmail = test_input($_POST["CustEmail"]);
        // check if e-mail address is valid
            if (!filter_var($CustEmail, FILTER_VALIDATE_EMAIL)) {
            //$CustEmailErr = "Invalid email format";
            header( "Location: Customers.php?email=invalid" );
            exit();
            }
    }
        
    if (empty($_POST["CustPhone"])) {
        //$CustPhone = "";
        header( "Location: Customers.php?phone=empty" );
            exit();
        } 
    else {
        $CustPhone = test_input($_POST["CustPhone"]);
        // check if phone number is valid
            if (!preg_match('/^[0-9]{10}+$/', $CustPhone)) {
            //$CustPhoneErr = "Invalid phone number - Please enter 10 digits";
            header( "Location: Customers.php?phone=invalid" );
            exit();
            }
    }
    //moved down here so if checks fail database will not be updated
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
}
}

header( "Location: index.php" );
?>
