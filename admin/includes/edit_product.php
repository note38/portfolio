<?php
if (isset($_GET['p_id'])) {
   $the_project_id = $_GET['p_id'];
}
        $query = "SELECT * FROM projects WHERE id = {$the_project_id} ";
        $select_query = mysqli_query($connection, $query);
        if (!$select_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($select_query)) {
            $project_id = $row['id'];
            $project_title = $row['title'];
            $link = $row['link'];
            $project_image = $row['image'];
            $description = $row['description'];
        }

        if (isset($_POST['update_project'])) {
            
            
            $title = $_POST['title']; 
            $link = $_POST['link'];
            $project_image = $_FILES['image']['name'];
            $project_image_temp = $_FILES['image']['tmp_name'];
            $description = $_POST['description'];

            // Move uploaded image to the specified directory
             move_uploaded_file($project_image_temp, "../images/projects/$project_image");

            if (empty($product_image)) {
               $query = "SELECT * FROM projects WHERE id = {$the_project_id} ";
               $select_image = mysqli_query($connection, $query);

               while ($row = mysqli_fetch_assoc($select_image)) {
                    $product_image = $row['image'];
               }
            }
            // Check if a new image was uploaded
            if (!empty($new_project_image)) {
                // Move the uploaded image to the specified directory
                move_uploaded_file($project_image_temp, "../images/projects/$new_project_image");
                $project_image = $new_project_image; // Update the image if a new one was uploaded
            } else {
                // If no new image was uploaded, retain the existing image
                $query = "SELECT image FROM projects WHERE id = {$the_project_id}";
                $select_image_query = mysqli_query($connection, $query);
                if (!$select_image_query) {
                    die("QUERY FAILED: " . mysqli_error($connection));
                }
                $row = mysqli_fetch_assoc($select_image_query);
                $project_image = $row['image'];
            }
            $query = "UPDATE projects SET ";
            $query .= "title = '{$project_title}', ";
            $query .= "link = '{$link}', ";
            $query .= "image = '{$project_image}', ";
            $query .= "description = '{$description}' ";
            $query .= "WHERE id = '{$the_project_id}'";

            $update_project_query = mysqli_query($connection, $query);
            

            if (!$update_project_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("location: ./posts.php");
          
        }
?>







<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Title</label>
        <input value="<?php echo $project_title; ?>" type="text" class="form-control" name="title"  >
    </div>

   
    <div class="form-group">
        <label for="link">Link</label>
        <input value="<?php echo $link; ?>" type="text" class="form-control" name="link"  >
    </div>

    <div class="form-group">
        <label for="project_image">Project Image</label>
        <img width='100' src="../images/projects/<?php echo $project_image;  ?>" alt="">
        <input type="file" name="image">
    </div>

    

    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" name="description" id="" cols="30" row="10">
        <?php echo $description; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_project" value="Publish">
    </div>

</form>