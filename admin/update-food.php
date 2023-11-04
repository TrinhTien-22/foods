<?php include 'patials/menu.php';
    $id = $_GET['id'];
    $image_current = $_GET['image_name'];
    $sql_current = "SELECT * FROM tbl_food WHERE id=$id";
    $query_current = mysqli_query($conn , $sql_current);
    $row_current = mysqli_fetch_assoc($query_current);
?>

<div class="main-content">
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" required value="<?php echo $row_current['title'] ?>">
            </div>
            <div class="form-group">
                <label class="description">Description</label>
                <textarea name="description" id="" cols="30" rows="3"
                    required><?php echo $row_current['description'] ?></textarea></textarea>
            </div>
            <div class=" form-group">
                <label for="">Image Current</label>
                <img width="100px" src="../images/foods/<?php echo $image_current?>">
            </div>
            <div class="form-group">
                <label for="">New Image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" required value="<?php echo $row_current['price'] ?>">
            </div>
            <div class="form-group">
                <label for="">Catagory</label>
                <select name="catagory">
                    <?php
                    $sql_food = "SELECT * FROM tbl_catagory";
                    $query_food = mysqli_query($conn , $sql_food);
                    while($row_food = mysqli_fetch_assoc($query_food)){
                        if($row_food['active']=="Yes"){ ?>
                    <option <?php if($row_current['catagory_id']==$row_food['id']){echo "selected" ; } ?>
                        value="<?php echo $row_food['id'] ?>"><?php echo $row_food['title'] ?></option>
                    <?php }
                    }  
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Feature</label>
                <input <?php if($row_current['featured']=="Yes"){echo "checked";} ?> type="radio" name="feature"
                    value="Yes">Yes
                <input <?php if($row_current['featured']=="No"){echo "checked";} ?> type="radio" name="feature"
                    value="No">No
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <input <?php if($row_current['active']=="Yes"){echo "checked";} ?> type="radio" name="active"
                    value="Yes">Yes
                <input <?php if($row_current['active']=="No"){echo "checked";} ?> type="radio" name="active"
                    value="No">No
            </div>
            <button class="btn btn-success" name="sbm">Lưu</button>
    </div>
</div>


<?php include 'patials/footer.php' ?>
<?php
    if(isset($_POST['sbm'])){
        $title = $_POST['title'];
        $description=$_POST['description'];
        $newimage = $_FILES['image']['name'];
        $newimage_tmp = $_FILES['image']['tmp_name'];
        $price = $_POST['price'];
        $catagory = $_POST['catagory'] ;
        $feature = $_POST['feature'];
        $active = $_POST['active'];

        if($newimage != ""){
            $parts = explode('.', $newimage);
            $ext = end($parts);
            $newimage = "Food_".rand(0000,9999).'.'.$ext; 

            unlink('../images/foods/'.$image_current);
            move_uploaded_file($newimage_tmp, '../images/foods/'.$newimage);
            $sql = "UPDATE tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$newimage',
                catagory_id = $catagory,
                featured = '$feature',
                active = '$active' 
            WHERE id = $id";
            $query = mysqli_query($conn , $sql);
        }else{
            $sql = "UPDATE tbl_food SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_current',
                catagory_id = $catagory,
                featured = '$feature',
                active = '$active' 
            WHERE id = $id";
            $query = mysqli_query($conn , $sql);
        }
        header('location: manage-food.php');
    }

?>