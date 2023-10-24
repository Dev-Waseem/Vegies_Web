<?php
session_start();
if(!isset($_SESSION['useremail'])){
    header('Location:login.php');
}
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/footer.php');

?>