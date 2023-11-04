<?php include 'patials/menu.php' ?>
<!-- Main content -->

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE-ADMIN</h1>
        <br>
        <a href="add-admin.php" class="btn btn-primary">ADD Admin</a>
        <br><br>
        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['sua'])){
                echo $_SESSION['sua'];
                unset($_SESSION['sua']);
            }
            if(isset($_SESSION['change-password'])){
                echo $_SESSION['change-password'];
                unset($_SESSION['change-password']);
            }
        
        ?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM tbl_admin";
                    $query = mysqli_query($conn , $sql);
                    $id = 1;
                    while ($row = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $id++; ?> </td>
                    <td><?php echo $row['full_name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td>
                        <a href="update-admin.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Sửa</a>
                        <a href="delete-admin.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a>
                        <a href="update-password.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Đổi mật khẩu</a>
                    </td>
                </tr>
                <?php  } ?>


            </tbody>
        </table>
    </div>
</div>
<?php include 'patials/footer.php' ?>