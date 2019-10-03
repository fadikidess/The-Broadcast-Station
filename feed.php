<!DOCTYPE html>
<html>
<head>
    <title>The Broadcast Station</title>
    <meta property="og:title" content="<?php  $r = 0;
             $file =  substr($_REQUEST['id'], 0, strlen($_REQUEST['id'])-8).".txt"; 
             
             
$reallines = file($file);

            $files =  substr($_REQUEST['id'], 0, strlen($_REQUEST['id'])-8)."rate.txt"; 
             
             
$realliness = file($files);
  $liness = count(file($files));  
    
  
  for ($x = 0; $x < 2; $x++) {
      if($x == 0){
      $move = trim($reallines[$x]);
      echo $move;
  }}?>" />
<meta property="og:video" content="https://www.thebroadcaststation.com/<?php echo $_REQUEST['id'];?>" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 19%;
  margin-bottom:10px;
  opacity: 0.8;
}
input[type=submit] {
  width: 19%;
  padding: 5px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
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
<?php 
$con = mysqli_connect("localhost","fadikide_fadikid", "FGKpro2003", "fadikide_TBS") or die("Error connecting to database: ".mysql_error());

$username = $_POST['value1'];
$comments = $_POST['value2'];
$urls = $_POST['value3'];     
$uploader = substr($urls,20,strlen($urls)-28);
if(isset($_POST['value3']) && isset($_POST['value2'])){
$url = substr($urls, 0, strlen($urls)-8).".txt";

$file = fopen($url,"a");

fwrite($file,$username.": ".$comments."\n");

$reallines = file($url);

$move = trim($reallines[0]);
 $raw_results = mysqli_query($con,"SELECT * FROM users
            WHERE (`username` LIKE '%".$uploader."%') OR (`username` LIKE '%".$uploader."%')");
$headers = "From:  official@thebroadcaststation.com\r\n";

 if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following••••••••

           
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                mail($results['email'],$username." Just Commented on your Post Titled '". $move,"Hello ".$results['name']."', \n\n".$username." just commented '".$comments."' on your video '". $move."'.\n\n\n\n \n Enjoy! \n The Broadcast Station",$headers);
      
                
             echo $results['email'];
             
        }


} fclose($file);}


?>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Home</a>
  <a href="/postImage.php">Upload</a>
  <a id="pf"onclick="profile()">Profile</a>
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
    <br>
    
    <video width='100%' src="<?php echo $_REQUEST['id'];?>" id='vid'controls autoplay=""></video>

     
<div >
    <?php 

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
 
  if($liness == 0){
      $rp = 0;
  }else{
$rp = $r/$liness;
$r = (int)$rp;
  }
if($r == "0"){
    echo "<br><div align='right'>"; if($liness == 1){echo "1 person rated this";}else{echo $liness." people have rated this";}echo "<br>  <span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>";
}else if($r == "1"){
   echo "<div align='right'> "; if($liness == 1){echo "1 rating";}else{echo $liness." ratings";}echo "<br>  <span style='color: orange;' class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "2"){
   echo "<div align='right'>"; if($liness == 1){echo "1 rating";}else{echo $liness." ratings";}echo "<br>  <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "3"){
   echo "<div align='right'>"; if($liness == 1){echo "1 rating";}else{echo $liness." ratings";}echo "<br>  <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "4"){
   echo "<div align='right'>"; if($liness == 1){echo "1 rating";}else{echo $liness." ratings";}echo "<br>   <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  style='color: orange;' class='fa fa-star checked'></span>
<span  class='fa fa-star'></span> </div></h2>"; 
}else if($r == "5"){
   echo "<div align='right'>"; if($liness == 1){echo "1 rating";}else{echo $liness." ratings";}echo "<br>   <span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star checked'></span>
<span  style='color: orange;' class='fa fa-star checked'></span>
<span style='color: orange;' class='fa fa-star'></span> </div></h2>"; 
}
    echo "<br><br>";
  
             ?>
    
  <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  align: right;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  top: 50px;
  text-align: center;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
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

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.fa fa-star checked{
color: orange;
}
</style>


<button class="open-button" id="opens">Rate</button>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.resp-sharing-button__link,
.resp-sharing-button__icon {
  display: inline-block
}

.resp-sharing-button__link {
  text-decoration: none;
  color: #fff;
  margin: 0.5em
}

.resp-sharing-button {
  border-radius: 5px;
  transition: 25ms ease-out;
  padding: 0.5em 0.75em;
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif
}

.resp-sharing-button__icon svg {
  width: 1em;
  height: 1em;
  margin-right: 0.4em;
  vertical-align: top
}

.resp-sharing-button--small svg {
  margin: 0;
  vertical-align: middle
}

/* Non solid icons get a stroke */
.resp-sharing-button__icon {
  stroke: #fff;
  fill: none
}

