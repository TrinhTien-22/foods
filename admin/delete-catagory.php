<?php include('../config/db.php') ;
    $id = $_GET['id'];
    $imagetest = $_GET['image_name'];
    $path = "../images/catagory/".$imagetest;
    if (file_exists($path)) {
        if (unlink($path)) {
            $_SESSION['okdelete'] = "ok";
            
        }else {
            $error = error_get_last();
            $_SESSION['loiunlink']="Không thể xóa tệp ảnh. Lỗi: " . $error['message'];
        }
    } else {
        $_SESSION['notdelete'] = "loi path"; 
    }
    $sql = "DELETE FROM tbl_catagory WHERE id=$id";
    $query = mysqli_query($conn , $sql);
    header('location: manage-catagory.php' );
?>