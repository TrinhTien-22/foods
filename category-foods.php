<?php include 'front/menu.php' ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Drinks on <a href="#" class="text-white">"Category"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Drink Menu</h2>
        <?php 
            $id = $_GET['id'];
            $sql_catagory_food = "SELECT * FROM tbl_food WHERE tbl_food.catagory_id=$id ";
            $query_catagory_food = mysqli_query($conn, $sql_catagory_food);
            while($row_catagory_food = mysqli_fetch_assoc($query_catagory_food)){ ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/foods/<?php echo $row_catagory_food['image_name'] ?>" alt="Chicke Hawain Pizza"
                    class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4><?php echo $row_catagory_food['title'] ?></h4>
                <p class="food-price">$<?php echo $row_catagory_food['price'] ?></p>
                <p class="food-detail">
                    <?php echo $row_catagory_food['description'] ?>
                </p>
                <br>

                <a href="cart.php?id=<?php echo $row_catagory_food['id'] ?>&action=add" class="btn btn-primary">Order
                    Now</a>
            </div>
        </div>
        <?php }?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'front/footer.php' ?>