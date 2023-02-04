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


// IT ACCESS ALL THE ARTICLE THAT ARE STORED IN DATABASE
$meroarti = $conn->prepare('select * from article');
$meroarti->execute();

// retrives the re.php page 
require 're.php';


?>

<main>
    <!-- the below code shows the navigation menu in the website -->
    <nav>
        <ul>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </nav>
    <article>
        <h2>Article Management</h2>

        <a href = 'addArticle.php'><button>Add Article</button></a>

        <p>
            <!-- it shows list of all the given articles -->
            Article List:
        </p>
       <ul>


        <?php 
        // IN ORDER TO EDIT OR DELETE THE CURRENT ARTICLE FROM THE DATABASE.. 
            while($wor = $meroarti->fetch()) {
                echo '<li>'.$wor['content'].'<a href="editArticle.php?id='.$wor['id'].'">Edit</a><a href="deleteArticle.php?id='.$wor['id'].'">Delete</a></li>';
            }
        ?>

       </ul>
    </article>
</main>

<!-- footer is show in the below in the website  -->
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>