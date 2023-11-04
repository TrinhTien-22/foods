<?php

    session_start();
    define('SITEURL', 'http://localhost/foods/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME' , 'root');
    define('DB_PASSWORD' , '');
    define('DB_NAME' , 'foods');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if ($conn){
        
    }else{
        echo 'error connecting to database';
    }

?>