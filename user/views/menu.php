<?php require('header.php');?>
<?php session_start();
if(!$_SESSION['profile']){ header('Location:../index.php');}
?>
  <body>

    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container"> 
        <img src="uscuniform/usc1.png" height= 50px width= 50px>
      &nbsp &nbsp
      <!-- Brand and toggle get grouped for better mobile display --> 
       
           <a class="navbar-brand" href=""> USC<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Shop</a>
        </div>
         
        <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
              <li><a href=""> Shop <span class="sr-only"></span></a></li>
              <li><a href="yourcart.php"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> USC Cart </a></li>
              </ul> 

                  <ul class="nav navbar-nav navbar-right">  
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION["profile"]["FullName"];?> <span class="caret"></span></a>       
                  
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION["profile"]["FullName"];?> 
              <span class="caret">
                
              </span> 
            </a>
                    
                  <ul class="dropdown-menu">

                  <li> <a href="" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
                  <li><a href=""> <span class="glyphicon glyphicon-tag"   aria-hidden="true"></span> Orders</a></li>
                  <li><a href=""> <span class="glyphicon glyphicon-list"  aria-hidden="true"></span> Cart  History</a></li>
                  <li><a href=""> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                  </ul>

                  </li>
                  </ul>
          </div>
      </div>
</nav>



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- /.container -->

    <!-- Footer -->
    
    <?php require('footer.php');?>

