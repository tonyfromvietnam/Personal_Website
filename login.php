<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'ecs417';

    // Creates connection.
    //
    $conn = new mysqli($db_host, $db_user, $db_password, $db_db);

    // Checks connection.
    //
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // write query for all fields.
    //
    $sql = 'SELECT * from USERS';

    // make query & get result.
    //
    $result = mysqli_query($conn, $sql);
    
    // fetch the data into an array.
    //
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory.
    //
    mysqli_free_result($result);

    $email = $_POST['email'];
    $password = $_POST['pass1'];

    foreach($users as $user) {
        if ($email == $user['email'] && $password == $user['passw']) {
            session_start();
            $_SESSION['fname'] = $user['firstName'];
            $_SESSION['sname'] = $user['lastName'];
            header('Location: addEntry.php');
        }
    }

    print_r("Invalid email/password. Please try again.");
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/duychinhdinh.css">
</head>
<body id="login-page">
    <h1>Welcome to Duy Chinh Dinh (Tony)'s Portfolio</h1>
    
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <p>
                <div style="text-align:center;">
                    <h1>
                        Login
                    </h2>
                </div>
            </p>
            <p>
                <div style="text-align:center;">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
            </p>
            <p>
                <div style="text-align:center;">
                    <input type="password" placeholder="Password" name="pass1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
                </div>
                Password must include: Uppercase, lowercase, number.
            </p>
            <p>
                <div style="text-align:center;">
                    <input type="submit" class="function" value="Login">
                </div>
            </p>
            <a href= "register.html">Register</a>
            <a href= "index.php">Home page</a>
        </fieldset>
    </form>
</body>
</html>