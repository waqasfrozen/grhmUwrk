<?php



include_once("config.php");
include_once("functions.php");
include_once("paypal.class.php");

	$paypal= new MyPayPal();
	
	//Post Data received from product list page.
	if(_GET('token')!=''&&_GET('PayerID')!=''){
		
		//------------------DoExpressCheckoutPayment-------------------		
		
		//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
		//we will be using these two variables to execute the "DoExpressCheckoutPayment"
		//Note: we haven't received any payment yet.
        $padata = 	'&TOKEN='.urlencode(_GET('token'));

        $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, PPL_API_USER, PPL_API_PASSWORD, PPL_API_SIGNATURE, PPL_MODE);
		//var_dump($httpParsedResponseAr);
		if(!empty($httpParsedResponseAr) AND $httpParsedResponseAr['ACK'] == 'Success'){
		    $id = explode("%3a",$httpParsedResponseAr['L_NAME0']);
		    $id = $id[(count($id)-1)];




//            echo $x;
//            echo $output;



        }else{
		    echo "Something went wrong!";die;
        }
        $paypal->DoExpressCheckoutPayment();
	}
?>
