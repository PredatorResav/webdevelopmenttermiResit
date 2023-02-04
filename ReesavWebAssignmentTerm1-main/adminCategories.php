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

// IT ACCESS ALL THE CATEGORY THAT ARE STORED IN DATABASE
$meroarti = $conn->prepare('select * from category');
$meroarti->execute();

// gets the re.php page 
require 're.php';


?>

<main>
    <nav>
        <!-- log out menu option is shown in the page -->
        <ul>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </nav>
    <article>
        <h2>Category Management</h2>

        <a href = 'addCategory.php'><button>Add Category</button></a>

        <p>
            Category List:
        </p>
       <ul>


        <?php 
        // IN ORDER TO EDIT OR DELETE THE PRESENT CATEGORY THAT ARE ON THE DATABASE.. 
            while($wor = $meroarti->fetch()) {
                echo '<li>'.$wor['name'].'<a href="editCategory.php?id='.$wor['id'].'">Edit</a><a href="deleteCategory.php?id='.$wor['id'].'">Delete</a></li>';
            }
        ?>

       </ul>
    </article>
</main>
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>