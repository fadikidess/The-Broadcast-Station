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
  .topnav .span {font-size: 20px;}
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
  float: right
}


.search-container button:hover {
  background: #ccc;
}

.title{
margin-left: 70px;
top: 0;
}
/*a {
  color: black;
  text-decoration: none;  no underline 
}*/
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
  <a href="/postImage.php">Upload</a>
  <a id="pf"onclick="profile()">Profile</a>
  <a href="/v1/newEmptyPHP.php">Login</a>
  <a onclick='logout()' >Logout</a>
</div>

<div width="30%" class="topnav" id="myTopnav">

<span class="span"style="cursor:pointer;" onclick="openNav()">&#9776; <i class="fas fa-broadcast-tower"></i> The Broadcast Station</span>

<div class="search-container">
    
    <form  action="/search.php">
        <input  type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
    <div id="feed">
<?php
 $con = mysqli_connect("localhost","fadikide_fadikid", "FGKpro2003", "fadikide_TBS") or die("Error connecting to database: ".mysql_error());
 /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
  
    
    
    
$query = $_REQUEST['search']; 
$o = true;

$t = false;
 $fileList = glob('TBS_uploads/*');
  usort($fileList, function ($a, $b) {
   return filemtime($b) - filemtime($a);
});
 $y = 0;
//Loop through the array that glob returned.
foreach($fileList as $filename){
   //Simply print them out onto the screen.
    if($y < 5){
        
    if(substr($filename,-3) != "txt" && $query != ""){
         $myfile = fopen(substr($filename, 0,-8).".txt", "r+") or die("Unable to open file!");
          $s = fgets($myfile);
        if(strpos(mb_strtolower($s), mb_strtolower($query)) !== false){
           $o = false;
       echo "<style>a {
  color: black;
  text-decoration: none; /* no underline */
} </style>";
   echo "<hr>","<a href='/feed.php?id=".$filename."'<h3>".$s."<div align='center'>".substr(substr($filename, 0,-8),20)."</div>";
  if(substr($filename,-3) != "mp4"){
   echo "<br><audio src='".$filename."' id='".$filename."'controls/><video src='".$filename."' width='250px'/>";
  }else{
       echo "<br><video src='".$filename."' id='".$filename."'width='250px'/>";
  
  }
  
   
  
   echo "</h3></a>";
   $y++;
    }else{
        
    }
    
    }
    }
}






$query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($con,$query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($con,"SELECT * FROM users
            WHERE (`username` LIKE '%".$query."%') OR (`username` LIKE '%".$query."%')");
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         $x = 0;
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
            
             if($x < 5){
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             $x++;
                echo "<a href='profilepics.php?value3=".$results['username']."'><hr><p><h3>".$results['username']."</h3>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".$results['username']."profilepic.png'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".$results['username']."profilepic.jpg'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".$results['username']."profilepic.jpeg'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".$results['username']."profilepic.bmp'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".$results['username']."profilepic.webp'/></p></a> ";
                
            }
             }
             
        }
        else{ // if there is no matching rows do following
            $t = true;
           
        } 
        if($o == true && $t == true){
            echo "<div align='center'> <h3> No results found  </h3>  </div>";
        }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
         var load = 0;
    $(window).scroll(function() {
      
    if($(window).scrollTop() >= $(document).height() - $(window).height()-200) {
        
        load += 5;
          $.ajax(
    {
        url: 'searchload.php',
        data: {search: "<?php echo $_REQUEST['search'] ?>",ld: load},
        success: function(data)
        {
            if(document.getElementById("feed").innerHTML != document.getElementById("feed").innerHTML+data){
            document.getElementById("feed").innerHTML = document.getElementById("feed").innerHTML + data;
        }
        }
    })
    }
});


  $("img").on("error", function() {
  $(this).hide();
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
   if(username !== null){
       location.replace("/profilepics.php?value3="+username);
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
