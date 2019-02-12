

//For items

//function loadItemPage(ModelNo){
//	window.location='itempage.php?itemID='+ModelNo;
//}

//cart

function LoadCart(ModelNo){
	if (confirm('Add Item to your cart?')){
	window.location='../controllers/CartController.php?cartID='+ModelNo;
	}else{
		return false;
	}
}

function loadDeleteCart(CartID){
if (confirm('Are you sure?')){
	window.location='../controllers/CartController.php?deleteID='+CartID;
}else{
	return false;
}
}

