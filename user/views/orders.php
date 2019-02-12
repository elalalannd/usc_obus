<?php require('menu.php');


if(isset($_POST["checkout"])){

	// Delete items from current user
}

require('../controllers/OrderANDPurchaseController.php');
$orders = loadOrderTable();
?>

	<div class="span9" id="content">

	<div class="page-header" id="shoppagetitle">
		<h1> Current Order</h1>
	</div>    

	<!-- block -->
	<div class="block">
 		<div class="block-content collapse in">
	        <div id="tableviewer">
				<table class="table">
					<?php if(isset($orders)){foreach($orders as $orders){  ?>
		                <tbody>
			               <tr>
			                  <th>------------------------------</th>
			                  <td></td>						        
			                </tr>
			                <tr>
			                  <th>Date Order was made</th>
			                  <td> <?php echo $orders['OrderDate'];?> </td>						        
			                </tr>						             
			                <tr>
			                  <th>Item(s)</th>
			                  <td> </td>						        
			                </tr>
			                <tr>
			                  <td colspan="2"> <?php echo $orders['PurchasedItems'];?></td>			                  						        
			                </tr>


			                <tr>
			                  <th>Total</th>
			                  <td>₱ <?php echo number_format($orders['OrderAmount'],2);?> </td>						        
			                </tr>
			                <tr>
			                  <th>Shipping Status</th>
			                  <td>
			                  	<b>
				                  <span <?php if($orders['ShipStatus']=="Pending"){ ?> style="color:#ff6600;" <?php } ?>   
				                  		
				                  			<?php echo $orders['ShipStatus'];?>
				                  </span>
				              	</b>	
			                  </td>						        
			                </tr>						               					                
		                </tbody>
		               <?php }} ?>    
		        </table>
            </div>
            
        </div>
	</div>
	<!-- /block -->
</div>







    <?php require('footer.php');?>