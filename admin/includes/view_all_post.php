<a href='posts.php?source=add_product'>Add Product</a>

<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Link</th>
            <th>Image</th>
            <th>Description</th>
            <th>Create at</th>
            
            
        </tr>
        
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM projects ";
        $select_query = mysqli_query($connection, $query);
        if (!$select_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($select_query)) {
          
            $project_id = $row['id'];
            $project_name = $row['title'];
            $project_link = $row['link'];
            $project_image = $row['image'];         
            $description = $row['description'];
            $created_at = isset($row['created_at']) ? $row['created_at'] : 'N/A';

            

            echo "<tr>";
            echo "<th> $project_id </th>";
            echo "<th> $project_name </th>";
            echo "<th> $project_link </th>";
            echo "<th><img height='100px'  src='../images/projects/$project_image' alt=''></th>";
            echo "<th> $description </th>";
            echo "<th> $created_at </th>";
            echo "<th><a href='posts.php?source=edit_product&p_id={$project_id}'>Edit</a></th>";
            echo "<th><a href='posts.php?delete={$project_id}'>Delete</a></th>";
            echo "</tr>";



        
        }

        ?>
       <?php

        if (isset($_GET['delete'])) {
            $the_product_id = $_GET['delete'];

            // Add a confirmation step before deleting
            echo "
            <script>
                if (confirm('Are you sure you want to delete this project?')) {
                    window.location.href = 'confirm_delete={$the_product_id}';
                } else {
                    window.location.href = 'posts.php';
                }
            </script>
            ";
        }

        // Handle the actual deletion after confirmation
        if (isset($_GET['confirm_delete'])) {
            $the_product_id = $_GET['confirm_delete'];

            $query = "DELETE FROM projects WHERE id = {$the_product_id}";
            $delete_query = mysqli_query($connection, $query);

            if (!$delete_query) {
                die("QUERY FAILED: " . mysqli_error($connection));
            } else {
                header("Location: posts.php");
                exit;
            }
        }
        ?>
                                      
                                  
                                </tbody>
                            </table>