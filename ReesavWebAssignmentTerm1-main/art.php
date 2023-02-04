<?php 
session_start();
// all the pdo connection are made 
require 'meroconnection.php';

require 're.php';

$loglog = false;

// the user is logged or not
if(isset($_SESSION['login'])) {
    $loglog = true;
}

// checks the crediantial
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}


// THE GIVEN ARTICLE ID IS SET IN THE URL ..
$stmtt = $conn->prepare('SELECT * FROM article where id=?');
$stmtt->execute([$_GET['id']]);
$title; $contt; $pubdt;
if($row = $stmtt->fetch()) {
    $titl = $row['title'];
    $contt = $row['content'];
    $pubdt = $row['publishDate'];
}
else {
    exit;
}

// IN ORDER TO COMMENT AND ADD THE GIVEN COMMENT TO THE DATABASE ..
if(isset($_POST['commentText']) == true) {
    $cmt = $conn->prepare("INSERT INTO comment (comment, article, user) values(?,?,?)");
    $criteria = [$_POST['commentText'],$_GET['id'],$_SESSION['user']];
    $cmt->execute($criteria);
}
?>

<main>
    <nav>
        <ul>
            <?php 
            // IT CHECKS WHEATHER A PERSON IS LOGGED IN OR NOT
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
        <!-- list the ariticle from the database -->
        <h1><?php echo $titl ?></h1>
        <em><?php echo $pubdt ?></em>
        <p> <?php
        echo $contt ?></p>
        <?php 

        // IF THE USER HAS LOGGED IN THAN THE COMMENT BOX IS APPEARED 
        if($loglog == true) {
           echo '<form action="#" method="post">
           <label>Add A comment to the article: ';
            echo $titl;
            echo '</label> <textarea name="commentText"></textarea>';
            echo '
           <input type="submit" name="submit" value="Submit" />';
        }
        

        ?>
        <ul style= 'clear:left'>
            <?php 
            // it access the comments from the database and shows in the pages
                $cmtt =  $conn->prepare('SELECT * FROM comment where article=?');
                $cmtt->execute([$_GET['id']]);

                while($er = $cmtt->fetch()) {
                    echo '<li>';
                    echo $er['comment'];
                    echo '</li>';
                }
            
            ?>
        </ul>
    </article>
</main>
<footer>
    <!-- footer is given in the below of every page -->
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
