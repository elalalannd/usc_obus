<?php
 session_start();
// Create connection
$connect = mysqli_connect("localhost","root","","product");

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

    <!-- Custom styles for this template -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <script href="vendor/bootstrap/js/bootstrap.min.js"></script>
  

  </head>

  <body>

    <!-- Navigation -->

<!-- Connecting to Database -->

      <?php
          $query = "SELECT * FROM books ORDER BY book_id ASC";
          $result = mysqli_query($connect, $query);
          $query = "SELECT * FROM uniform WHERE UPPER(TYPE)=UPPER('Top') ORDER BY uni_id ASC";
          $uniformTop = mysqli_query($connect, $query);
          $query = "SELECT * FROM uniform WHERE UPPER(TYPE)=UPPER('Bottom') ORDER BY uni_id ASC";
          $uniformBottom = mysqli_query($connect, $query);
          $query = "SELECT * FROM uniform WHERE UPPER(TYPE)=UPPER('Polo') ORDER BY uni_id ASC";
          $uniformPolo = mysqli_query($connect, $query);
          $query = "SELECT * FROM uniform WHERE UPPER(TYPE)=UPPER('Pants') ORDER BY uni_id ASC";
          $uniformPants = mysqli_query($connect, $query);
      ?>

<br>
<div class="container">  
  <div class="card">
    <div class="col-sm-6">
      <div class="align">
        <h2>College Books</h2>
        <div class="input-group-append float-right">
        <a href="vieworders.php" class="btn btn-success" style="">View orders
        </a></div>
        <hr><br>
        <label>Book Title | Author | Price</label>
          <div class="input-group">
            <select  name="book" class="custom-select" id="book">
              <option>Book</option> 
                        <?php
 
               
                if(mysqli_num_rows($result) > 0){
                while ($product = mysqli_fetch_assoc($result)){
                 
                  if ($product['type'] ) {
                    # code...
                  }
                  echo '<option value=' . $product['book_id'] . '>' . $product['title'] . '</option>';
                  }   
                }
                ?>
            </select>
            &nbsp; 
            <input type="number" class="col-sm-2" min="0" max="10">
        
        <br>
          <div class="input-group-append float-right" >
            <button class="btn btn-success" type="submit" href="vieworders.php">Add</button>
             <br> 
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="card">
    <div class="col-sm-11">
      <div class="align">
        <h2>College Uniforms</h2>
         <hr> <br>

          <form>
          <div class="form-row">
            <h3>Girls</h3>
              <div class="col-md-4 ms-2">
              <div class="input-group" >
                  <select  name="uniform" class="custom-select" id="uniform">
                      <option>Blouse</option>
                          <?php
 
               
                 if(mysqli_num_rows($uniformTop) > 0)
                 {
                  while ($item = mysqli_fetch_assoc($uniformTop))
                  {
                    /*if ( strcmp($item['type'],'Top') == 0)
                    {*/
                  
                      echo '<option value=' . $item['uni_id'] . '>' . $item['size'] . '</option>';
                    //}   
                  }
                }
                ?>
                    </select>
                     &nbsp; 
                    <input type="number" class="col-sm-3" min="0" max="10">
                  
                  <div class="input-group-append float-right">
                       <button class="btn btn-success" type="button">Add</button>
                    <br>
                  </div>
              </div>
            </div>
            <div class="col-md-4 ms-2">
              <div class="input-group" >
                    <select  name="uniform" class="custom-select" id="uniform">
                      <option>Pants and Skirts</option>
                      <?php  

                        if(mysqli_num_rows($uniformBottom) > 0)
                        {
                          while ($item = mysqli_fetch_assoc( $uniformBottom))
                          {
                            
                              echo '<option value=' . $item['uni_id'] . '>' . $item['size'] . '</option>';
                            
                          }
                        }
                      ?>
                     </select>
                      &nbsp;

                    <input type="number" class="col-sm-3" min="0" max="10">
                  
                  <br>
                  <div class="input-group-append">
                       <button class="btn btn-success" type="button" onclick="">Add</button>
                  </div>
                  <br>
              </div>
            </div>
          </div>
          </form>
      <br>
          <form>
            <div class="form-row">
              <h3>Boys</h3>
                <div class="col-md-4 ms-2">
                  <div class="input-group" >
                      <select  name="uniform" class="custom-select" id="uniform">
                      <option>Polo</option>
                          <?php
 
               
                 if(mysqli_num_rows($uniformPolo) > 0)
                 {
                  while ($item = mysqli_fetch_assoc( $uniformPolo))
                  {
                    
                  
                        echo '<option value=' . $item['uni_id'] . '>' . $item['size'] . '</option>';
                  }   
                }
              
                ?>
                      </select>
                         &nbsp; 
                       <input type="number" class="col-sm-3" min="0" max="10">
                        <br>
                        <div class="input-group-append">
                             <button class="btn btn-success" type="button">Add</button>
                        </div>
                  </div>
              </div>
              <div class="col-md-4 ms-2">
                <div class="input-group">
                      <select  name="uniform" class="custom-select" id="uniform">
                      <option>Pants</option>
                          <?php
 
               
                 if(mysqli_num_rows($uniformPants) > 0)
                 {
                  while ($item = mysqli_fetch_assoc( $uniformPants))
                  {
                   
                  
                  echo '<option value=' . $item['uni_id'] . '>' . $item['size'] . '</option>';
                  
                }
              }
                ?>

                 
                      </select>
                       &nbsp; 
                    <input type="number" class="col-sm-3" min="0" max="10">
                    <br>
                    <div class="input-group-append">
                         <button class="btn btn-success" type="button">Add</button>
                    </div>
                </div>
              </div>
          </form>
          <br>
        </div>
        </div>
      </div>
    </div>
    </body>
  </html>