<?php include '../config/db.php' ; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
    <div class="login text-center">
        <h2>LOGIN ADMIN</h2><br>
        <?php 
            if(isset($_SESSION['login-fails'])){
                echo $_SESSION['login-fails'];
                unset($_SESSION['login-fails']);
            }
            if(isset($_SESSION['no-login'])){
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">User Name</label><br>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="">Pass Word</label><br>
                <input type="password" name="password" required>
            </div><br>
            <button class="btn btn-success" name="sbm">Login</button>
        </form>

    </div>
</body>

</html>
<?php 
    
    if(isset($_POST['sbm'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($conn , $sql);
        $findrow = mysqli_num_rows($query);
        if($findrow == 1){
            $_SESSION['user']= $username;
            header('location: index.php' );
        }else{
            $_SESSION['login-fails']="User or Password not match";
            header('location: login.php');
        }
    }
    
?>