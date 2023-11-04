<?php include 'patials/menu.php' ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
        <a href="add-food.php" class="btn btn-primary">ADD FOOD</a>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Feature</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM tbl_food";
                    $query = mysqli_query($conn , $sql);
                    $id=1;
                    while($row = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $id++; ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td>$<?php echo $row['price'] ?></td>
                    <td><img width="100px" src="../images/foods/<?php echo $row['image_name'] ?>"></td>
                    <td><?php echo $row['featured'] ?></td>
                    <td><?php echo $row['active'] ?></td>
                    <td>
                        <a href="update-food.php?id=<?php echo $row['id'] ?>&image_name=<?php echo $row['image_name']?>"
                            class="btn btn-success">Sửa</a>
                        <a href="delete-food.php?id=<?php echo $row['id'] ?>&image_name=<?php echo $row['image_name']?>"
                            class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php  } ?>

            </tbody>
        </table>
    </div>
</div>

<?php include 'patials/footer.php' ?>