<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
					<ul>
						<?php 
						// access the all the  category that are listed in the database
							$CAT = $conn->prepare('select * from category');
							$CAT->execute();

							while($CATT = $CAT->fetch())
							{
								$mero = $CATT['name'];
								$meroid = $CATT['id'];
				
								echo '<li><a href="categories.php?id='.$meroid.'">'.$mero.'</a>';
							}
							
						?>
					</ul>
				</li>
				<?php 
				// IF THE ADMIN IS LOGGED IN THAN THE DIFFERENT SIDE BAR IS SHOWN WITH THE NEW MENU OPTION
				if(isset($_SESSION['login']) == true && $_SESSION['isAdmin'] == 1) {
					echo '<li><a href="adminCategories.php">Categories</a></li>';
					echo '<li><a href="adminArticles.php">Articles</a></li>';
				}
				?>
			</ul>
		</nav>
		<img src="images/banners/randombanner.php" />