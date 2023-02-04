<?php 
session_start();
// THE PDO CONNECTION IS STARTED
require 'meroconnection.php';

// ACCESS THE re.php 
require 're.php';

// CHECKS IF THE USER LOGGED IN OR NOT
if(isset($_SESSION['login'])) {
    header('Location:index.php');
    exit;
}

// REGISTER TO BE A NEW USER
if(isset($_POST['email'])) {
    $stmtt = $conn->prepare("INSERT INTO users (email, name, password) values(?,?,?)");
    $asignnn = [$_POST['email'], $_POST['name'],$_POST['password'] ];
    $stmtt->execute($asignnn);
    header('Location:login.php');
}

?>

<main>
    <!-- nav menu is shown -->
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register an account</a></li>
        </ul>
    </nav>
    <article>

    <!-- shows the heading name -->
        <h2>Register into Northampton News</h2>
        <form action="#" method="post">
            <p>Can You Please Enter Your Details To Register:</p>

            <!-- ENTER THE DETAILS IN ORDER TO REGISTER AS A NEW USER -->
            <label>Please Enter your Correct email</label>
             <input type="email" name = "email" />
            <label>Create a password to secure your account</label>
             <input type="password" name = "password" />
            <label>Please Enter Your Name</label> 
            <input type="text" name = "name" />

            <input type="submit" name="submit" value="Submit" />
        </form>


<!-- footer is given here -->
    </article>
</main>
<footer>
    <!-- THE FOOTER IS SHOWN IN EVERY PAGE -->
    &copy; Northampton News 2017
</footer>

</body>

</html>