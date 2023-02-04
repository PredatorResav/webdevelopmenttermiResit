<?php 
session_start();
// THE PDO CONNECTION IS STARTED
require 'meroconnection.php';

$loglog = false;

// IF THE USER LOGGED IN THAN
if(isset($_SESSION['login'])) {
    $loglog = true;
} else {
    header('Location:index.php');
    exit;
      
}

// IF THE ADMIN DID NOT LOG IN
if($_SESSION['isAdmin'] == false) {
    header('Location:index.php');
    exit;
}

// Retrives the new article from the database as it gets updated
if(isset($_POST['title'])) {
    $stmtt = $conn->prepare("update article set title=?, content=?");
    $asignnn = [$_POST['title'],$_POST['content']];
    $stmtt->execute($asignnn);
}

// IF ID IS NOT GIVEN IN THE URL THAN IT AUTOMATICALLY GOES TO ANOTHER PAGE .. 
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}


// ACcess the articles from the database as the below code 

$meroarti = $conn->prepare("select * from article where id=?");
$meroarti->execute([$_GET['id']]);

$titl; $contt;
if($wor = $meroarti->fetch()) {
    $titl = $wor['title'];
    $contt = $wor['content'];
}
else {
    exit;
}


// GETS CONTENT FROM THE re.php PAGE
require 're.php';

?>

<main>
    <nav>
        <ul>
            <!-- CHECKS THE LOGIN DETAILS FROM THE DATABASE AND SHOW THE MENU ACCORDINGLY -->
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
        <!-- IN ORDER TO EDIT ARTICLE THE BELOW FORM IS SHOWN -->
        <h2>Edit Article Admin</h2>

        <form action="#" method="post">
            <p>Edit  An Article: <?php echo $titl; ?></p>

            <label> Enter new Title</label>
            <input type="text" name="title" value = "<?php echo $titl; ?>"/>

            <label>Edit the content of Category</label>
            <textarea name="content" ><?php echo $contt; ?></textarea>

            <input type="submit" name="submit" value="Submit" />
        </form>
    </article>
</main>
<footer>
    <!-- THE FOOTER IS SHOWN IN THE EVERY PAGE -->
    &copy; Northampton News 2017
</footer>

</body>

</html>