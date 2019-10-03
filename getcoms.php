<?php

    header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


             $file =  substr($_REQUEST['id'], 0, strlen($_REQUEST['id'])-8).".txt"; 
             
             
$reallines = file($file);
  $lines = count(file($file));  
    
  for ($x = 0; $x < $lines-2; $x++) {
     echo "<hr>"; 
    $move = trim($reallines[$x+2]);
    $user = explode(":", $move,2);
     echo "<a  onclick='fun(\"".$user[0]."\");' href='#'><img  onerror=\"this.style.display='none'\"alt=' 'style='border-radius: 50%;width:4%;' src='https://www.thebroadcaststation.com/TBS_profilepics/".$user[0]."profilepic.png'/> ";
                echo "<img alt=' ' onerror=\"this.style.display='none'\"style='border-radius: 50%;width:4%;' src='https://www.thebroadcaststation.com/TBS_profilepics/".$user[0]."profilepic.jpg'/> ";
                echo "<img alt=' ' onerror=\"this.style.display='none'\"style='border-radius: 50%;width:4%;' src='https://www.thebroadcaststation.com/TBS_profilepics/".$user[0]."profilepic.jpeg'/> ";
                echo "<img alt=' ' onerror=\"this.style.display='none'\"style='border-radius: 50%;width:4%;' src='https://www.thebroadcaststation.com/TBS_profilepics/".$user[0]."profilepic.bmp'/> ";
                echo "<img alt=' '  onerror=\"this.style.display='none'\"style='border-radius: 50%;width:4%;' src='https://www.thebroadcaststation.com/TBS_profilepics/".$user[0]."profilepic.webp'/>".$move."</p></a> ";
                
    
   
   
}
  