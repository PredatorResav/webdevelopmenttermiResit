<?php 
session_start();
// IT HAS THE PDO CONNECTION THAT ARE NECESSARY
require 'meroconnection.php';
require 're.php';

$loglog = false;

// IT CHECKS IF THE USER LOGGED IN  
if(isset($_SESSION['login'])) {
    $loglog = true;
}

// IF THE USER is NOT
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}


// access the list of category from the database

$stmtt = $conn->prepare('SELECT * FROM category where id=?');
$stmtt->execute([$_GET['id']]);
$mero = '';
if($wor = $stmtt->fetch()) {
    $mero = $wor['name'];
}
// checks the statements and exits
else {
    exit;
}
?>

<main>
    <nav>
        <ul>
            <!-- checks the login data from the user in order to redirect to different page for user and admin -->
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
        <!-- list the categories from the database -->
        <h1>Articles in <?php echo $mero.' ' ?> Category</h1>
        <ul>
            <?php 
            // access the articles with there category id
            $meroarti =  $conn->prepare('select * from article where categoryId=?');
            $asignnn = [$_GET['id']];
            $meroarti->execute($asignnn);
            
            // store the values in different variable as id and title
            while($rr = $meroarti->fetch()) {
                $id = $rr['id'];
                $title = $rr['title'];
                echo '<li><a href="art.php?id='.$id.'"> '.$title.' </a></li>';
            }
            
            ?>
        </ul>
    </article>
</main>
<footer>
    <!-- the footer is shown in the below page -->
    &copy; Northampton News 2017
</footer>

</body>

</html>