<?php 
session_start();
if (isset($_SESSION['fname'])) {
    print_r("Welcome, ".$_SESSION['fname'] ." " .$_SESSION['sname']. '.<br>');
    print_r("You're logged in.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duy Chinh Dinh (Tony)</title>
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

    <div id="body">
        <div>
            <section>
                <h3 id="about-me">About me</h3>    
                <hr />
                <article>
                    <p>My name is Duy Chinh Dinh, I come from Vietnam and you can call me Tony.</p>
                    <p>I'm currently a first year student in BSc Computer Science of Queen Mary University of London.</p>
                    <p>I'm having an interest in Artifical Intelligence, Machine Learning, and a little in about Data Science.</p>
                </article>
                <figure>
                    <img src="img/DuyChinhDinh.jpg" alt="Duy Chinh Dinh" width="15%">
                    <figcaption><i>Duy Chinh Dinh (Tony)</i></figcaption>
                </figure>
            </section>
        </div>
        
        <div>
            <section>
                <h3 id="my-hobbies">My hobbies</h3>
                <hr />
                <article>
                    <p>I really enjoy doing these activities.</p>
                    <ol>
                        <li>Playing football.</li>
                        <li>Learning new things.</li>
                        <li>Listening and try to make some music.</li>
                        <li>Communicating with other people.</li>
                        <li>Doing videography.</li>
                    </ol>
                    <p id="hobbies"><i>If we have some common hobbies, I really think we should be friends.</i><p>
                </article>
            </section>
        </div>

        <div>
            <section>
                <h3 id="social-media">My social media</h3>
                <hr />
                <section>
                    <p>These are the links to my social media.</p>
                    <ul>
                        <li><a href= "https://www.facebook.com">Facebook.</a></li>
                        <li><a href= "https://www.instagram.com">Instagram.</a></li>
                        <li><a href= "https://www.youtube.com">Youtube.</a></li>
                    </ul>
                </section>
            </section>
        </div>
    </div>

    <footer>
        <p><i>© This is Duy Chinh Dinh's product. Thank you very much for visiting.</i></p>
    </footer>
</body>
</html>