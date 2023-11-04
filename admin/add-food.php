<?php include 'patials/menu.php' ?>

<div class="main-content">
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" required>
            </div>
            <div class="form-group">
                <label class="description">Description</label>
                <textarea name="description" id="" cols="30" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" required>
            </div>
            <div class="form-group">
                <label for="">Catagory</label>
                <select name="catagory">
                    <?php
                    $sql_food = "SELECT * FROM tbl_catagory";
                    $query_food = mysqli_query($conn , $sql_food);
                    while($row_food = mysqli_fetch_assoc($query_food)){
                        if($row_food['active']=="Yes"){ ?>
                    <option value="<?php echo $row_food['id'] ?>"><?php echo $row_food['title'] ?></option>
                    <?php }
                    }
                
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Feature</label>
                <input type="radio" name="feature" value="Yes">Yes
                <input type="radio" name="feature" value="No">No
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No">No
            </div>
            <button class="btn btn-success" name="sbm">Lưu</button>
        </form>
    </div>
</div>

<?php include 'patials/footer.php' ?>
<?php
    if(isset($_POST['sbm'])){
        $title = $_POST['title'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $catagory = $_POST['catagory'];
        $feature = $_POST['feature'];
        $active = $_POST['active'];

        //Auto rename file image
            $parts = explode('.', $image);
            $ext = end($parts);
            $image = "Food_".rand(0000,9999).'.'.$ext; 

        $sql = "INSERT INTO tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image',
            catagory_id = $catagory,
            featured = '$feature',
            active = '$active'            
        ";
        $query = mysqli_query($conn , $sql);
        move_uploaded_file($image_tmp , '../images/foods/'.$image );
        header('location: manage-food.php');
    }
   
?>