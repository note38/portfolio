<?php
    include 'classes/connect.php';
    include 'templates/header.php';
?>

<?php

$query = "SELECT * FROM products";
$show_all_from_products = mysqli_query($connection, $query);


while ($row = mysqli_fetch_assoc($show_all_from_products)) {
$product_image = $row['product_image'];
$product_name = $row['product_name'];
$product_cat = $row['product_cat'];
$product_price = $row['product_price'];
?>
        <section class="px-[50px] lg:mx-[152px] ">
                    <div class="min-w-[300px]">
                        <h3 class="min-w-[100px] text-[1.5rem] lg:text-[2rem] pb-[1.5rem]"><?php echo $product_cat; ?></h3>
                    </div>

                    <div class="flex flex-wrap justify-center">

                        <div class="p-[.3rem]">
                            <div class="">
                                <img class="h-[200px] w-[150px] md:h-[300px] md:w-[250px] md:h-[300px] md:w-[250px] object-cover" src="images/products/<?php echo $product_image; ?>" alt="">
                                <p></p>
                            </div>
                            <div class="py-[.8rem]">
                                <h3 class="text-sm"><?php echo $product_name; ?></h3>
                                <span class="text-[1rem] md:text-[1.5rem]">&#x20B1;<?php echo $product_price; ?></span>
                            </div>
                        </div>

                    </div>
        </section>
<?php
}
?>
<?php
    include 'templates/footer.php';
?>