<?php require('menu.php');
require('../controllers/');

$items = loadItems();//
?>

<div class="container" style="width: 65%">
     <br><h2> USC Shop </h2>
  
  	<!-- Page Content -->

  	  <?php foreach($books as $b){  ?> 

  	  	<div class="container">
           <div class="input-group-append">
        	 <div class="card">
              <div class="form-row">
				<div class="col-md-3 mb-3"><br>
                  <div class="input-group">
             
             		 <div class="Title"><?php echo $i['title'];?></div>
             		   <div>₱ <?php echo number_format($i['price'],2);?></div>
             			 <div> Available: <?php echo $i['order_det'];?> </div>
             			   <p class="lead"> <?php echo $i['author'];?></p>

             			    <form method="POSt" action="../controllers/CartController.php">
             			    	<input type="text" name="cartID" value="<?php echo $i['ModelNo'];?>" hidden/>
                  				<input type="text" name="addCart" hidden/>
                  				<input type="number" name="buyQuantity" style="width: 10%; font-size: 25px; text-align: center;" value="1" min="1" max="<?php echo $i['order_det'];?>">
                  				<button type="submit" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart
                               </button>

                          </form>
                    </div>
                </div>
            </div>
         </div>
        <?php } ?> 

	<?php  foreach($uniforms as $u){ ?>

          <div class="container">
           <div class="input-group-append">
        	 <div class="card">
              <div class="form-row">
				<div class="col-md-3 mb-3"><br>
                  <div class="input-group">
             
             		 <div class="type"><?php echo $i['type'];?></div>
             		   <div> Size: <?php echo $i['size'];?> </div>
             		   	 <div> Gender: <?php echo $i['gender'];?> </div>
             		   		<div>₱ <?php echo number_format($i['price'],2);?></div>      
             			    
             			    	<form method="POSt" action="../controllers/CartController.php">
             			    	<input type="text" name="cartID" value="<?php echo $i['item_id'];?>" hidden/>
                  				<input type="text" name="addCart" hidden/>
                  				<input type="number" name="buyQuantity" style="width: 10%; font-size: 25px; text-align: center;" value="1" min="1" max="<?php echo $i['order_det'];?>">
                  				<button type="submit" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart
                               </button>

                          </form>
                    </div>
                </div>
            </div>
         </div>
        <?php } ?> 

<div class="uscfoot">
  <center>USC Shop 2018</center>
</div>    
    <?php require('footer.php');?>


