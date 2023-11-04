<?php include 'config/db.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <!-- Bootstrap CSS từ phiên bản Bootstrap 5 -->

    <!-- Latest compiled and minified CSS -->


    <!-- Latest compiled and minified CSS -->

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo2.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Drinks</a>
                    </li>
                    <?php 
                    if(!empty($_SESSION['user_id'])) {
                        echo '<li><a href="cart.php">My Cart</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                    }else{
                        echo '<li><a href="login.php">Login</a></li>';
                        echo '<li><a href="registion.php">Registion</a></li>';
                    }
                    
                    ?>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->