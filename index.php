<?php include 'front/menu.php' ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="GET">
            <input type="search" name="search" placeholder="Search for Drinks.." required>
            <input type="submit" name="submit" class="btn btn-primary" value="Search">
        </form>

    </div>
</section>

<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Drinks</h2>

        <?php 
            $sql = "SELECT * FROM tbl_catagory WHERE active='Yes' LIMIT 3";
            $query = mysqli_query($conn , $sql);
            while($row = mysqli_fetch_assoc($query)){ ?>
        <a href="category-foods.php?id=<?php echo $row['id'] ?>">
            <div class="box-3 float-container">
                <img src="images/catagory/<?php echo $row['image_name'] ?>" class="img-responsive img-curve">
                <h3 class="float-text text-white"><?php echo $row['title'] ?></h3>
            </div>
        </a>
        <?php } ?>



        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Drink Menu</h2>

        <?php 
            $sql_food = "SELECT * FROM tbl_food WHERE active='Yes' LIMIT 8";
            $query_food = mysqli_query($conn , $sql_food);
            while($row_food = mysqli_fetch_assoc($query_food)){ ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/foods/<?php echo $row_food['image_name'] ?>" alt="Chicke Hawain Pizza"
                    class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4><?php echo $row_food['title']; ?></h4>
                <p class="food-price">$<?php echo $row_food['price'] ?></p>
                <p class="food-detail">
                    <?php echo $row_food['description']?>
                </p>
                <br>

                <a href="cart.php?id=<?php echo $row_food['id'] ?>&action=add" class="btn btn-primary">Order Now</a>
            </div>
        </div>
        <?php  }?>


        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Drinks</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'front/footer.php' ?>