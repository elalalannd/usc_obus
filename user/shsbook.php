<?php 

session_start();

$connect = mysqli_connect("localhost","root","","books");

if(isset($_POST["add"])){
    if(isset($_SESSION["shopping_cart"])){
  $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
  if(!in_array($_GET["id"], $item_array_id)){
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'             =>  $_GET["id"],
        'item_name'           =>  $_POST["hidden_name"],
        'item_price'          =>  $_POST["hidden_price"],
        'item_quantity'       =>  $_POST["quantity"]
        );


        $_SESSION["shopping_cart"][$count] = $item_array;
        echo '<script>window.location="shsbooks.php</script>';   
}else{ 
      echo '<script>alert("Item Already Added")</script>';
      echo  '<script>window.location="shsbooks.php"</script>';

      }
 }else{
      $item_array = array(
        'item_id'             =>  $_GET["id"],
        'item_name'           =>  $_POST["hidden_name"],
        'item_price'          =>  $_POST["hidden_price"],
        'item_quantity'       =>  $_POST["quantity"]
        );

      $_SESSION["shopping_cart"][0] = "item_array";

    
 }

}

    
  if(isset($_GET["action"]))
  {
    if($_GET["action"] == "delete")
    {

      foreach ($_SESSION["shopping_cart"] as $keys => $values) {

        if($values["item_id"] == $_GET["id"])
        {

              unset($_SESSION["shopping_cart"] [$keys]);
              echo '<script>alert("Item Removed</script>';
              echo'<script>window.location=="books.php"</script>';
            }        
        }

      }

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

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
  <?php 
   include 'nav.php';
   ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">
        <small>USC Books</small>
      </h1>
      <?php
      $query = "SELECT * FROM product ORDER BY id ASC";
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) > 0)
      {
          while($row = mysqli_fetch_array($result))
          {

      ?>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
          <form method="post" action="books.php?action=add&id=<?php echo  $row["id"]; ?>"> 
			<center><image src="usc books/Art_of_Truth.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Act of Truth</a></center>
              </h4>
              
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
			<center><image src="usc books/Arts_and_Design.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Arts and Design</a></center>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Business_Math.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Business Math</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
           <center><image src="usc books/General_Math.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>General Math</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Knowing_Our_Social_World.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Knowing Our Social World</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Komunikasyon_at_Pananaliksik.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Komunikasyon at Pananaliksik</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Literary_Encounters.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Literary Encounters</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Pagbasa_at_Pagsusuri.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Pagbasa at Pagsusuri</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Pre_Calculus.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Pre Calculus</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Seeing_the_World.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Seeing the World</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Senior_High_Growing_Up.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Senior High Growing Up</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Speak_Confidently.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Speak Confidently</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Senior_High_Growing_Up.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Senior High Growing Up</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Study_of_Matter.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Study of Matter</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Think_click_share.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Think_click_share</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
		<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <center><image src="usc books/Thinking_Human.jpg" width="75%"></center>
            <div class="card-body">
              <h4 class="card-title">
                <center>Thinking Human</center>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php 
   include 'footer.php';
   ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
