<?php

$server_addr = $_SERVER['HTTP_HOST'];
$link = ('http').'://'.$server_addr .substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
//$link = ;

include_once("config.php");
include_once("functions.php");
include_once("paypal.class.php");
$_SESSION['keey'] = $_GET['id'];

define('PPL_RETURN_URL', $link.'/success.php?id='.$_GET['id']);
define('PPL_CANCEL_URL', $link.'/cancel_url.php');

	$paypal= new MyPayPal();
	
	//Post Data received from product list page.
	if(_GET('paypal')=='checkout'){
		
		//-------------------- prepare products -------------------------
		
		//Mainly we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
		
		//Please Note : People can manipulate hidden field amounts in form,
		//In practical world you must fetch actual price from database using item id. Eg: 
		//$products[0]['ItemPrice'] = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");
		
		$products = [];
		
		
		
		// set an item via POST request
		
		$products[0]['ItemName'] = "Graham Item:"; //Item Name
		$products[0]['ItemPrice'] = "9"; //Item Price
		$products[0]['ItemDesc'] = "Dummy Description"; //Item Number
		$products[0]['ItemQty']	= 1; // Item Quantity
		

		$charges = [];
		
		//Other important variables like tax, shipping cost
		$charges['TotalTaxAmount'] = 0;  //Sum of tax for all items in this order. 
		$charges['HandalingCost'] = 0;  //Handling cost for this order.
		$charges['InsuranceCost'] = 0;  //shipping insurance cost for this order.
		$charges['ShippinDiscount'] = 0; //Shipping discount for this order. Specify this as negative number.
		$charges['ShippinCost'] = 0; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
		
		//------------------SetExpressCheckOut-------------------
		
		//We need to execute the "SetExpressCheckOut" method to obtain paypal token

		$paypal->SetExpressCheckOut($products, $charges);		
	}
	elseif(_GET('token')!=''&&_GET('PayerID')!=''){
		
		//------------------DoExpressCheckoutPayment-------------------		
		
		//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
		//we will be using these two variables to execute the "DoExpressCheckoutPayment"
		//Note: we haven't received any payment yet.
		
		$paypal->DoExpressCheckoutPayment();
	}
	else{
		
		//order form
		

	}
