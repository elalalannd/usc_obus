<?php
  session_start();
$connect = mysqli_connect("localhost","root","","books");

if(isset($_POST["add"]))
{
      if(isset($_SESSION["cart"]))
    {

      $item_array_id = array_column($_SESSION["cart"],"book_id");

        if(!in_array($_GET["id"], $item_array_id))
        {
          $count = count($_SESSION["cart"]);
          $book_array = array(

            'book_id'           => $_GET["id"],
            'book_name'         => $_POST["hidden_bname"],
            'book_price'        => $_POST["hidden_price"],
            'book_quantity'     => $_POST["quantity"]);
            $_SESSION["cart"][0]= $book_array; 

        }
    }

            if(isset($_GET["action"]))

}
?>