<?php require('menu.php');?>
<div class="container">
    <div class="row">
        <?php
    if(isset($_GET['id']) && isset($_GET['image']) && isset($_GET['price']) && isset($_GET['name']))
    {
        $id=$_GET['id'];
        $image=$_GET['image'];
        $price=$_GET['price'];
        $name=$_GET['name'];
        ?>
            <div class="col-md-6" style="width: 12rem;">
            <img src="<?php echo SITEURL;?>image/master/<?php echo $image;?>" class="card-img-top py-3" alt="...">
            </div>
            <div class="col-md-6">
            <div class="card my-5">
            <div class="card-body">
            <h5 class="card-title"><?php echo $name;?></h5>
            <p class="card-text">₹<?php echo $price;?></p>
            </div>
            </div>
        </div>
        <?php
    }

 ?>

  
  </div>
  </div>
  <div class="container">
    <div class="row">
        <?php
    if(isset($_GET['category_id']) && isset($_GET['category_image']) && isset($_GET['category_price']) && isset($_GET['category_name']))
    {
        $category_id=$_GET['category_id'];
        $category_image=$_GET['category_image'];
        $category_price=$_GET['category_price'];
        $category_name=$_GET['category_name'];
        ?>
            <div class="col-md-6" style="width: 12rem;">
            <img src="<?php echo SITEURL;?>image/category/<?php echo $category_image;?>" class="card-img-top py-3" alt="...">
            </div>
            <div class="col-md-6">
            <div class="card my-5">
            <div class="card-body">
            <h5 class="card-title"><?php echo $category_name;?></h5>
            <p class="card-text">₹<?php echo $category_price;?></p>
            </div>
            </div>
        </div>
        <?php
    }

 ?>

  
  </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-6">
        <a href="<?php echo SITEURL;?>index.php" class="btn btn-primary float-left">Continue Shopping</a>
        <button type="submit" class="btn btn-danger float-right">Check Out</button>
        </div>
    </div>
  </div>
  
<?php require('footer.php');?>