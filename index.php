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
  <a href="#">Home</a>
  <a href="/postImage.php">Upload</a>
  <a id="pf" onclick="profile()">Profile</a>
    <a href="/feedcomp.php"> View Contests</a>
  <a href="/createcomp.php"> Create Contests</a>
  <a href="/v1/newEmptyPHP.php">Login</a>
  
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
    <div id="feed">
    <?php
    $fileList = glob('TBS_uploads/*');

//Loop through the array that glob returned.
    $x = 0;
    
    usort($fileList, function ($a, $b) {
   return filemtime($b) - filemtime($a);
});
foreach($fileList as $filename){
   //Simply print them out onto the screen.
    if($x < 5){
    if(substr($filename,-3) != "txt"){
        
        $myfile = fopen(substr($filename, 0,-8).".txt", "r+") or die("Unable to open file!");
   echo "<hr>","<a href='/feed.php?id=".$filename."'<h3>". fgets($myfile)."<div align='center'>".substr(substr($filename, 0,-8),20)."</div>";
  if(substr($filename,-3) != "mp4"){
   echo "<br><audio src='".$filename."' id='".$filename."'controls/><video src='".$filename."' width='250px'/>";
  }else{
       echo "<br><video src='".$filename."' id='".$filename."'width='250px'/>";
  
  }
  
   fclose(substr($filename, 0,-8).".txt");
  
   echo "</h3></a>";
   $x++;
    }
    }
}


    ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    var load = 5;
    
    var x = false;
    setTimeout(tru,7500);
    function tru(){
        
        x = false;
    }
    $(window).scroll(function() {
        
    if($(window).scrollTop() >= $(document).height() - $(window).height()-200) {
        if(x == false){
      
        
          $.ajax(
    {
        url: 'feedload.php',
         async: true,
        data: {ld: load},
        success: function(data)
        {
            
            if(document.getElementById("feed").innerHTML.includes(data)){
            document.getElementById("feed").innerHTML = document.getElementById("feed").innerHTML + data;
           
        }
         x = true;
        
        }
    })
    load += 5;
    }
    
    
    }
});
    function logout(){
         localStorage.setItem("username","");
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
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  
</body>
</html> 

