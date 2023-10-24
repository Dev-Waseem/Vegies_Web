<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../../config.php');


if(isset($_POST['addproduct'])){
    $pro_title = $_POST['title'];
    $pro_category = $_POST['category'];
    $pro_desc = $_POST['desc'];
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_size = $_FILES['image']['size'];

    move_uploaded_file($tmp_name, 'images/' . $img_name);
    $insert = "INSERT INTO `addproduct` (`title`,`category`,`description`,`image`) value ('$pro_title','$pro_category','$pro_desc','$img_name')";
    $result = mysqli_query($connection, $insert);
}

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Add Product</h2>
                <hr>
        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" >
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Product Name" name="title" required>
                </div>
                <?php
                
                $fetch = "SELECT * FROM `add_category`";
                $result = mysqli_query($connection, $fetch);
                if(mysqli_num_rows($result) > 0){


                ?>
                <select class="form-select" name="category" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php
                    while($cat = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$cat['cid'].'">'.$cat['name'].'</option>';
                    }
                }
            
                    ?>
               </select>
            </div>
            <div class="form-group">
            <div class="form-floating">
                <label for="floatingTextarea">Comments</label>
                  <textarea class="form-control" name="desc" placeholder="Description" id="floatingTextarea"></textarea>
                 </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="file" class="form-control" placeholder="add image" name="image" required>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-user btn-block" name="addproduct" >
            <hr>
            
                                
        </form>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>