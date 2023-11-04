<?php include('../config/db.php') ;
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    $query = mysqli_query($conn , $sql);
    if ($query){
        $_SESSION['delete'] = "Delete admin success";
    }
    header('location: manage-admin.php' )
?>