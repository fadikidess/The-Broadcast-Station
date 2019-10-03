<?php

    header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


             $file =  "Dig.txt"; 
             
             
$reallines = file($file);
  $lines = count(file($file));  
    
  for ($x = 0; $x < $lines; $x++) {
     echo "<hr>"; 
    $move = trim($reallines[$x]);
    $user = explode(":", $move,2);
                echo  "<i id='icon'class='fa fa-user fa-3x'></i>   $move ";
                
    
   
   
}
  