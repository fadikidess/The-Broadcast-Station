<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$fileList = glob('TBS_uploads/*');
 usort($fileList, function ($a, $b) {
   return filemtime($b) - filemtime($a);
});
 $y = 0;
   $x = $_REQUEST['ld'];
foreach($fileList as $filename){
   //Simply print them out onto the screen.
   
    if($x > $y - 5 && $x < $y){
    if(substr($filename,-3) != "txt"){
        
        $myfile = fopen(substr($filename, 0,-8).".txt", "r+") or die("Unable to open file!");
   echo "<hr>","<a onclick='func(\"".$filename."\");' href='#'><div align='center'>".substr(substr($filename, 0,-8),20)."</div>";
  if(substr($filename,-3) != "mp4"){
   echo "<br><audio src='https://www.thebroadcaststation.com/".$filename."' id='".$filename."'controls/><video src='https://www.thebroadcaststation.com/".$filename."' width='250px'/>";
  }else{
       echo "<br><video src='https://www.thebroadcaststation.com/".$filename."' id='".$filename."'width='250px'/>";
                                                                                            
  }
  

   echo "</h3></a>";
   
    }
    }
    
    $y++;
}

