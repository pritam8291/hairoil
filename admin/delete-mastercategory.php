<?php
require('../config/constant.php');
if(isset($_GET['id']) && isset($_GET['image']))
{
$id=$_GET['id'];
$image=$_GET['image'];

if($image!="")
{
$path="../image/master/".$image;
$remove=unlink($path);
if($remove==false)
    {
    echo  $_SESSION['upload']="Failed to remove image";
    header('location:'.SITEURL.'admin/manage-mastercategory.php');
     die();
    }
}
$sql="DELETE FROM master_category WHERE id=$id";
$res=mysqli_query($con,$sql);
if($res==TRUE)
{
    $_SESSION['delete']="Successfully Deleted";
    header('location:'.SITEURL.'admin/manage-mastercategory.php');
}
else
{
    $_SESSION['delete']="Failed to Delete";
    header('location:'.SITEURL.'admin/manage-mastercategory.php');
}
}
else
{
    echo "failed";
}
?>