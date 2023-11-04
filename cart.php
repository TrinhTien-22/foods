<?php
include 'front/menu.php';
include 'handle-cart.php';
?>

<div class="main-cart">

    <div class="table">
        <div class="table-header">
            <div class="table-cell">Title</div>
            <div class="table-cell">Price</div>
            <div class="table-cell">Quantity</div>
            <div class="table-cell">Action</div>
        </div>
        <br>
        <?php
        $total = 0;
        if (!empty($_SESSION['cart_item'])) {
            foreach ($_SESSION['cart_item'] as $cart) {
                $total += $cart['quantity'] * $cart['price'];
                // echo ($cart['d_id']);
        ?>
        <div class="table-row">
            <div class="table-cell"><?php echo $cart['title'] ?></div>
            <div class="table-cell">$<?php echo $cart['price'] ?></div>
            <div class="table-cell"><?php echo $cart['quantity'] ?></div>
            <a href="cart.php?action=delete&id=<?php echo $cart['d_id']; ?>" class="btn btn-primary cart">Xóa</a>
        </div>


        <?php    }
        }
        ?>
    </div>
    <div class="total">
        <h1>Total</h1>
        <br>
        <?php
        if ($total > 0) {
            echo '$' . $total; ?>
        <br><br>
        <a href="order.php" class="btn btn-primary">Payment</a>
        <?php } else {
            echo '$0'; ?>
        <br>
        <a href="order.php" class="btn btn-primary disabled-button">Payment</a>
        <?php }
        ?>
        <br><br>

    </div>
</div>


<!-- Add more rows as needed -->

<?php include 'front/footer.php' ?>
<style>
.disabled-button {
    background-color: #FF6666;
    color: black;
    padding: 10px 20px;
    border: none;
    cursor: not-allowed;
    pointer-events: none;
}
</style>