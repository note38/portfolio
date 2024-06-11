<?php 
if (isset($_POST['create_project'])) {
    
    // Get form input
    $title = $_POST['title']; 
    $link = $_POST['link'];
    $project_image = $_FILES['image']['name'];
    $project_image_temp = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];

    // Move uploaded image to the specified directory
    move_uploaded_file($project_image_temp, "../images/projects/$project_image");

    // Prepare SQL query to insert data
    $query = "INSERT INTO projects(title, link, description, image) VALUES (?, ?, ?, ?)";

    // Initialize prepared statement
    $stmt = mysqli_prepare($connection, $query);

    // Bind parameters to the prepared statement
   
    mysqli_stmt_bind_param($stmt, "ssss", $title, $link, $description, $project_image);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if (!$result) {
        die("Query Failed! " . mysqli_error($connection));
    } else {
        echo "<h1>Added Successfully</h1>";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Redirect to posts.php
    header("Location: ./posts.php");
    exit;
}
?>








<h1>Add Project</h1>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <input type="link" class="form-control" name="link">
    </div>

    <div class="form-group">
        <label for="product_image">Project Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="description">Description Tags</label>
        <input type="text" class="form-control" name="description">
    </div>

    <div class="form-group">
        <label for="">Product Content</label>
        <textarea type="text" class="form-control" name="" id="" cols="30" row="10">
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_project" value="Publish">
    </div>

</form>