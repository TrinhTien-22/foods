<?php 
    include 'patials/menu.php';
    $id = $_GET['id'];
    $image_current = $_GET['image_name'];
    $sql_up = "SELECT * FROM tbl_catagory WHERE id=$id";
    $query_up = mysqli_query($conn , $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);
    $title_current = $row_up['title'];
    $feature_current = $row_up['featured'];
    $active_current = $row_up['active']
?>

<div class="main-content">
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" required value=<?php echo $title_current ?>>
            </div>
            <div class="form-group">
                <label for="">Image Current</label>
                <img width="100px" src="../images/catagory/<?php echo $image_current ; ?>" alt="">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="new_image">
            </div>
            <div class="form-group">
                <label for="">Feature</label>
                <input <?php if($feature_current=='Yes'){echo "checked";} ?> type="radio" name="feature" value="Yes">Yes
                <input <?php if($feature_current=='No'){echo "checked";} ?> type="radio" name="feature" value="No">No
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <input <?php if($active_current=='Yes'){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                <input <?php if($active_current=='No'){echo "checked";} ?> type="radio" name="active" value="No">No
            </div>
            <button class="btn btn-success" name="sbm">Lưu</button>
        </form>
    </div>
</div>

<?php include 'patials/footer.php' ?>
<?php
    if(isset($_POST['sbm'])){
        $title = $_POST['title'];
        $new_image = $_FILES['new_image']['name'];
        $newimage_tmp = $_FILES['new_image']['tmp_name'];
        $feature = $_POST['feature'];
        $active = $_POST['active'];

        if($new_image != ""){
            unlink("../images/catagory/".$image_current);
            $part = explode('.',$new_image);
            $ext = end($part);
            $new_image = "Food_Catagory_".rand(000,999).'.'.$ext;
            move_uploaded_file($newimage_tmp , '../images/catagory/'.$new_image );
            $sql = "UPDATE tbl_catagory SET
            title = '$title',
            image_name = '$new_image',
            featured = '$feature',
            active = '$active'            
            WHERE id=$id";
            $query = mysqli_query($conn , $sql);
        }else{
            $sql = "UPDATE tbl_catagory SET
            title = '$title',
            image_name = '$image_current',
            featured = '$feature',
            active = '$active'            
            WHERE id = $id";
            $query = mysqli_query($conn , $sql);
        }
        header('location: manage-catagory.php');
    }
   
?>