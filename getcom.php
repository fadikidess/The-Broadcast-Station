<?php
    header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


 $r = 0;
             $file =  substr($_REQUEST['id'], 0, strlen($_REQUEST['id'])-8).".txt"; 
             
             
$reallines = file($file);

            $files =  substr($_REQUEST['id'], 0, strlen($_REQUEST['id'])-8)."rate.txt"; 
             
             
$realliness = file($files);
  $liness = count(file($files));  
    
  
  for ($x = 0; $x < 2; $x++) {
      if($x == 0){
      $move = trim($reallines[$x]);
    echo "<h2>".$move."<div align='right'>Uploaded by ".substr(substr($_REQUEST['id'], 0,-8),20)."</div></h2>";
    echo "<br><br>";    
          
  }else{
    $move = trim($reallines[$x]);
    echo $move;
    
}

   
}
for ($xo = 0; $xo < $liness; $xo++) {
    $mov = trim($realliness[$xo]);
    $moves = (int)substr($mov, 0,1);
    $r += $moves;

  }
$rp = $r/$liness;
$r = (int)$rp;
if($r == "0"){
    echo "<br><div align='right'>".$liness." people have rated this<br>  <span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>";
}else if($r == "1"){
   echo "<div align='right'> ".$liness." people have rated this<br>  <span style='color: orange;' class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "2"){
   echo "<div align='right'>".$liness." people have rated this<br>  <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "3"){
   echo "<div align='right'>".$liness." people have rated this<br>  <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "4"){
   echo "<div align='right'>".$liness." people have rated this<br>   <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  style='color: orange;' class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "5"){
   echo "<div align='right'>".$liness." people have rated this <br>   <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star'></span> </div></h2>"; 
}
    echo "<br><br>";
  
           
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

