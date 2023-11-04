<?php include 'patials/menu.php' ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Catagory</h1>
        <br>
        <a href="add-catagory.php" class="btn btn-primary">ADD - CATAGORY</a>
        <br><br>
        <?php
            if(isset($_SESSION['notdelete'])){
                echo $_SESSION['notdelete'];
                unset($_SESSION['notdelete']);
            }
            if(isset($_SESSION['okdelete'])){
                echo $_SESSION['okdelete'];
                unset($_SESSION['okdelete']);
            }
            if(isset($_SESSION['loiunlink'])){
                echo $_SESSION['loiunlink'];
                unset($_SESSION['loiunlink']);
            }
        
        ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Feature</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM tbl_catagory";
                    $query = mysqli_query($conn, $sql);
                    
                    $id =1;
                    while($rows = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $id++; ?></td>
                    <td><?php echo $rows['title'] ?></td>
                    <td><img style="width: 100px;" src="../images/catagory/<?php echo $rows['image_name'] ?>"></td>
                    <td><?php echo $rows['featured'] ?></td>
                    <td><?php echo $rows['active'] ?></td>
                    <td>
                        <a href="update-catagory.php?id=<?php echo $rows['id'] ?>&image_name=<?php echo $rows['image_name'] ?>"
                            class="btn btn-success">Sửa</a>
                        <a href="delete-catagory.php?id=<?php echo $rows['id'] ?>&image_name=<?php echo $rows['image_name'] ?>"
                            class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php    }
                ?>


            </tbody>
        </table>
    </div>
</div>

<?php include 'patials/footer.php' ?>