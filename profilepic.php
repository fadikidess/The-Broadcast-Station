<?php
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


    $fileList = glob('TBS_uploads/*');
  usort($fileList, function ($a, $b) {
   return filemtime($b) - filemtime($a);
});
//Loop through the array that glob returned.
foreach($fileList as $filename){
   //Simply print them out onto the screen.
if(isset($_REQUEST['value3'])){
        if(substr($filename,-3) != "txt" && substr(substr($filename, 0,-8),20) == $_REQUEST['value3']){
        $myfile = fopen(substr($filename, 0,-8).".txt", "r+") or die("Unable to open file!");
   echo "<hr>","<a onclick='func(\"".$filename."\");' href='#'><h3>". fgets($myfile)."<div align='center'>".substr(substr($filename, 0,-8),20)."</div>";
   if(substr($filename,-3) != "mp4"){
   echo "<br><audio src='https://www.thebroadcaststation.com/".$filename."' id='".$filename."'controls/><video src='https://www.thebroadcaststation.com/".$filename."' width='250px'/>";
  }else{
       echo "<br><video src='https://www.thebroadcaststation.com/".$filename."' id='".$filename."'width='250px'/>";
  
  } 
   echo "</h3></a>";
    }
    }else{
        echo "<script> location.replace('v1/newEmptyPHP.php');</script>";
    }
}
echo "<script>var username = localStorage.getItem('username');
     if(username != '".$_REQUEST['value3']."'){
         document.getElementById('in').style.display = 'none';
     }   </script>";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

