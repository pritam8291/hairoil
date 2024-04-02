<?php
require('../config/constant.php');
if(isset($_GET['category_id']) && isset($_GET['category_image']))
{
$category_id=$_GET['category_id'];
$category_image=$_GET['category_image'];

if($category_image!="")
{
$path="../image/category/".$category_image;
$remove=unlink($path);
if($remove==false)
    {
    echo  $_SESSION['upload']="Failed to remove image";
    header('location:'.SITEURL.'admin/manage-category.php');
     die();
    }
}
$sql="DELETE FROM category WHERE category_id=$category_id";
$res=mysqli_query($con,$sql);
if($res==TRUE)
{
    $_SESSION['delete']="Successfully Deleted";
    header('location:'.SITEURL.'admin/manage-category.php');
}
else
{
    $_SESSION['delete']="Failed to Delete";
    header('location:'.SITEURL.'admin/manage-category.php');
}
}
else
{
    echo "failed";
}
?>