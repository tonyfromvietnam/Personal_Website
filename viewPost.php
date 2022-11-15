<?php
    session_start();
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
    $sql = 'SELECT * from BLOGS';

    // make query & get result.
    //
    $result = mysqli_query($conn, $sql);
    
    // fetch the data into an array.
    //
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (count($array) == 0) {
        header('Location: addEntry.php');
    }
    
    function sortArray($array) {
        for ($counter = 0; $counter < count($array) - 1; $counter++){
            for ($i = 0; $i < count($array) - 1 - $counter; $i++){
                if (date_parse($array[$i]['date1']) < date_parse($array[$i + 1]['date1'])) {
                    $lower = $array[$i];
                    $array[$i] = $array[$i + 1];
                    $array[$i + 1] = $lower;
                }
            }
        }
        return $array;
    }
    
    $blogs = sortArray($array);

    function blogType($arrays, $start, $end) {
        $list = array();
        foreach ($arrays as $array) {
            if (date("n", strtotime($array['date1'])) > $start && date("n", strtotime($array['date1'])) <= $end) {
                $list [] = $array;
            }
        }
        return $list;
    }

    $springBlog = blogType($blogs, 0, 3);
    $summerBlog = blogType($blogs, 3, 6);
    $autumnBlog = blogType($blogs, 6, 9);
    $winterBlog = blogType($blogs, 9, 12);


    // free result from memory.
    //
    mysqli_free_result($result);

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<style>
.collapsible {
    background-color: #3A6B35;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 18px;
}

.active, .collapsible:hover {
    background-color: #CBD18F;
}

.collapsible:after {
    content: '\002B';
    color: white;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.active:after {
    content: "\2212";
}

.content {
    padding: 0 18px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    background-color: #f1f1f1;
}

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duy Chinh Dinh (Tony)'s Blog</title>
    <link rel="stylesheet" href="css/duychinhdinh.css">
</head>
<body>
    <header>
        <hgroup>
            <h1>Duy Chinh Dinh (Tony)</h1>
            <h3 id="title">BSc Computer Science at Queen Mary University of London.</h3>
            <?php if (isset($_SESSION['fname'])) { 
                echo '<a href= "logout.php">Log out</a>';
            } else {
                echo '<a href= "login.php">Log in</a><br>';
                echo '<a href= "register.html">Register</a>';
            } ?>
        </hgroup>
    </header>
    
    <nav>
        <a href= "index.php" space="navi">About me</a>
        <a href= "my_CV.html" space="navi">My CV</a>
        <a href= "education.html" space="navi">Education</a>
        <a href= "skills.html" space="navi">Skills</a>
        <a href= "addEntry.php" space="navi">Add a Post</a>
        <a href= "viewPost.php" space="navi">View Blog</a>
    </nav>

    <div id="skills">
    
        <div>
            <button class="collapsible">Spring Blogs</button>
            <div class="content" id="springBlog">
            <?php foreach($springBlog as $blog) { ?>
                <hr />
                <table align="center">
                    <tbody>
                        <h1><?php echo htmlspecialchars($blog['blogTitle']); ?></h1>
                        <tr><td><?php echo htmlspecialchars($blog['date1']); ?></td></tr>
                        <tr><td><?php echo htmlspecialchars($blog['blogContent']); ?></td></tr>
                    </tbody>
                </table>
                <hr />
            <?php } ?>    
            </div>
        </div>     
    
        <div>
            <button class="collapsible">Summer Blogs</button>
            <div class="content" id="summerBlog">
            <?php foreach($summerBlog as $blog) { ?>
                <hr />
                <table align="center">
                    <tbody>
                        <h1><?php echo htmlspecialchars($blog['blogTitle']); ?></h1>
                        <tr><td><?php echo htmlspecialchars($blog['date1']); ?></td></tr>
                        <tr><td><?php echo htmlspecialchars($blog['blogContent']); ?></td></tr>
                    </tbody>
                </table>
                <hr />
            <?php } ?>    
            </div> 
        </div>

        <div>
            <button class="collapsible">Autumn Blogs</button>
            <div class="content" id="autumnBlog">
            <?php foreach($autumnBlog as $blog) { ?>
                <hr />
                <table align="center">
                    <tbody>
                        <h1><?php echo htmlspecialchars($blog['blogTitle']); ?></h1>
                        <tr><td><?php echo htmlspecialchars($blog['date1']); ?></td></tr>
                        <tr><td><?php echo htmlspecialchars($blog['blogContent']); ?></td></tr>
                    </tbody>
                </table>
                <hr />
            <?php } ?>    
            </div> 
        </div>

        <div>
            <button class="collapsible">Winter Blogs</button>
            <div class="content" id="winterBlog">
            <?php foreach($winterBlog as $blog) { ?>
                <hr />
                <table align="center">
                    <tbody>
                        <h1><?php echo htmlspecialchars($blog['blogTitle']); ?></h1>
                        <tr><td><?php echo htmlspecialchars($blog['date1']); ?></td></tr>
                        <tr><td><?php echo htmlspecialchars($blog['blogContent']); ?></td></tr>
                    </tbody>
                </table>
                <hr />
            <?php } ?>    
            </div> 
        </div>

    <footer>
        <p><i>© This is Duy Chinh Dinh's product. Thank you very much for visiting.</i></p>
    </footer>


<script>
    let coll = document.getElementsByClassName("collapsible");
    let i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            let content = this.nextElementSibling;
            if (content.style.maxHeight) {
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            } 
        });
    }
</script>

</body>
</html>

