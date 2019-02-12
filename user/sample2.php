if(isset($_POST["add"]))
{
  if(isset($_SESSION["cart"]))
    {
      $item_array_id = array_column($_SESSION["cart"], "item_id");
      
       if(!in_array($_GET["id"], $item_array_id))
        {
          $count = count($_SESSION["cart"]);
            $item_array = array(
          'item_id'             =>  $_GET["id"],
          'item_size'           =>  $_POST["hidden_size"],
          'item_type'          =>  $_POST["hidden_type"],
          'item_price'          =>  $_POST["hidden_price"],
          'item_quantity'       =>  $_POST["quantity"],
              );

            $_SESSION["cart"] [$count] = $item_array;
           echo '<script>window.location="uniform.php"</script>';
        }else{
           echo '<script>alert("Uniform Already Added")</script>';
           echo '<script>window.location="uniform.php"</script>';
        }
        }else{
           $item_array = array(
          'item_id'             =>  $_GET["id"],
          'item_size'           =>  $_POST["hidden_size"],
          'item_type'          =>   $_POST["hidden_type"],
          'item_price'          =>  $_POST["hidden_price"],
          'item_quantity'       =>  $_POST["quantity"],
        );
          $_SESSION["cart"][0]= $item_array;
    }
  }
      
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach ($_SESSION["cart"] as $keys => $values){
            if($values["item_id"] == $_GET["id"]){

              unset($_SESSION["cart"] [$keys]);
              echo '<script>alert("Item Removed</script>';
              echo'<script>window.location=="uniform.php"</script>';
        }        
      }
    }
}


?>