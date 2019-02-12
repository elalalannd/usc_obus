<?php 

include 'nav.php';


 session_start();
// Create connection
$connect = mysqli_connect("localhost","root","","usc");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <script href="vendor/bootstrap/jquery/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <script href="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" type="text/css" href="book.css">-->
    <link href="usc/book.css">
  <body>

    <div class="container" style="width: 65%">
     <br><h2> USC Books </h2>
  
  <!-- Page Content -->
     
          <div class="input-group-append">
          <form method="post"  action="vieworders.php">
            <div class="form-row">
              <div class="col-md-3 mb-3"><br>
              <div class="input-group">
              <table style="width:140px;">
              <tr>
            
                  <?php
                      $query = "SELECT * FROM books ORDER BY book_id ASC";
                      $result = mysqli_query($connect, $query);
                          if(mysqli_num_rows($result) > 0)
              {
                      while($row = mysqli_fetch_array($result))
                { 
                
                  echo '<td style="width:80px; height: 50px; ">';
                  echo '<div class="product">';
                
                  /*<img src="<?php echo $row["image"]?>" class="img-responsive">-->*/
                  echo '<h5 class="text-info">'.$row['title'].'</h5> ';
                   echo '<h5 class="text-danger"'.$row['price'].'</h5> ';
                   echo '<input type="number" name="quantity" class="form-control">';
                  echo '<input type="hidden" name="title" value="'.$row['title'].'">';
                  echo '<input type="hidden" name="price" value="'.$row['title'].'">';
                  echo '<input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart" >';
                  echo '<br>';
                  echo '</div>';
                  echo '</td>';
                }
              }
            ?>
           </tr>
         </table>
            </div>
          </div> 
        </div>
        
    </form>
    </div>



              
  </body>
  </html>
