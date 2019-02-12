<?php require('menu.php');

require('../controllers/CartController.php');

$total = 0;

$cart = loadCart();
?>


	<div class="span9" id="content">
  	  <div class="page-header" id="shoppagetitle">
        <h3> Your Cart</h3>
      </div>     
        <div class="block">
          <div class="block-content collapse in">
           <div id="tableviewer">
    		<table class="table">
            <thead>
            <tr>
              <th></th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>  
              <th>Net Total</th>                                                                               
            </tr>
          	</thead>
          	<thead>
            <tr>
              <th></th>
              <th>Type</th>
              <th>Price</th>
              <th>Quantity</th>  
              <th>Net Total</th>                                                                               
            </tr>
          	</thead>
