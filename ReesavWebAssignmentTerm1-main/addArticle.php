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
//IT CHECKS IF THE PERSON IS ADMIN OR NOT..
if($_SESSION['isAdmin'] == false) {
    header('Location:index.php');
    exit;
}

//IT SUBMITS THE FORM WHERE IT ADDS THE NEW ARTICLE TO THE DATABASE..
if(isset($_POST['title'])) {
    $stmtt = $conn->prepare("INSERT INTO article (title, content, categoryId, publishDate) values(?,?,?,?)");
    $assignnn = [$_POST['title'],$_POST['content'],$_POST['category'], date('Y-m-d h:i:s')];
    $stmtt->execute($assignnn);
}


// SELECT ALL THE CATEGORY THAT ARE LISTED IN THE DATABASE.. 
$stmtt = $conn->prepare('SELECT * FROM category');
$stmtt->execute();
require 're.php';

?>

<main>
    <!-- nav menu option is shown here -->
    <nav>
        <ul>
            <?php 

            // IF THE PERSON IS LOGGED IN THAN THE DIFFERENT SIDE BAR IS SHOWN THERE ARE TWO DIFFERENT SIDE BAR GIVEN ACCORDING TO THE USER AND ADMIN
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
        <!-- in order to add an article for the admin -->
        <h2>-------------- Add Article Admin ------------</h2>

        <form action="#" method="post">
            <p>Please Create An New Article:</p>

            <label>Title</label>
            <input type="text" name="title" />

            <label>content</label>
            <textarea name="content"></textarea>

            <label>Category</label>

            
            <select name="category">
                <?php 
                // WHEN ADDING THE NEW CATOGORY TO AN ARTICLE ,CATEGORY THAT ARE LISTED BEFORE ARE SHOWN FOR THE OPTION..
                while($z = $stmtt->fetch()){
                    $meroid = $z['id'];
                    $mero = $z['name'];
                    // THE VALUES ARE KEPT AS AN ID OF CATEGORY BECAUSE ID IS SET IN THE DATABASE..
                    echo('<option value="'.$meroid.'">'.$mero.'</option>');
                }
                ?>
            </select>
            <input type="submit" name="submit" value="Submit" />
        </form>
    </article>
</main>
<!-- footer is given here -->
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>