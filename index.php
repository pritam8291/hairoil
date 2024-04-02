<?php require('menu.php');?>
<!-- card section start -->
<h1 class="text-center">Shop By Category</h1>
<div class="row">
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
        <div class="card my-5 mx-5" style="width: 18rem;">
      <img src="<?php echo SITEURL;?>image/master/<?php echo $image;?>" class="card-img-top py-3" alt="..." onclick="window.location.href='<?php echo SITEURL;?>category.php?id=<?php echo $id ;?>'">
      <div class="card-body">
        <h5 class="card-title"><?php echo $name;?></h5>
        <p class="card-text">₹<?php echo $price;?></p>
        <a href="<?php echo SITEURL;?>cart.php?id=<?php echo $id;?>&image=<?php echo $image;?>&price=<?php echo $price;?>&name=<?php echo $name;?>" class="btn btn-primary">Add to Cart</a>
      </div>
      </div>
        <?php
    }
  }
  ?>

    

</div>
<?php require('footer.php');?>
