<?php

if (isset($_GET['id'])) {
    $id_handle = $_GET['id'];
}
switch ($_GET['action']) {
    case "add":
        $sql_handle = "SELECT * FROM tbl_food WHERE id = $id_handle";
        $query_handle = mysqli_query($conn, $sql_handle);
        $row_handle = mysqli_fetch_assoc($query_handle);
        $itemarray = array($row_handle['id'] => array('d_id' => $row_handle['id'], 'title' => $row_handle['title'], 'price' => $row_handle['price'], 'quantity' => 1));
        if (!empty($_SESSION['cart_item'])) {
            if (in_array($row_handle['id'], array_keys($_SESSION['cart_item']))) {
                foreach ($_SESSION['cart_item'] as $key => $val) {
                    if ($id_handle == $key) {
                        $_SESSION['cart_item'][$key]['quantity'] += 1;
                    }
                }
            } else {
                $_SESSION['cart_item'] += $itemarray;
            }
        } else {
            $_SESSION['cart_item'] = $itemarray;
        }
        break;
    case "delete":
        if (!empty($_SESSION['cart_item'])) {
            foreach ($_SESSION['cart_item'] as $key => $val) {
                if ($id_handle == $key) {
                    unset($_SESSION['cart_item'][$key]);
                }
            }
        }
        break;
}
