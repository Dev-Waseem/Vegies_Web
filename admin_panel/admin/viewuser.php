<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

?>


<?php
include('../../config.php');

$fetch = "SELECT * from `users` where `status` = '1'";
$result = mysqli_query($connection, $fetch);
if($result){
    if(mysqli_num_rows($result) > 0){


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>User</title>
</head>
<body>
    <div class="container mt-5">
    <table class="table table-bordered text-center table-dark">
    <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td><?php echo $row['fname']?></td>
      <td><?php echo $row['lname']?></td>
      <td><?php echo $row['email']?></td>
      <td><a class="btn btn-warning" href="update.php?id=<?php echo $row['id']?>">Update</a></td>
      <td><a class="btn btn-danger" href="trash.php?id=<?php echo $row['id']?>">Trash</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
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