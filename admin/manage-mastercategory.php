<?php require('menu.php');?>
<br>
<h3 class="text-center">MANAGE MASTER CATEGORY</h3>
<a href="add-mastercategory.php" class="btn btn-primary  my-5 mx-5">ADD MASTER</a>
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
      <th scope="col">Master-Category</th>
      <th scope="col">Price</th>
      <th scope="col">image</th>    
      <th scope="col">Action</th>
    </tr>
  </thead>
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
        $price=$row['price'];
        $image=$row['image'];
        ?>
        <tbody>
    <tr>
      
      <th scope="row"><?php echo $sn++;?></th>
      <td><?php echo $name;?></td>
      <td><?php echo $price;?></td>
      <td>
      <?php
      if($image=='')
      {
        echo " image not added ";
      }
      else
      {
        ?>
        <img src="<?php echo SITEURL;?>image/master/<?php echo $image;?>"width="50px">
        <?php
      }
     ?>
     </td>
      <td>
        <a href="<?php echo SITEURL;?>admin/delete-mastercategory.php?id=<?php echo $id;?>&image=<?php echo $image;?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   
  </tbody>
        <?php
    }
  }
  ?>
  
</table>
<?php require('footer.php');?>