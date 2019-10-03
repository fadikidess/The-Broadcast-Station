<?php
 
    header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


if(isset($_FILES['file']['name'])){
    $name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$ext = end((explode(".", $name)));


if(move_uploaded_file($_FILES['file']['tmp_name'], "TBS_profilepics/".$_FILES['file']['name'])){
    if(file_exists("TBS_profilepics/".$_REQUEST['value1']."profilepic.png")){
    unlink("TBS_profilepics/".$_REQUEST['value1']."profilepic.png");
    }
    if(file_exists("TBS_profilepics/".$_REQUEST['value1']."profilepic.jpeg")){
    unlink("TBS_profilepics/".$_REQUEST['value1']."profilepic.jpeg");
    }
    if(file_exists("TBS_profilepics/".$_REQUEST['value1']."profilepic.jpg")){
    unlink("TBS_profilepics/".$_REQUEST['value1']."profilepic.jpg");
    }
    if(file_exists("TBS_profilepics/".$_REQUEST['value1']."profilepic.webp")){
    unlink("TBS_profilepics/".$_REQUEST['value1']."profilepic.webp");
    }
    if(file_exists("TBS_profilepics/".$_REQUEST['value1']."profilepic.bmp")){
    unlink("TBS_profilepics/".$_REQUEST['value1']."profilepic.bmp");
    }
    rename("TBS_profilepics/".$_FILES['file']['name'],"TBS_profilepics/".$_REQUEST['value1']."profilepic.".$ext);
    
    echo "ok";
}
    echo "uhoh";
    
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.topnav {
  overflow: hidden;
  background-color: #76b852;
}

.topnav a {
  float: left;
  display: block;
  color: #00ff00;
  text-align: center;
  padding: 0px 0px;
  text-decoration: none;
  font-size: 25px;
}



.search-container {
  float: right;
}

input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.search-container button:hover {
  background: #ccc;
}

.title{
margin-left: 70px;
top: 0;
}
a {
  color: black;
  text-decoration: none; /* no underline */
}

@media screen and (min-width: 800px) {
    span {
        font-size: 35px;
    }
    input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

}

@media only screen and (max-width: 600px) {
    input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 8px;
  border: none;
}

.search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 8px;
  border: none;
  cursor: pointer;
}

  span {
    font-size: 20px;
  }
}

@media only screen and (max-width: 400px) {
    input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 6px;
  border: none;
}

.search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 6px;
  border: none;
  cursor: pointer;
}

  span {
    font-size: 15px;
  }
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/index.php">Home</a>
  <a href="/postImage.php">Upload</a>
  <a href="#">Profile</a>
  <a href="/v1/newEmptyPHP.php">Login</a>
  <a onclick='logout()' >Logout</a>
</div>

<div class="topnav" id="myTopnav">

<span class="span"style="cursor:pointer;" onclick="openNav()">&#9776; <i class="fas fa-broadcast-tower"></i> The Broadcast Station</span>

<div class="search-container">
    <form action="/search.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
    <div align='center' >
        <h2><?php echo $_REQUEST['value3'];?></h2>
        <br>
        <img id='display' alt="" style="border-radius: 50%;width:10%;" src="<?php echo "TBS_profilepics/".$_REQUEST['value3']."profilepic.png"; ?>" />
        <img id='display'alt="" style="border-radius: 50%;width:10%;" src="<?php echo "TBS_profilepics/".$_REQUEST['value3']."profilepic.jpg"; ?>" />
        <img id='display'alt="" style="border-radius: 50%;width:10%;" src="<?php echo "TBS_profilepics/".$_REQUEST['value3']."profilepic.jpeg"; ?>" />
        <img id='display'alt="" style="border-radius: 50%;width:10%;" src="<?php echo "TBS_profilepics/".$_REQUEST['value3']."profilepic.bmp"; ?>" />
        <img id='display'alt="" style="border-radius: 50%;width:10%;" src="<?php echo "TBS_profilepics/".$_REQUEST['value3']."profilepic.webp"; ?>" />
        <i id='icon'class="fa fa-user fa-5x"></i>
        <br>
        <div id="in">
             upload profile picture <input type="file" id="file" accept="image/*"/></div>
        
    </div>
    
    <?php

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
   echo "<hr>","<a href='/feed.php?id=".$filename."'<h3>". fgets($myfile)."<div align='center'>".substr(substr($filename, 0,-8),20)."</div>";
   if(substr($filename,-3) != "mp4"){
   echo "<br><audio src='".$filename."' id='".$filename."'controls/><video src='".$filename."' width='250px'/>";
  }else{
       echo "<br><video src='".$filename."' id='".$filename."'width='250px'/>";
  
  } 
   echo "</h3></a>";
    }
    }else{
        echo "<script> location.replace('/v1/newEmptyPHP.php');</script>";
    }
}
echo "<script>var username = localStorage.getItem('username');
     if(username != '".$_REQUEST['value3']."'){
         document.getElementById('in').style.display = 'none';
     }   </script>";

    ?>
   
<script>
     var username = localStorage.getItem("username");
     function logout(){
         localStorage.setItem("username","");
         location.replace("/v1/newEmptyPHP.php");
     }
    document.querySelector("input[type=file]")
.onchange = function (){
        if(username !== null){

          var xhr = new XMLHttpRequest();
          var data = new FormData();
          data.append("value1",username);

          data.append("file",document.getElementById("file").files[0]);
          xhr.open("post","/profilepics.php",true);
         
          xhr.send(data);
          xhr.onreadystatechange = function(){
             
          if(xhr.responseText.substr(0,2) == "ok"){
              location.reload();
          }
      }
  }
        
    }
    document.getElementById("icon").style.display = "none";
    if(document.getElementById("display").src == "TBS_profilepics/profilepic"){
        document.getElementbyid("display").style.display = "none";
        document.getElementbyid("icon").style.display = "block";
    }
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  
</body>
</html> 

