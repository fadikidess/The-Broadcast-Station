<?php
    header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$usernames = $_POST["value1"];
$description = $_POST["value2"];
$descriptions = $_POST["value3"];
$rep = $_POST['rep'];
if($usernames == ""){
    $usernames = "Anonymous";
} 
    $target_dir_artposts = substr($rep, 0, -8);
    $newtargdirart = substr($rep, 0, -8).date("h:i:s", time()).$usernames."post";
$target_dir_artposts = $target_dir_artposts . "/" . basename($_FILES["file"]["name"]);
$contentType = $_FILES['file']['type'];


$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

if($fileextension == "mp3"){
 if(move_uploaded_file($_FILES["file"]["tmp_name"], substr($rep, 0, -8)."/".date("h:i:s", time()).$usernames."post.mp3")){
    
       


 echo "yes";
    echo $rep;
    $myfile = fopen(date("h:i:s", time()).$usernames.".txt", "w");
    rename(date("h:i:s", time()).$usernames.".txt", substr($rep, 0, -8)."/".date("h:i:s", time()).$usernames.".txt"); 
    echo substr($rep, 0, -8)."/".date("h:i:s", time()).$usernames.".txt";
    
    }   
    
}else{
    if(move_uploaded_file($_FILES["file"]["tmp_name"], substr($rep, 0, -8)."/".date("h:i:s", time()).$usernames."post.".substr($name,-3))){
    
     

 
    
    $myfile = fopen(date("h:i:s", time()).$usernames.".txt", "w");
    rename(date("h:i:s", time()).$usernames.".txt", substr($rep, 0, -8)."/".date("h:i:s", time()).$usernames.".txt"); 
    fwrite($myfile,$description."\n".$descriptions."\n");
        $myfiles = fopen(date("h:i:s", time()).$usernames."rate.txt", "w");
    rename(date("h:i:s", time()).$usernames."rate.txt", substr($rep, 0, -8)."/".date("h:i:s", time()).$usernames."rate.txt"); 
    echo "yes";
    
    }
}
    
?>
  
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
  .form-popup {
  position: fixed;
  z-index: 0;
  border: 3px solid #f1f1f1;
  
}
.form-container input[type=file], .form-container input[type=submit] {
  width: 100%;
  padding: 5px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
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
  <a href="#">Upload</a>
  <a id="pf" onclick="profile()">Profile</a>
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
    
    <div class="form-popup" id="myForm" action="index.php" onsubmit="submi()">
    <form target="_top" action="" method='post' id="form_up"class="form-container"  name="form" enctype="multipart/form-data">
        <h1>Submit entry for <?php $file =  substr($_REQUEST['rep'], 0, strlen($_REQUEST['rep'])-8).".txt"; 
             
             
$reallines = file($file);

            

  for ($x = 0; $x < 4; $x++) {
      if($x == 0){
      $move = trim($reallines[$x]);
echo $move;   
          
  }} ?></h1>
        <input type="file" name="file" class="file"id="files"accept="file_extension|audio/*|video/*"onchange="changefile()"/>
    <input type="text" placeholder="Title..."style="background-color: #f2f2f2;"id="title"/>
    <br>
    <input type="text" width='50px' height="30px"placeholder="Description..."style="background-color: #f2f2f2;width: 390px;"id="desc"/>
        <p id="er"></p>
    <button type="button" class="btn cancel" onclick="post()" >Post</button>
    <img style="display: none;" id="img"src="" width="350px" controls />
    
    <video style="display: none;" id="vid"src="" width="350px" controls />
   

    
</form>
    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
             $("img").on("error", function() {
  $(this).hide();
});
  $("video").on("error", function() {
  $(this).hide();
});
    function logout(){
         localStorage.setItem("username","");
         location.replace("/v1/newEmptyPHP.php");
     }
      var username = localStorage.getItem("username");
   function profile(){
   if(username !== null && username != ""){
       location.replace("/profilepics.php?value3="+username);
   }else{
       location.replace("/v1/newEmptyPHP.php");
   }
   }
   if(username == ""){
       document.getElementById("pf").style.display = "none";
   }
  function post(){
      
     if(username !== null && username != ""){

          var xhr = new XMLHttpRequest();
          var data = new FormData();
          data.append("value1",username);
          data.append("value2",document.getElementById("title").value);
          data.append("value3",document.getElementById("desc").value);
          data.append("rep",'<?php echo $_REQUEST['rep'] ?>');
          data.append("file",document.getElementById("files").files[0]);
          xhr.open("post","/compup.php",true);
         
          xhr.send(data);
          xhr.onreadystatechange = function(){
             
          if(xhr.responseText.substr(0,3) == "yes"){
             // location.replace("/profilepics.php?value3="+username);
          }
      }
  }else{
      location.replace("/v1/newEmptyPHP.php");
  }
    
  }function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
                document.getElementById('img').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("input").change(function(){
        readURL(this);
    });
    document.querySelector("input[type=file]")
.onchange = function(event) {
  let file = event.target.files[0];
  let blobURL = URL.createObjectURL(file);
  document.querySelector("video").style.display = "block";
  document.querySelector("video").src = blobURL;

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



