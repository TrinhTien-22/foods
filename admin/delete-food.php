<?php
    include '../config/db.php';
    $id = $_GET['id'];
    $image = $_GET['image_name'];
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $query = mysqli_query($conn , $sql);
    if($image != ""){
        unlink("../images/foods/".$image);
    }
    header('location: manage-food.php');
?>