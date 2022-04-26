<?php ?>
<html>
    <head>
        <link rel="stylesheet" href="Sample.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="POST" action="index.php">
                <input name="UserName" id="UserName" type="text" placeholder="username"/>
                <input name="Password" id="Password" type="password" placeholder="password"/>
                <button method=POST >login</button>
                <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
            </form>
        </div>
    </div>
</body>
</html>