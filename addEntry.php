<?php 
    session_start();
    if (!isset($_SESSION['fname'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="css/duychinhdinh.css">
    <script src="addEntry.js" defer></script>
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

    <div id="blog-page">
        <h1>Post a Blog on my Portfolio</h1>

        <form method="POST" action="addPost.php">
            <fieldset>
                <p>
                    <div style="text-align:center">
                        <h1>Add Blog</h1>
                    </div>
                </p>

                <div style="text-align:center">
                    <input type="text" placeholder="Title" name="blogTitle" id="blogTitle">
                </div>
            
                <div style="text-align:center">
                    <textarea rows="8" placeholder="Enter your text here." name="blogContent" id="blogContent"></textarea>
                </div>

                <div style="text-align:center">
                    <input type="submit" id="submit" class="function" value="Post">
                    <input type="reset" id="clear" class="function" value="Clear">
                </div>

            </fieldset>
        </form>
    </div>

    <footer>
        <p><i>© This is Duy Chinh Dinh's product. Thank you very much for visiting.</i></p>
    </footer>
</body>
</html>