
<?php


	/*if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('Location: index.php');
		exit();
	}
*/

        $arrDIR = array();
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://ipnpb.paypal.com/cgi-bin/webscr');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "cmd=_notify-validate&" . http_build_query($_POST));
	$response = curl_exec($ch);
	curl_close($ch);

	if ($response == "VERIFIED") {
		$cEmail = $_POST['payer_email'];
		$name = $_POST['first_name'] . " " . $_POST['last_name'];

		$price = $_POST['mc_gross'];
		$currency = $_POST['mc_currency'];
		$item = $_POST['item_name'];
		$paymentStatus = $_POST['payment_status'];
               
                FOREACH (glob($local_image = "temp_folder/*") as $filenames) :
                IF (is_file($filenames)) :  // if you want to omit directories
                  $arrDIR[$filenames] = filemtime($filenames);
                
                ${"anothervar$is"} = substr($filenames, 12);
                
                
                if ($paymentStatus == "Completed" && ${"anothervar$is"} == $item) {
                    
                    $file = fopen("Test.txt", 'a');//creates new file
                    fwrite($file,${"anothervar$is"}."\n");
                    
                    
                }
                $is++; 
                ENDIF;
              ENDFOREACH;
	}














?>
