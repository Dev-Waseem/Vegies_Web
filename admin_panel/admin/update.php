<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../../config.php');

$pro_id = $_GET['id'];
$fetch = "SELECT * FROM `addproduct` WHERE `id` = '$pro_id'";
$result = mysqli_query($connection, $fetch);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>


        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">
                    <h2>Add Product</h2>
                    <hr>
                    <form class="user" action="update_data.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="hidden" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name" value="<?php echo $row['id'] ?>" name="id" required>
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Product Name" value="<?php echo $row['title'] ?>" name="title" required>
                            </div>
                            <?php

                            $fetch = "SELECT * FROM `add_category`";
                            $result = mysqli_query($connection, $fetch);
                            if (mysqli_num_rows($result) > 0) {


                            ?>
                                <select class="form-select" name="category" aria-label="Default select example" value="<?php echo $row['category'] ?>">
                                    <option selected>Open this select menu</option>
                                <?php
                                while ($cat = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $cat['cid'] . '">' . $cat['name'] . '</option>';
                                }
                            }

                                ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <label for="floatingTextarea">Comments</label>
                                <textarea class="form-control" name="desc" placeholder="Description" id="floatingTextarea" value="<?php echo $row['description'] ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control" placeholder="add image" name="image" required value="<?php echo $row['image'] ?>">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="update" name="update">
                        <hr>


                    </form>

                </div>

            </div>
    <?php
    }
}
    ?>
        </div>


        </body>

        </html>










        <?php
        include('admin/includes/footer.php');


        ?>