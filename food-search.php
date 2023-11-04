<?php include 'front/menu.php' ?>

<?php $search1 = $_GET['search'] ?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Drinks on Your Search <a href="#" class="text-white"><?php echo $search1 ?></a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Drink Menu</h2>
        <?php
            if(isset($_GET['search'])){
                
            $search = mysqli_real_escape_string($conn, $_GET['search']);
    
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/foods/<?php echo $row['image_name'] ?>" alt="Chicke Hawain Pizza"
                    class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4><?php echo $row['title'] ?></h4>
                <p class="food-price">$<?php echo $row['price'] ?></p>
                <p class="food-detail">
                    <?php echo $row['description'] ?>
                </p>
                <br>

                <a href="cart.php?id=<?php echo $row['id']?>&action=add" class="btn btn-primary">Order Now</a>
            </div>
        </div>
        <?php }   }
                ?>
        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'front/footer.php' ?>