<?php
    session_start();
    include('../../config.php');
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $flname = "images/" . basename($_FILES["image"]["name"]);
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $cast = isset($_POST['cast']) ? $_POST['cast'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
    $rdate = isset($_POST['rdate']) ? $_POST['rdate'] : '';

    // Check if the movie name is empty
    if (empty($name)) {
        $_SESSION['error'] = "Movie name cannot be empty";
        header('location:add_movie.php');
        exit;
    }

    // Prepare the query with placeholders
    $query = "INSERT INTO tbl_movie VALUES (NULL, ?, ?, ?, ?, ?, ?, '0')";
    $statement = mysqli_prepare($con, $query);
    
    // Bind parameters to the statement
    mysqli_stmt_bind_param($statement, "ssssss", $_SESSION['theatre'], $name, $cast, $desc, $rdate, $flname);
    
    // Execute the prepared statement
    mysqli_stmt_execute($statement);
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success'] = "Movie Added";
    header('location:add_movie.php');
    exit;
?>
