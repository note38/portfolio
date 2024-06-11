<?php
include('connect.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error_message = "All fields are required.";
    } else {
       
        $query = "SELECT id, firstname, lastname, email, password FROM account WHERE email = ?";
        $select_user_query = mysqli_prepare($connection, $query);

        if ($select_user_query) {
            mysqli_stmt_bind_param($select_user_query, "s", $email);
            mysqli_stmt_execute($select_user_query);
            $result = mysqli_stmt_get_result($select_user_query);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);

                // Verify password using password_verify
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['email'] = $row['email'];

                    header('Location: ../admin/index.php');
                    exit;
                } else {
                    $error_message = "Invalid password";
                }
            } else {
                $error_message = "User not found";
            }

            mysqli_stmt_close($select_user_query);
        } else {
            $error_message = "Query preparation failed";
        }
    }

    echo '<script>alert("' . $error_message . '"); window.location.href = "../index.php";</script>';
}
?>