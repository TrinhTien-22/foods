<?php

    if(!$_SESSION['user']){
        $_SESSION['no-login'] = '<div class="error">Please login admin</div>';
        header('location: login.php');
    }

?>