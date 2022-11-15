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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO USERS (firstName, lastName, email, passw) VALUES ('$_POST[fname]', '$_POST[sname]', '$_POST[email]', '$_POST[pass1]')";
    }    
    
    if ($conn->query($sql) === TRUE) {
        header('Location: registration.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>
