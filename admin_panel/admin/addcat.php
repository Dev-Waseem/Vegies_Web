<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../../config.php');


if(isset($_POST['add_category'])){
    $cat_name = $_POST['name'];

    $insert = "INSERT INTO `add_category` (`name`) value ('$cat_name')";
    $result = mysqli_query($connection, $insert);
}

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Add Categroy</h2>
                <hr>
        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Category Name" name="name" required>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-user btn-block" name="add_category" >
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