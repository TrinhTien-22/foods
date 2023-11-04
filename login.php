<?php include 'config/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="wrapper">
            <form action="" method="post">
                <h2>Login</h2>
                <br>
                <?php
                if(isset($_SESSION['notlogin'])){
                    echo $_SESSION['notlogin'];
                    unset($_SESSION['notlogin']);
                }
                ?>
                <div class=" form-group">
                    <label for="">User</label>
                    <input type=" text" name="user_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <br><br>
                <button class="btn btn-success" name="sbm">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php 
    if(isset($_POST['sbm'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE user_name = '$user_name' AND password = '$password'";
        $query = mysqli_query($conn , $sql);
        $row = mysqli_num_rows($query);
        if($row == 1){
            $_SESSION['user_id'] = $user_name ;
            header('location: index.php');
        }else{
            $_SESSION['notlogin'] = "User or Password not match";
        }
    }


?>
<style>
.text-center {
    text-align: center;
}

.wrapper {
    text-align: center;
}

.wrapper h2 {
    text-align: center;
}

.container {
    margin: 100px auto;
    width: 400px;
    height: 400px;
    border: 1px solid black;
    border-radius: 15px;
}
</style>