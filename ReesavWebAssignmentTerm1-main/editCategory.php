<?php 
session_start();
// THE PDO CONNECTION IS STARTED 
require 'meroconnection.php';

$loglog = false;

// IF THE USER IS LOGGED IN OR NOT
if(isset($_SESSION['login'])) {
    $loglog = true;
} else {
    header('Location:index.php');
    exit;
      
}

// CHECKS THE ADMIN OR USER
if($_SESSION['isAdmin'] == false) {
    header('Location:index.php');
    exit;
}

// STORE THE VALUE IN DATABASE IN ORDER TO UPDATE CATEGORY
if(isset($_POST['name'])) {
    $stmtt = $conn->prepare("update category set name=?");
    $asignnn = [$_POST['name']];
    $stmtt->execute($asignnn);

}

// ACCESS THE DATABASE ACCORDING TO CATEGORY
$CAT = $conn->prepare("select * from category where id=?");
$CAT->execute([$_GET['id']]);

// enter the value in different variable
$mero = "";
if($wor = $CAT->fetch()) {
    $mero = $wor['name'];
}
else {
    exit;
}

// ACCESS THE re.php page
require 're.php';


?>

<main>
    <nav>
        <!-- logout option is shown in the menu option -->
        <ul>
            <li><a href="logout.php">Log out</a></li>

        </ul>
    </nav>
    <article>
        <!-- ENTER THE CATEGORY IN THE DATABASE -->
        <h2>Edit Category Admin</h2>

        <form action="#" method="post">
            <p>Edit Category named <?php echo $mero; ?> </p>

            <label>Enter the Category name</label>
            <input type="text" name="name" value=  "<?php echo $mero; ?>" />

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