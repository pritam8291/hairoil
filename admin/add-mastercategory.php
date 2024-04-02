<?php require('menu.php');?>
<br><br><br>

<h3 class="text-center">ADD MASTER CATEGORY</h3>
<?php
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>
<form class="mx-5 my-3" method="POST"  enctype="multipart/form-data">
  <div class="mb-3">
   Name: <input type="text" name="name" class="form-control"  >
  </div>
  <div class="mb-3">
   Price:
    <input type="number" name="price" class="form-control">
  </div>
  <div class="mb-3">
   Image:
    <input type="file" name="image" class="form-control">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php require('footer.php');?>
<?php
if(isset($_POST['submit']))
{
    //echo "clicked";
    $name=$_POST['name'];
    $price=$_POST['price'];
    if(isset($_FILES['image']['name']))
    {
        
        $image= $_FILES['image']['name'];
        if($image!='')
        {
            
            $ext=end(explode('.',$image));
            $image="MASTER-NAME-".rand(0000,9999).".".$ext;
            $src=$_FILES['image']['tmp_name']; 
            $dst="../image/master/".$image;
            $upload=move_uploaded_file($src,$dst); 
            if($upload==false)
            {
                echo mysqli_error($con);
                $_SESSION['upload']="Failed to upload";
                header('location:'.SITEURL.'admin/add-mastercategory.php');
                die();
            }
        }
    }
    else
    {
        $image='';
    }
   
     $sql="INSERT INTO master_category SET 
     name='$name',
     price=$price,
     image='$image'
     ";
     $res=mysqli_query($con,$sql);
     if($res==True)
     {
         $_SESSION['add']="Successfully added";
         header('location:'.SITEURL.'admin/manage-mastercategory.php');
     }
     else
     {
         $_SESSION['add']="Failed to added";
         header('location:'.SITEURL.'admin/manage-mastercategory.php');
     }
}
?>
