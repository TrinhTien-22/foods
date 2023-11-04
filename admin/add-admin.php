<?php include 'patials/menu.php' ?>

<div class="main-content">
    <div class="wrapper">
        <h1>ADD</h1>
        <form method="post">
            <div class="form-group">
                <label for="" class="form">Full Name</label>
                <input type="text" name="full_name" placeholder="Your Full Name" required>
            </div>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="username" placeholder="Your User Name" required>

            </div>
            <div class="form-group">
                <label class="form">PassWord</label>
                <input type="password" name="password" placeholder="Your Pass Word" required>
            </div>
            <button class="btn btn-primary" name="sbm">ADD</button>
        </form>
    </div>
</div>

<?php include 'patials/footer.php' ?>
<?php 
    if(isset($_POST['sbm'])){
        $full_name = $_POST['full_name']; 
        $username = $_POST['username'];
        $password = $_POST['password'];  
        $sql = "INSERT INTO tbl_admin SET
                full_name = '$full_name',
                username = '$username',
                password = '$password'" ;
        $query = mysqli_query($conn , $sql);
        header('location:' .SITEURL.'admin/manage-admin.php' );
        $_SESSION['add']='ADD SUCCESS';
    }else{
        $_SESSION['add']='ADD ERROR';
    }
?>