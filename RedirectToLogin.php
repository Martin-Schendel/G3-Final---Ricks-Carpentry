<?php
    session_start();
    if(isset($_POST['UserName']) && !isset($_SESSION['UserName'])){
        $_SESSION['UserName'] = $_POST['UserName'];
    }
    if(!isset($_SESSION['UserName'])){
        header("Location: Employees.php");
        exit();
    }
?>