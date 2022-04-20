<?php
session_start();
require_once('Config.php');

if (isset($_POST['CustUserame'])&&
    isset($_POST['CustFirstName'])&&
    isset($_POST['CustLastName'])&&
    isset($_POST['CustEmail'])&&
    isset($_POST['CustPhone'])){

        $uname = $_POST['CustUserame'];
        $fname = $_POST['CustFirstName'];
        $lname= $_POST['CustLastName'];
        $email= $_POST['CustEmail'];
        $phone= $_POST['CustPhone'];
        $id = null;

        $stmt = $conn->prepare("INSERT INTO customer VALUES(?,?,?,?,?,?)");

        $stmt->bind_param("isssss",$id,$uname,$fname,$lname,$email,$phone);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
 
    
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
    if (empty($_POST["CustUsername"])) {
        $CustUsernameErr = "Username is required";
    }
    else {
        $CustUsername = test_input($_POST["CustUserame"]);
            // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$CustUsername)) {
            $CustUsernameErr = "Only letters allowed";
            }
        }

    if (empty($_POST["CustFirstName"])) {
        $CustFirstNameErr = "First name is required";
    }
    else {
        $CustFirstName = test_input($_POST["CustFirstName"]);
            // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$CustFirstName)) {
            $CustFirstNameErr = "Only letters allowed";
            }
        }
    
    if (empty($_POST["CustLastName"])) {
        $CustLastNameErr = "Last name is required";
            }
    else {
        $CustLastName = test_input($_POST["CustLastName"]);
        // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$CustLastName)) {
            $CustLastNameErr = "Only letters allowed";
            }
    }

    if (empty($_POST["CustEmail"])) {
        $CustEmailErr = "Email is required";
        } 
    else {
        $CustEmail = test_input($_POST["CustEmail"]);
        // check if e-mail address is valid
            if (!filter_var($CustEmail, FILTER_VALIDATE_EMAIL)) {
            $CustEmailErr = "Invalid email format";
            }
    }
        
    if (empty($_POST["CustPhone"])) {
        $CustPhone = "";
        } 
    else {
        $CustPhone = test_input($_POST["CustPhone"]);
        // check if phone number is valid
            if (!preg_match('/^[0-9]{10}+$/', $CustPhone)) {
            $CustPhoneErr = "Invalid phone number - Please enter 10 digits";
            }
    }
}
}
?>