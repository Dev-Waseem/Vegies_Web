<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../../config.php');

//Display Product

$limit = 3;
if(isset($_GET['pgno'])){
    $pgno = $_GET['pgno'];
}
else{
    $pgno = 1;
}

$start = ($pgno -1) * $limit ;

$query = "SELECT * FROM `addproduct` as p JOIN `add_category` as c on p.category = c.cid order by p.id desc limit {$start}, {$limit}";
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0){



?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>All Categories </h2>
                <hr>
            <table class="table table-warning">
                <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <th scope="row"><?php echo $data['id']?></th>
                    <td><?php echo $data['title']?></td>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['description']?></td>
                    <td><img src="<?php echo 'images/' . $data['image']?>" width="100px" height="100px"></td>
                    <td>
                        <?php
                        if($data['status'] == 1){
                            echo "Active";
                        }else{
                            echo "Deactivate";
                        }    
                        
                        ?>
                    </td>
                    <td><a class="btn btn-primary" href="update.php?id=<?php echo $data['id']?>">Update</a></td>
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $data['id']?>">Delete</a></td>
                </tr>
                <?php
                    }
                }
                
                ?>
                </tbody>
            </table>

            <?php
            $query = "SELECT * FROM `addproduct`";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0){
            $total_record = mysqli_num_rows($result);
            $limit = 3;
            $total_pages = ceil($total_record/$limit);
            echo '<ul class="pagination">';
            if($pgno > 1){
                echo '<li class="page-item"><a class="page-link" href="viewproduct.php?pgno='.($pgno - 1).'">Prev</a></li>';
            }
            for($i = 1 ; $i <= $total_pages ; $i++){
                $active = $i == $pgno? 'active' : '';
                echo '<li class="page-item '.$active.'"><a class="page-link" href="viewproduct.php?pgno='.$i.'">'.$i.'</a></li>';
            }
            if($pgno < $total_pages){
                echo '<li class="page-item"><a class="page-link" href="viewproduct.php?pgno='.($pgno + 1).'">Next</a></li>';
            }
            echo '</ul>';
            }
            ?>


            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>