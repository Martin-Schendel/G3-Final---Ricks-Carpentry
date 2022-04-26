<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pat's Bakery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include_once "Header.php";?>
    <div class="content">
        <h2>New Employee</h2>
        <form action="CreateEmployee.php" method="post">
            <label for="EmpFirstName">Employee First Name:</label>
            <input type="text" id="EmpFirstName" name="EmpFirstName"><br><br>
            <label for="EmpLastName">Employee Last Name:</label>
            <input type="text" id="EmpLastName" name="EmpLastName"><br><br>
            <label for="EmpEmail">Employee Email:</label>
            <input type="text" id="EmpEmail" name="EmpEmail"><br><br>
            <label for="EmpPhone">Employee Phone:</label>
            <input type="text" id="EmpPhone" name="EmpPhone"><br><br>
            <label for="EmpUsername">Employee Username:</label>
            <input type="text" id="EmpUsername" name="EmpUsername"><br><br>
            <label for="EmpPassword">Employee Password:</label>
            <input type="password" id="EmpPassword" name="EmpPassword"><br><br>
            <!-- Lets also add some javascript to disable the submit button unless the fields are appropriately filled out and to ensure that the password and confirm password fields match -->
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <footer>
        Copyright 2022 Pat's Bakery
    </footer>
</body>
</html>