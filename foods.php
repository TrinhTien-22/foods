<?php include 'front/menu.php' ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="GET">
            <input type="search" name="search" placeholder="Search for Drinks..." required>
            <input type="submit" name="submit" class="btn btn-primary" value="Search">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Drink Menu</h2>
        <?php
        $sql = "SELECT * FROM tbl_food WHERE active='Yes' LIMIT 6";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) { ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/foods/<?php echo $row['image_name'] ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $row['title'] ?></h4>
                    <p class="food-price">$<?php echo $row['price'] ?></p>
                    <p class="food-detail">
                        <?php echo $row['description'] ?>
                    </p>
                    <br>

                    <a href="cart.php?id=<?php echo $row['id'] ?>&action=add" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        <?php    }
        ?>
        <div class="clearfix"></div>
    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php include 'front/footer.php' ?>