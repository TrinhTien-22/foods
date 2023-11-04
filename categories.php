<?php include 'front/menu.php' ?>



<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Drinks</h2>
        <?php 
            $sql_catagory = "SELECT * FROM tbl_catagory WHERE active='Yes' LIMIT 12";
            $query_catagory = mysqli_query($conn , $sql_catagory);
            while($row_catagory = mysqli_fetch_assoc($query_catagory)){ ?>
        <a href="category-foods.php?id=<?php echo $row_catagory['id'] ?>">
            <div class="box-3 float-container">
                <img src="images/catagory/<?php echo $row_catagory['image_name'] ?>" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $row_catagory['title'] ?></h3>
            </div>
        </a>
        <?php }?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include 'front/footer.php' ?>