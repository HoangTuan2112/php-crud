<?php
include('dbcon.php'); 

if (isset($_POST["add_students"])) {
    $f_name = $_POST["f-name"];
    $l_name = $_POST["l-name"];
    $age = $_POST["age"];

    echo "" . $f_name . "" . $l_name . "" . $age . "";
    if (empty($f_name)||empty($l_name)||empty($age)) {
        header('location:index.php?message=You need to fill in not null');
        exit;
    }
     else {
        $query = "INSERT INTO students (`first_name`, `last_name`, `age`) VALUES ('$f_name', '$l_name', '$age')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Error: " . mysqli_error($connection));
        } else {
            header('location:index.php?message=Student added successfully!');
            exit;
        }
    }
}
?>