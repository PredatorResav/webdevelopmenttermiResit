<?php 
session_start();
// THE PDO CONNECTION IS STARTED 
require 'meroconnection.php';

// IF THE USER IS ALREADY LOGGED IN THAN NOT ANOTHER LOG IN IS ACCEPTED.. 
if(isset($_SESSION['login'])) {
    header('Location:index.php');
    exit;
}

// IF THE USER TRIES TO LOG IN 
if(isset($_POST['email'])) {
    // SEARCH THE EMAIL AND PASSWORD IN THE DATABASE
    $stmtt = $conn->prepare('SELECT * FROM users WHERE email=:hemail AND password=:hpassword');
    $asignnn = ['hemail'=> $_POST['email'], 'hpassword'=> $_POST['password']];
    $stmtt->execute($asignnn);
    if($ussr = $stmtt -> fetch()) { // CHECKS THE USER DETAILS FROM THE DATABASE
        $_SESSION['login'] = true;
        $_SESSION['user'] = $ussr['id'];
        $_SESSION['isAdmin'] = $ussr['isAdmin'];
        header('Location:index.php');
    }
    else echo 'wrong password';
}

// ACCESS THE re.php page for the content 
require 're.php';

?>

<main>
    <!-- THE BELOW MENU ARE DISPLAYED IN THE LOGIN PAGE FOR THE USER TO LOGIN OR REGISTER -->
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register an account</a></li>
        </ul>
    </nav>
    <article>
        <!-- IN THE LOGIN PAGE PLEASE ENTER THE DEATAILS TO LOGIN  -->
        <h2>Log in Page</h2>
        <form action="#" method="post">
            <p>Can You Please Enter Your Details To Login:</p>

            <label>E-mail</label> <input type="email" name = "email" />
            <label>Password</label> <input type="password" name = "password" />
            <input type="submit" name="submit" value="Submit" />
        </form>

    </article>
</main>
<footer>
    <!-- THE FOOTER PAGE IS SHOWN IN EVERY PAGE -->
    &copy; Northampton News 2017
</footer>

</body>

</html>