/* Solid icons get a fill */
.resp-sharing-button__icon--solid,
.resp-sharing-button__icon--solidcircle {
  fill: #fff;
  stroke: none
}

.resp-sharing-button--twitter {
  background-color: #55acee
}

.resp-sharing-button--twitter:hover {
  background-color: #2795e9
}

.resp-sharing-button--pinterest {
  background-color: #bd081c
}

.resp-sharing-button--pinterest:hover {
  background-color: #8c0615
}

.resp-sharing-button--facebook {
  background-color: #3b5998
}

.resp-sharing-button--facebook:hover {
  background-color: #2d4373
}

.resp-sharing-button--tumblr {
  background-color: #35465C
}

.resp-sharing-button--tumblr:hover {
  background-color: #222d3c
}

.resp-sharing-button--reddit {
  background-color: #5f99cf
}

.resp-sharing-button--reddit:hover {
  background-color: #3a80c1
}

.resp-sharing-button--google {
  background-color: #dd4b39
}

.resp-sharing-button--google:hover {
  background-color: #c23321
}

.resp-sharing-button--linkedin {
  background-color: #0077b5
}

.resp-sharing-button--linkedin:hover {
  background-color: #046293
}

.resp-sharing-button--email {
  background-color: #777
}

.resp-sharing-button--email:hover {
  background-color: #5e5e5e
}

.resp-sharing-button--xing {
  background-color: #1a7576
}

.resp-sharing-button--xing:hover {
  background-color: #114c4c
}

.resp-sharing-button--whatsapp {
  background-color: #25D366
}

.resp-sharing-button--whatsapp:hover {
  background-color: #1da851
}

.resp-sharing-button--hackernews {
background-color: #FF6600
}
.resp-sharing-button--hackernews:hover, .resp-sharing-button--hackernews:focus {   background-color: #FB6200 }

.resp-sharing-button--vk {
  background-color: #507299
}

.resp-sharing-button--vk:hover {
  background-color: #43648c
}

.resp-sharing-button--facebook {
  background-color: #3b5998;
  border-color: #3b5998;
}

.resp-sharing-button--facebook:hover,
.resp-sharing-button--facebook:active {
  background-color: #2d4373;
  border-color: #2d4373;
}

.resp-sharing-button--twitter {
  background-color: #55acee;
  border-color: #55acee;
}

.resp-sharing-button--twitter:hover,
.resp-sharing-button--twitter:active {
  background-color: #2795e9;
  border-color: #2795e9;
}

.resp-sharing-button--google {
  background-color: #dd4b39;
  border-color: #dd4b39;
}

.resp-sharing-button--google:hover,
.resp-sharing-button--google:active {
  background-color: #c23321;
  border-color: #c23321;
}

.resp-sharing-button--email {
  background-color: #777777;
  border-color: #777777;
}

.resp-sharing-button--email:hover,
.resp-sharing-button--email:active {
  background-color: #5e5e5e;
  border-color: #5e5e5e;
}

.resp-sharing-button--pinterest {
  background-color: #bd081c;
  border-color: #bd081c;
}

.resp-sharing-button--pinterest:hover,
.resp-sharing-button--pinterest:active {
  background-color: #8c0615;
  border-color: #8c0615;
}

.resp-sharing-button--whatsapp {
  background-color: #25D366;
  border-color: #25D366;
}

.resp-sharing-button--whatsapp:hover,
.resp-sharing-button--whatsapp:active {
  background-color: #1DA851;
  border-color: #1DA851;
}

body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}

