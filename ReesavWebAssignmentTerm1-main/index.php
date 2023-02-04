<?php 
session_start();
// THE PDO CONNECTION IS STARTED 
require 'meroconnection.php';
$loglog = false;

// ACCESS THE re.php pages
require 're.php';

// CHECKS THE USER IS LOGGED IN OR NOT
if(isset($_SESSION['login'])) {
    $loglog = true;
}


// SELECTS THE EVERY ARTICLE FROM THE DATABASE
$stmtt = $conn->prepare('SELECT * FROM article ORDER BY publishDate desc LIMIT 10');
$stmtt->execute();

?>

<main>
    <nav>
        <ul>
            <!-- DIFFERENT TYPE OF SIDE BAR IS SHOWN IN THE MENU OPTION -->
            <?php 
        if($loglog == false) {
            echo '<li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>';
        } else {
            echo '<li><a href="logout.php">Log out</a></li>';
        }
    ?>
        </ul>
    </nav>
    <article>
        <!-- ARTICLE PAGE IS SHOWN -->
        <h2>Articles</h2>

        <ul>
            <?php 
            // TAKES EVERY ARTICLE FROM THE DATABASE WITH THEIR RESFPECTIVE DATE
            while($wors = $stmtt->fetch()) {
            echo '<li><p>'.$wors['title'].'<em>'."---------".$wors['publishDate'].'</em></p></li>';
            }
        
            ?>
        </ul>
    </article>
</main>
<footer>
    <!-- THE FOOTER IS SHOWN IN EVERY PAGE  -->
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
