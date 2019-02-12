<?php require('MysqlConnect.php'); 


if(isset($_POST['addCart'])){
      AddToCart();
}

if(isset($_GET['deleteID'])){
      deleteFromCart();
}

if(isset($_POST['checkout'])){
    checkOutCart();
}

function AddToCart(){
  session_start();
  $conn = myConnect();
  $sql = "SELECT * FROM books WHERE item_id = '{$_POST['cartID']}' ";
  $result = mysqli_query($conn, $sql);
  $sql = "SELECT * FROM uniforms WHERE item_id = '{$_POST['cartID']}' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

 
   $cartitem_Title= $row['title'];
   $cartitem_Price = $row['price'];
   $cartitem_UserID = $_SESSION['profile']['CustomerID'];
   $cartitem_ItemID = $_POST['cartID'];


   $sql = "INSERT INTO cartbooks(title, price, buyQuantity, UserID, ItemID) VALUES ('$cartbook_name', '$cartbook_price','{$_POST['buyQuantity']}', '$cartbook_UserID', '$cartbook_ItemID')";
   $result = mysqli_query($conn, $sql);



    
   $cartitem_Type  = $row['type'];
   $cartitem_Size = $row['size'];
   $cartitem_Gender = $row['gender'];
   $cartitem_UserID = $_SESSION['profile']['CustomerID'];
   $cartitem_ItemID = $_POST['cartID'];


   $sql = "INSERT INTO cartuniform(type, size,gender, BuyQuantity, UserID, ItemID) VALUES ('$cartuniform_type', '$cartitem_price','{$_POST['BuyQuantity']}', '$cartuniform_UserID', '$cartuniform_ItemID')";
   $result = mysqli_query($conn, $sql);




  header('Location: ../views/yourcart.php');



}


