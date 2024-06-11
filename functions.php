<?php

function showAllProducts(){
    global $connection;
        $query = "SELECT * FROM products";
        $show_all_from_products = mysqli_query($connection, $query);


        while ($row = mysqli_fetch_assoc($show_all_from_products)) {
        $product_image = $row['product_image'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];

                
            
                            echo " <div class='w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4'>";
                                echo " <a href='' class='c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden'>";
                                    echo " <div class='relative pb-48 overflow-hidden'>";
                                        echo " <img class='absolute inset-0 z-index: 0; h-full w-full object-cover' src='./images/products/$product_image' alt=''>";
                                        echo "<p></p>";
                                    echo "</div>";
                                    echo " <div class='p-4'>";
                                        echo " <h3 class='text-sm'> $product_name</h3>";
                                        echo " <span class='text-[1rem] md:text-[1.5rem]'>&#x20B1;< $product_price </span>";
                                    echo " </div>";
                                echo " </a>";
                            echo " </div>";
            
            

        }
}
























?>