/* Modal Content */
.modal-content {
  position: fixed;
  bottom: 0;
  background-color: #fefefe;
  width: 100%;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
a {
  color: black;
  text-decoration: none; /* no underline */
}

.modals {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIns; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIns;
  animation-duration: 0.6s
}

/* Modal Content */
.modals-content {
  position: fixed;
  bottom: 30%;
  background-color: #fefefe;
  width: 100%;
  -webkit-animation-name: slideIns;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIns;
  animation-duration: 0.6s
}

/* The Close Button */
.closes {
  color: green;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.closes:hover,
.closes:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modals-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modals-body {padding: 2px 16px;}

.modals-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* Add Animation */
@-webkit-keyframes slideIns {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 30%; opacity: 1}
}

@keyframes slideIns {
  from {bottom: -300px; opacity: 0}
  to {bottom: 30%; opacity: 1}
}

@-webkit-keyframes fadeIns {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIns {
  from {opacity: 0} 
  to {opacity: 1}
}
</style>



<!-- Trigger/Open The Modal -->
<div align= "right">
<i id="myBtn" class="fas fa-share-alt fa-3x"></i>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Share</h2>
    </div>
    <div class="modal-body">
<!-- Sharingbutton Facebook -->
<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=https://www.thebroadcaststation.com/feed.php?id=<?php echo $_REQUEST['id'];?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
  <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
    </div>Share on Facebook</div>
</a>

<!-- Sharingbutton Twitter -->
<a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Check out the podcast at https://www.thebroadcaststation.com/feed.php?id=<?php echo $_REQUEST['id'];?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
  <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
    </div>Share on Twitter</div>
</a>

<!-- Sharingbutton Google+ -->
<a class="resp-sharing-button__link" href="https://plus.google.com/share?url=https://www.thebroadcaststation.com/feed.php?id=<?php echo $_REQUEST['id'];?>" target="_blank" rel="noopener" aria-label="Share on Google+">
  <div class="resp-sharing-button resp-sharing-button--google resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.37 12.93c-.73-.52-1.4-1.27-1.4-1.5 0-.43.03-.63.98-1.37 1.23-.97 1.9-2.23 1.9-3.57 0-1.22-.36-2.3-1-3.05h.5c.1 0 .2-.04.28-.1l1.36-.98c.16-.12.23-.34.17-.54-.07-.2-.25-.33-.46-.33H7.6c-.66 0-1.34.12-2 .35-2.23.76-3.78 2.66-3.78 4.6 0 2.76 2.13 4.85 5 4.9-.07.23-.1.45-.1.66 0 .43.1.83.33 1.22h-.08c-2.72 0-5.17 1.34-6.1 3.32-.25.52-.37 1.04-.37 1.56 0 .5.13.98.38 1.44.6 1.04 1.84 1.86 3.55 2.28.87.23 1.82.34 2.8.34.88 0 1.7-.1 2.5-.34 2.4-.7 3.97-2.48 3.97-4.54 0-1.97-.63-3.15-2.33-4.35zm-7.7 4.5c0-1.42 1.8-2.68 3.9-2.68h.05c.45 0 .9.07 1.3.2l.42.28c.96.66 1.6 1.1 1.77 1.8.05.16.07.33.07.5 0 1.8-1.33 2.7-3.96 2.7-1.98 0-3.54-1.23-3.54-2.8zM5.54 3.9c.33-.38.75-.58 1.23-.58h.05c1.35.05 2.64 1.55 2.88 3.35.14 1.02-.08 1.97-.6 2.55-.32.37-.74.56-1.23.56h-.03c-1.32-.04-2.63-1.6-2.87-3.4-.13-1 .08-1.92.58-2.5zM23.5 9.5h-3v-3h-2v3h-3v2h3v3h2v-3h3"/></svg>
    </div>Share on Google+</div>
</a>

<!-- Sharingbutton E-Mail -->
<a class="resp-sharing-button__link" href="mailto:?subject=Check out the podcast at The Broadcast Station!&body=Be one of the first to watch this podcast! https://www.thebroadcaststation.com/feed.php?id=<?php echo $_REQUEST['id'];?>" target="_self" rel="noopener" aria-label="Share by E-Mail">
  <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z"/></svg></div>Share by E-Mail</div>
</a>

<!-- Sharingbutton Pinterest -->
<a class="resp-sharing-button__link" href="https://pinterest.com/pin/create/button/?url=https://www.thebroadcaststation.com/feed.php?id=<?php echo $_REQUEST['id'];?>" target="_blank" rel="noopener" aria-label="Share on Pinterest">
  <div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z"/></svg>
    </div>Share on Pinterest</div>
</a>

<!-- Sharingbutton WhatsApp -->
<a class="resp-sharing-button__link" href="whatsapp://send?text=Check out the podcast at https://www.thebroadcaststation.com/feed.php?id=<?php echo $_REQUEST['id'];?>" target="_blank" rel="noopener" aria-label="Share on WhatsApp">
  <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg>
    </div>Share on WhatsApp</div>
</a>

    </div>
    <div class="modal-footer">
      <h3> </h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <div id="myModals" class="modals">
  <!-- Modal content -->
  <div class="modals-content">

    <div class="modals-body"><span class="closes">&times;</span>
<center>

 <form  class="form-container">



    <span onclick="myFunctio()" id="a"class="fa fa-star checked"></span>
<span id="b" onclick="myFunction()"class="fa fa-star checked"></span>
<span id="c" onclick="myFunctiona()" class="fa fa-star checked"></span>
<span id="d" onclick="myFunctionb()" class="fa fa-star checked"></span>
<span id="e" onclick="myFunctionc()" class="fa fa-star"></span>
<br>   

  </form>
</center>






    </div>

  </div>

</div>

<form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
   var modals = document.getElementById("myModals");

// Get the button that opens the modal
var btns = document.getElementById("opens");

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("closes")[0];

// When the user clicks the button, open the modal 
btns.onclick = function() {
  modals.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spans.onclick = function() {
  modals.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modals.style.display = "none";
  }
} 
    
    var rate = 0;
function myFunctio() {
   var element = document.getElementById("a").style.color = "orange";
   var element = document.getElementById("b").style.color = "black";
    var element = document.getElementById("c").style.color = "black";
    var element = document.getElementById("d").style.color = "black";
    var element = document.getElementById("e").style.color = "black";
    rate = 1;
    rt();
    
}
function myFunction() {
   var element = document.getElementById("a").style.color = "orange";
   var element = document.getElementById("b").style.color = "orange";
    var element = document.getElementById("c").style.color = "black";
    var element = document.getElementById("d").style.color = "black";
    var element = document.getElementById("e").style.color = "black";
    rate = 2;
    rt();
}

function myFunctiona() {
   var element = document.getElementById("a").style.color = "orange";
   var element = document.getElementById("b").style.color = "orange";
    var element = document.getElementById("c").style.color = "orange";
    var element = document.getElementById("d").style.color = "black";
    var element = document.getElementById("e").style.color = "black";
    rate = 3;
    rt();
}




function myFunctionb() {
var element = document.getElementById("a").style.color = "orange";
   var element = document.getElementById("b").style.color = "orange";
    var element = document.getElementById("c").style.color = "orange";
    var element = document.getElementById("d").style.color = "orange";
    var element = document.getElementById("e").style.color = "black";
    rate = 4;
    rt();
}

   var url = "<?php echo $_REQUEST['id'];?>";
function myFunctionc() {
var element = document.getElementById("a").style.color = "orange";
   var element = document.getElementById("b").style.color = "orange";
    var element = document.getElementById("c").style.color = "orange";
    var element = document.getElementById("d").style.color = "orange";
    var element = document.getElementById("e").style.color = "orange";
    rate = 5;
    rt();
}
var username = localStorage.getItem("username");
function rt () {
    modals.style.display = "none";
      if(username !== null && username != ""){

          var xhr = new XMLHttpRequest();
          var data = new FormData();
          data.append("value1",username);
          data.append("value2",rate);
          data.append("value3",url);
          
          xhr.open("post","/rate.php",true);
         
          xhr.send(data);
  
     
  }else{
      location.replace("/v1/newEmptyPHP.php");
  }
};
</script>


        <hr style="border:3px solid #f1f1f1">
         <input type="text" placeholder="Comment..."style="background-color: #f2f2f2; width: 80%;"   id="title"/>
         <button id='but'type="button" class="btn cancel" onclick="post()" >Post</button>
         <div id="comsect">
             
             <?php 
            
             $file =  substr($_REQUEST['id'], 0, strlen($_REQUEST['id'])-8).".txt"; 
             
             
$reallines = file($file);
  $lines = count(file($file));  
    
  for ($x = 0; $x < $lines-2; $x++) {
     echo "<hr>"; 
    $move = trim($reallines[$x+2]);
    $user = explode(":", $move,2);
     echo "<a href='profilepics.php?value3=".$user[0]."'><img alt=' 'style='border-radius: 50%;width:4%;' src='TBS_profilepics/".$user[0]."profilepic.png'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:4%;' src='TBS_profilepics/".$user[0]."profilepic.jpg'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:4%;' src='TBS_profilepics/".$user[0]."profilepic.jpeg'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:4%;' src='TBS_profilepics/".$user[0]."profilepic.bmp'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:4%;' src='TBS_profilepics/".$user[0]."profilepic.webp'/>".$move."</p></a> ";
                
    
   
    
   
}
  

             ?>
         </div>
         
        
        
    </div>   
<script>
  $("img").on("error", function() {
  $(this).hide();
});
    
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      post();
    }
  });
});
function logout(){
         localStorage.setItem("username","");
         location.replace("/v1/newEmptyPHP.php");
     }
   var username = localStorage.getItem("username");
   
     if(username == ""){
       document.getElementById("pf").style.display = "none";
   }
   function profile(){
   if(username !== null && username != ""){
       location.replace("/profilepics.php?value3="+username);
   }else{
       location.replace("/v1/newEmptyPHP.php");
   }
   }
   document.getElementById("but").style.display = "none";
   var url = "<?php echo $_REQUEST['id'];?>";
   document.getElementById("title").onchange = function (){
       if(document.getElementById("title").value == ""){
           document.getElementById("but").style.display = "none";
       }else{
           document.getElementById("but").style.display = "block";
       }
   }
  function post(){
      
     if(username !== null && username != ""){

          var xhr = new XMLHttpRequest();
          var data = new FormData();
          data.append("value1",username);
          data.append("value2",document.getElementById("title").value);
          data.append("value3",url);
          xhr.open("post","/feed.php",true);
         
          xhr.send(data);
          xhr.onreadystatechange = function(){
             
  
         location.reload();
          
          
      }
  }else{
      location.replace("/v1/newEmptyPHP.php");
  }
    
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

