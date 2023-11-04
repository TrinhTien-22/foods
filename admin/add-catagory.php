<?php include 'patials/menu.php' ?>

<div class="main-content">
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" required>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image">
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
        $feature = $_POST['feature'];
        $active = $_POST['active'];

        //Auto rename file image
            $ext = end(explode('.',$image));
            $image = "Food_Catagory_".rand(000,999).'.'.$ext; 

        $sql = "INSERT INTO tbl_catagory SET
            title = '$title',
            image_name = '$image',
            featured = '$feature',
            active = '$active'            
        ";
        $query = mysqli_query($conn , $sql);
        move_uploaded_file($image_tmp , '../images/catagory/'.$image );
        header('location: manage-catagory.php');
    }
   
?>