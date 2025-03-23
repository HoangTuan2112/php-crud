<?php include("dbcon.php"); ?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $querry = "delete from `students` where `id` ='$id'";
    $result = mysqli_query($connection, $querry);
    if($result){
        header('location:index.php?message=Student delete successfully!');
    }
?>