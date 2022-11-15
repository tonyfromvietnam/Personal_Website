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

    date_default_timezone_set('UTC');
    $date = date('jS F Y, G:i T');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql = "INSERT INTO BLOGS (blogTitle, blogContent, date1) VALUES ('$_POST[blogTitle]', '$_POST[blogContent]', '$date')";
    }    

    if ($conn->query($sql) === TRUE) {
        header('Location: viewPost.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>