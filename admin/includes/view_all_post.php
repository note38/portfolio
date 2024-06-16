<a href='posts.php?source=add_product'>Add Product</a>
<section class="container mx-auto p-6 font-mono">
<div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
<div class="w-full overflow-x-auto">
            <table class="w-full">

    <thead>
        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Id</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Link</th>
            <th class="px-4 py-3">Image</th>
            <th class="px-4 py-3">Description</th>
            <th class="px-4 py-3">Create at</th>
            
            
        </tr>
        
    </thead>
    <tbody class="bg-white">
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

            

            echo "<tr class='text-gray-700'>";
            echo "<td class='px-4 py-3 border'>
                <div class='flex items-center text-sm'>
                  <div>
                    <p class='font-semibold text-black'>$project_id</p>
                  </div>
                </div>
              </td>";
            echo "<td class='px-4 py-3 text-ms font-semibold border'>$project_name</td>";
            echo "<td class='px-4 py-3 text-sm border'>$project_link</td>";
            echo "<th><img class='object-cover object-center w-28 h-28 rounded dark:bg-gray-500'height='10px'  src='../images/projects/$project_image' alt=''></th>";
            echo "<td class='px-4 py-3 text-ms font-semibold border'>$description</td>";
            echo "<td class='px-4 py-3 text-ms font-semibold border'>$created_at</td>";
            echo "<th class='px-4 py-3 text-ms font-semibold border' ><a class='bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded' href='posts.php?source=edit_product&p_id={$project_id}'>Edit</a></th>";
            echo "<th class='px-4 py-3 text-ms font-semibold border'><a class='bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded' href='posts.php?delete={$project_id}'>Delete</a></th>";
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
                            </div>
                            </div>
                            </section>