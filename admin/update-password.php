<?php 
    include 'patials/menu.php';
    $id = $_GET['id'];
    $sql_password="SELECT * FROM tbl_admin WHERE id=$id";
    $query_password = mysqli_query($conn , $sql_password);
    $row_password = mysqli_fetch_assoc($query_password);

    if(isset($_POST['sbm'])){
        $password = $_POST['current-password'];
        $newpassword = $_POST['new-password'];
        $againpassword = $_POST['again-password'];
        if($row_password['password']==$password&&$newpassword==$againpassword){
            $sql = "UPDATE tbl_admin SET 
            password = '$newpassword'
            WHERE password='$password'
            ";
            $query = mysqli_query($conn , $sql);
            $_SESSION['change-password'] = "Change password success!";
            header('location: manage-admin.php');
        }else{
            $_SESSION['error'] = "Bạn đã nhập sai !!! Vui lòng nhập lại.";
        }

    } 
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Mật khẩu hiện tại</label>
                <input type="text" name="current-password" required>
            </div>
            <div class="form-group">
                <label for="">Mật khẩu mới</label>
                <input type="text" name="new-password" required>
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input type="text" name="again-password" required>
            </div>
            <button class="btn btn-info" name="sbm">Lưu</button>
        </form>
    </div>
</div>

<?php include 'patials/footer.php' ?>