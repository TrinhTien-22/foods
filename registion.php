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
                <div class=" form-group">
                    <label for="">User</label>
                    <input type=" text" name="user_name" class="form-control">
                </div>
                <div class=" form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <button class="btn btn-success" name="sbm">Registion</button>
                <button class="btn btn-danger" name="sbm_cancel">Cancel</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php 
    if(isset($_POST['sbm'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $email  = $_POST['email'];
        $sql = "INSERT INTO user SET user_name = '$user_name' , password = '$password' , email = '$email'";
        $query = mysqli_query($conn , $sql);
        header('location: login.php');
    }
    if(isset($_POST['sbm_cancel'])){
        header('location: index.php');
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