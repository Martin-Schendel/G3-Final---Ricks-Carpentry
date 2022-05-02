<!-- code below is for error validation-->
<?php
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "name=empty") == true){
    echo "<p> First name is required </p>";
    exit();
}
else if (strpos($fullUrl, "name=numbers") == true){
    echo "<p> Only letters allowed in first name</p>";
    exit();
}
else if (strpos($fullUrl, "lastName=empty") == true){
    echo "<p> Last name is required</p>";
    exit();
}
else if (strpos($fullUrl, "lastName=numbers") == true){
    echo "<p> only letters allowed in last name</p>";
    exit();
}
else if (strpos($fullUrl, "email=empty") == true){
    echo "<p> Email is required</p>";
    exit();
}
else if (strpos($fullUrl, "email=invalid") == true){
    echo "<p> Invalid email format</p>";
    exit();
}
    else if (strpos($fullUrl, "phone=empty") == true){
        echo "<p> Phone number is required</p>";
        exit();
    }
 else if (strpos($fullUrl, "phone=invalid") == true){
        echo "<p> Invalid phone number - Please enter 10 digits</p>";
        exit();
}
else if (strpos($fullUrl, "userTag=empty") == true){
    echo "<p> Username is required</p>";
    exit();
}
else if (strpos($fullUrl, "userTag=invalid") == true){
    echo "<p> Only letters allowed in username</p>";
    exit();
}
else if (strpos($fullUrl, "Password=empty") == true){
    echo "<p> Password is required</p>";
    exit();
}
else if (strpos($fullUrl, "Password=invalid") == true){
    echo "<p> Passwords do not match!</p>";
    exit();
}

?>