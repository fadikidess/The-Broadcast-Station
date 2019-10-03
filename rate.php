<?php
$o = true;
$username = $_REQUEST['value1'];
$rate = $_REQUEST['value2'];
$urls = $_REQUEST['value3'];   
 $filesd =  substr($urls, 0, strlen($urls)-8)."rate.txt"; 
             
$reallinessd = file($filesd);
  $linessd = count(file($filesd));  
    for ($xod = 0; $xod < $linessd; $xod++) {
    $movd = trim($reallinessd[$xod]);
    $movesd = substr($movd,1);
    
    if($username == $movesd){
        $o = false;
        echo $reallinessd[$xod];
    echo $xod;
    }
    }
if(isset($_POST['value3']) && isset($_POST['value2']) && $o == true){
$url = substr($urls, 0, strlen($urls)-8)."rate.txt";

$file = fopen($url,"a");

fwrite($file,$rate.$username."\n");
fclose($file);
}
       

  
  
  