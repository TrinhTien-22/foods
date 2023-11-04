<?php 
    include 'patials/menu.php';
    $id = $_GET['id'];
    
    $sql_id = "SELECT * FROM tbl_admin WHERE id = $id";
    $query_id = mysqli_query($conn, $sql_id);
    $row_id = mysqli_fetch_assoc($query_id);

    if(isset($_POST['sbm'])){
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $sql = "UPDATE tbl_admin SET 
        full_name = '$full_name',
        username = '$username'
        WHERE id=$id";
        $query = mysqli_query($conn , $sql);
        if($query){
            $_SESSION['sua'] = "Update success";
        }
        header('location: manage-admin.php');
    }


?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update-Admin</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" name="full_name" required value="<?php echo $row_id['full_name'] ?>">
            </div>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="username" required value="<?php echo $row_id['username'] ?>">
            </div>
            <button class="btn btn-primary" name="sbm">Update</button>
        </form>
    </div>
</div>

<?php include 'patials/footer.php' ?>