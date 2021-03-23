<?php 
if(!session_id()){
	session_start();
}
if(isset($_POST['add_item'])){
	
	$item = array(
		'name' => $_POST['name'],
		'quantity' => $_POST['quantity'],
		'price' => $_POST['price'],
		'tax' => $_POST['tax'],
		'line_total' => $_POST['quantity']*$_POST['price'],
		'line_tax' => ($_POST['quantity']*$_POST['price']) * $_POST['tax']/100
		);
	$_SESSION['cart_content']['items'][] = $item;
	//echo json_encode($_SESSION['cart_content']);exit;
	echo json_encode($item);
}

if(isset($_POST['clear_cart'])){

	unset($_SESSION['cart_content']);
	
}
?>