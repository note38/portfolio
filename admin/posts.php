<?php include 'includes/admin_header.php'; ?>


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
                        
                        <div class="col-xs-12>
                        
                           <?php
                           if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                           }else {
                            $source = "";
                           }
                           
                           switch ($source) {

                            case 'edit_product':
                                include 'includes/edit_product.php';
                                break;

                            case 'add_product':
                                include 'includes/add_post.php';
                                break;
                            
                            default:
                                include 'includes/view_all_post.php';
                                break;
                           }

                           ?>

                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include 'includes/admin_footer.php'; ?>

   