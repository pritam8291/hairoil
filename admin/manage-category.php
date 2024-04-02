<?php require('menu.php');?>
<br>
<h3 class="text-center">MANAGE  CATEGORY</h3>
<a href="add-category.php" class="btn btn-primary  my-5 mx-5">ADD CATEGORY</a>
<br>
<?php
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
?>



<table class="table my-5 mx-5">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">image</th>    
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  $sql="SELECT * FROM category";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  $sn=1;
  if($count>0)
  {
    while($row=mysqli_fetch_assoc($res))
    {
        $category_id=$row['category_id'];
        $category_name=$row['category_name'];
        $category_price=$row['category_price'];
        $category_image=$row['category_image'];
        ?>
        <tbody>
    <tr>
      <th scope="row"><?php echo $sn++;?></th>
      <td><?php echo $category_name;?></td>
      <td><?php echo $category_price;?></td>
      <td>
      <?php
      if($category_image=='')
      {
        echo " image not added ";
      }
      else
      {
        ?>
        <img src="<?php echo SITEURL;?>image/category/<?php echo $category_image;?>"width="50px">
        <?php
      }
     ?>
     </td>
      <td>
        <a href="<?php echo SITEURL;?>admin/delete-category.php?category_id=<?php echo $category_id;?>&category_image=<?php echo $category_image;?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   
  </tbody>
        <?php
    }
  }
  ?>
  
</table>
<?php require('footer.php');?>