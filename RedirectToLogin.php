<?php

    session_start();
    if(isset($_POST['Username']) && !isset($_SESSION['Username'])){
        $_SESSION['Username'] = $_POST['Username'];
        $_SESSION['Password'] = $_POST['Password'];
    } elseif (isset($_POST['Username']) && isset($_SESSION['Login'])){
            if($_SESSION['Login'] == false){
                $_SESSION['Username'] = $_POST['Username'];
                $_SESSION['Password'] = $_POST['Password'];
            }
        }
    

    

    if(!isset($_SESSION['Username'])){
        header("Location: LoginForm.html");
        exit();
    }

    $Servername = "localhost";
    $Username = "root";
    $Password = "mysql";
    $Dbname = "patsbakery";

    $conn = new mysqli($Servername,$Username,$Password,$Dbname);

    

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT EmployeeID,EmpPassword FROM employee";

    $result = $conn ->query($sql);

    $Users = array();

    if(!isset($_SESSION['Login'])){
        $_SESSION['Login'] = false;
    }

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            
            if($_SESSION['Username'] == strval($row["EmployeeID"])){
                if($_SESSION['Password'] == $row["EmpPassword"]){
                    $_SESSION['Login'] = true;
                }
            }
        }
    }

    if($_SESSION['Login'] == false) {
        header("Location: LoginForm.html");

    }


?>
