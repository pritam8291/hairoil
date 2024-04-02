<?php require('menu.php');?>
<div class="row">
  
<?php
 if(isset($_GET['id']))
 {
  $id=$_GET['id'];
 $sql="SELECT * FROM category WHERE id='$id'";
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
      <div class="card my-5 mx-5" style="width: 18rem;">
  <img src="<?php echo SITEURL;?>image/category/<?php echo $category_image;?>" class="card-img-top py-3" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $category_name;?></h5>
    <p class="card-text">₹<?php echo $category_price;?></p>
    <a href="<?php echo SITEURL;?>cart.php?category_id=<?php echo $category_id;?>&category_image=<?php echo $category_image;?>&category_price=<?php echo $category_price;?>&category_name=<?php echo $category_name;?>" class="btn btn-primary">Add to Cart</a>
  </div>
</div>
    <?php
   }
 }
}
?>

</div>

<?php require('footer.php');?>