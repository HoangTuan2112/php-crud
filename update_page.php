<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('dbcon.php') ?>

    <h1 id="main-title">CRUD APPLICATION IN PHP </h1>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "Select * from `students` where `id`= '$id'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);

        }

    }
    
   
    if (isset($_POST['update_student'])) {
        if(isset($_GET['id_new'])){
            $idnew= $_GET['id_new'];
        }
        $fname = $_POST['f-name'];
        $lname = $_POST['l-name'];
        $age = $_POST['age'];
        

        $query = "update students set first_name = '$fname', `last_name`= '$lname',`age`='$age' where `id` = '$idnew'";
        $result = mysqli_query($connection, $query);
        if($result)  header('location:index.php?message=Student update successfully!');;
    }

    ?>

    <form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
        <div class="form-group mt-4">
            <label for="f-name">First Name</label>
            <input type="text" name="f-name" class="form-control" value="<?php echo $row['first_name'] ?>">
        </div>
        <div class="form-group mt-4">
            <label for="l-name">Last Name</label>
            <input type="text" name="l-name" class="form-control" value="<?php echo $row['last_name'] ?>">
        </div>
        <div class="form-group mt-4">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>">
        </div>
        <input type="submit" class="btn btn-success mt-4" value="Update" name="update_student"></input>
    </form>
</body>

</html>