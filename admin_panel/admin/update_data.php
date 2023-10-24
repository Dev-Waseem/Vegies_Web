<?php
include('../../config.php');

if(isset($_POST['update'])){
    $pro_id = $_POST['id'];
    $pro_title = $_POST['title'];
    $pro_category = $_POST['category'];
    $pro_desc = $_POST['desc'];
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_size = $_FILES['image']['size'];

    move_uploaded_file($tmp_name, 'images/' . $img_name);
    $insert = "UPDATE `addproduct` SET `title` = '$pro_title' , `category` = '$pro_category' , `description` = '$pro_desc' , `image` = '$img_name' where `id` = '$pro_id'";
    $result = mysqli_query($connection, $insert);
    if ($result){
        echo "<script>alert('Data Update Successfully')</script>";
        header("Location: viewproduct.php");
    }
}
