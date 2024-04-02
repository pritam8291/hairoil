<?php require('menu.php');?>
<br><br><br>

<h3 class="text-center">ADD CATEGORY</h3>
<?php
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>
<form class="mx-5 my-3" method="POST"  enctype="multipart/form-data">
<div class="mb-3">
   Master: <select name="id" class="form-control"  >
    <?php
    $sql="SELECT * FROM master_category";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    $sn=1;
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            $id=$row['id'];
            $name=$row['name'];
            ?>
            <option value="<?php echo $id;?>"><?php echo $name;?></option>
            <?php
        }
}
    ?>
    </select>
  </div>
  <div class="mb-3">
   Name: <input type="text" name="category_name" class="form-control"  >
  </div>
  <div class="mb-3">
   Price:
    <input type="number" name="category_price" class="form-control">
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
    $id=$_POST['id'];
    $category_name=$_POST['category_name'];
    $category_price=$_POST['category_price'];
    if(isset($_FILES['image']['name']))
    {
        
        $category_image= $_FILES['image']['name'];
        if($category_image!='')
        {
            
            $ext=end(explode('.',$category_image));
            $category_image="CATEGORY-NAME-".rand(0000,9999).".".$ext;
            $src=$_FILES['image']['tmp_name']; 
            $dst="../image/category/".$category_image;
            $upload=move_uploaded_file($src,$dst); 
            if($upload==false)
            {
                echo mysqli_error($con);
                $_SESSION['upload']="Failed to upload";
                header('location:'.SITEURL.'admin/add-category.php');
                die();
            }
        }
    }
    else
    {
        $category_image='';
    }
   
     $sql="INSERT INTO category SET 
     id='$id',
     category_name='$category_name',
     category_price=$category_price,
     category_image='$category_image'
     ";
     $res=mysqli_query($con,$sql);
     if($res==True)
     {
         $_SESSION['add']="Successfully added";
         header('location:'.SITEURL.'admin/manage-category.php');
     }
     else
     {
         $_SESSION['add']="Failed to added";
         header('location:'.SITEURL.'admin/manage-category.php');
     }
}
?>
