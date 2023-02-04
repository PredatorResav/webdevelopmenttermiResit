<?php 
session_start();
// IT HAS THE PDO CONNECTION THAT ARE NECESSARY
require 'meroconnection.php';

$loglog = false;

// IT CHECKS IF THE USER LOGGED IN  OR NOT
if(isset($_SESSION['login'])) {
    $loglog = true;
} else {
    header('Location:index.php');
    exit;
      
}

// IT CHECKS THE PERSOSN IS ADMIN OR NOT..
if($_SESSION['isAdmin'] == false) {
    header('Location:index.php');
    exit;
}

// IT ADDS THE  NEW CATEGORY NAME IN THE DATABASE..
if(isset($_POST['name'])) {
    $stmtt = $conn->prepare("INSERT INTO category (name) values(?)");
    $assignnn = [$_POST['name']];
    $stmtt->execute($assignnn);

}

// gets the re.php page 
require 're.php';

?>

<main>
    <!-- nav option are shown here -->
    <nav>
        <ul>
            <li><a href="logout.php">Log out</a></li>

        </ul>
    </nav>
    <article>
<!-- adding the new category in the database -->
        <h2>---------------- Add Category Admin ------------------</h2>

        <form action="#" method="post">
            <p>Please Add An Article for Northampton News:</p>
            <label>Enter the Category name</label>
            <input type="text" name="name" />

            <input type="submit" name="submit" value="Submit" />
        </form>
    </article>
</main>
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>