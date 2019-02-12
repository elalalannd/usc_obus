<?php

  
include 'index.php';
include 'server.php';
    
?>

<br><br>
    <div style="clear: both"></div>
          <h3 class="title2">Item Details</h3>
              <div class="table-responsive">

                <table class="table table-bordered">
                
                <tr>
                    
                    <th width="30%">Item Title</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <th width="10%">Total Price</th>
                    <th width="17%">Remove Book</th>

                </tr>

           
          <?php 
      
            if(!empty($_SESSION['cart']))
          {

            $total = 0;

            foreach ($_SESSION['cart'] as $keys => $row)

            {  
        ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td>&#8369 <?php echo $row['price']; ?></td>
            <td>&#8369 <?php echo number_format($row['quantity'] * $row['price'], 2);  ?></td>
            <td><a href="books.php?action=delete&id=<?php echo $row['book_id']; ?>">
            <span class="text-danger">Remove</span></a></td> 
       </tr>
         
         <?php 
             
             $total = $total + ($row['quantity'] * $row['price']);
      }
        ?>
            <tr>
                 <td colspan="3" align="right">Total</td>
                  <th align="right">&#8369 <?php echo number_format($total, 2); ?></th>
                 <td></td>
            </tr>
        <?php 
      }
      
   ?>
      </table>
   </div>

</div>