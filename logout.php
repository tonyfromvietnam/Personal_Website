<?php 
    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
    <link rel="stylesheet" href="css/duychinhdinh.css">
</head>
<body>
    <div style="text-align:center;">
        <h1>
            You have been logged out!
        </h1>
        <a href= "index.php">Homepage</a>
        <a href= "login.php">Log in</a>
        <a href= "viewPost.php">View Post</a>
    </div>
</p>
</body>
</html>