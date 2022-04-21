<?php
session_start();
require_once('Config.php');

if (isset($_POST['EmpFirstName'])&&
    isset($_POST['EmpLastName'])&&
    isset($_POST['EmpEmail'])&&
    isset($_POST['EmpPhone'])&&
    isset($_POST['EmpUsername'])&&
    isset($_POST['EmpPassword'])){

        $fname = $_POST['EmpFirstName'];
        $lname= $_POST['EmpLastName'];
        $email= $_POST['EmpEmail'];
        $phone= $_POST['EmpPhone'];
        $uname = $_POST['EmpUsername'];
        $password = $_POST['EmpPassword'];
        $id = null;
         $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO employee VALUES(?,?,?,?,?,?,?)");
        //flipped password and username around because they were assigning the wrong values in database-ben
       $stmt->bind_param("issssss",$id,$fname,$lname,$email,$phone,$password,$uname);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
 
    
// Defining variables and set to empty values
$EmpFirstNameErr = $EmpLastNameErr = $EmpEmailErr = $EmpPhoneErr = $EmpUsernameErr = "";
$EmpFirstName = $EmpLastName = $EmpEmail = $EmpPhoneErr = $EmpUsername = "";

//Moved function because it was causing an error--mccarthy
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["EmpFirstName"])) {
        $EmpFirstNameErr = "First name is required";
    }
    else {
        $EmpFirstName = test_input($_POST["EmpFirstName"]);
            // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$EmpFirstName)) {
            $EmpFirstNameErr = "Only letters allowed";
            }
        }
    
    if (empty($_POST["EmpLastName"])) {
        $EmpLastNameErr = "Last name is required";
            }
    else {
        $EmpLastName = test_input($_POST["EmpLastName"]);
        // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$EmpLastName)) {
            $EmpLastNameErr = "Only letters allowed";
            }
    }

    if (empty($_POST["EmpEmail"])) {
        $EmpEmailErr = "Email is required";
        } 
    else {
        $EmpEmail = test_input($_POST["EmpEmail"]);
        // check if e-mail address is valid
            if (!filter_var($EmpEmail, FILTER_VALIDATE_EMAIL)) {
            $EmpEmailErr = "Invalid email format";
            }
    }
        
    if (empty($_POST["EmpPhone"])) {
        $EmpPhone = "";
        } 
    else {
        $EmpPhone = test_input($_POST["EmpPhone"]);
        // check if phone number is valid
            if (!preg_match('/^[0-9]{11}+$/', $EmpPhone)) {
            $EmpPhoneErr = "Invalid phone number";
            }
    }

    if (empty($_POST["EmpUsername"])) {
        $EmpUsernameErr = "Username is required";
    }
    else {
        $EmpUsernameErr = test_input($_POST["EmpUsername"]);
            // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$EmpUsernameErr)) {
            $EmpUsernameErr = "Only letters allowed";
            }
        }
}
}

header( "Location: index.html" );
?>
