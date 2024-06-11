<?php include 'includes/admin_header.php'; ?>
<?php include 'functions.php'; ?>


</style>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome to Admin!
                            <small>Author</small>
                        </h1>
                     
                        <div class="col-xs-6">
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Content</th>
                                        <th>Tags</th>
                                        
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM products ";
                                    $select_query = mysqli_query($connection, $query);
                                    if (!$select_query) {
                                        die("QUERY FAILED" . mysqli_error($connection));
                                    }
                                    while ($row = mysqli_fetch_assoc($select_query)) {
                                        $product_id = $row['product_id'];
                                        $product_name = $row['product_name'];
                                        $product_cat = $row['product_cat'];
                                        $product_price = $row['product_price'];
                                        $product_image = $row['product_image'];
                                        $product_content = $row['product_content'];
                                        $product_tags = $row['product_tags'];

                                        

                                        echo "<tr>";
                                        echo "<th> $product_id </th>";
                                        echo "<th> $product_name </th>";
                                        echo "<th> $product_cat </th>";
                                        echo "<th> $product_price </th>";
                                        echo "<th><img height='100px'  src='../images/products/$product_image' alt=''></th>";
                                        echo "<th> $product_content </th>";
                                        echo "<th> $product_tags </th>";
                                        echo "</tr>";
                                    
                                    }

                                    ?>
                                   
                                                                
                                                            
                                </tbody>
                            </table>

                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include 'includes/admin_footer.php'; ?>

   