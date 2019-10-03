<?php
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


 $con = mysqli_connect("localhost","fadikide_fadikid", "FGKpro2003", "fadikide_TBS") or die("Error connecting to database: ".mysql_error());
 /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
  
    
    
    
$query = $_REQUEST['search']; 



 $fileList = glob('TBS_uploads/*');
    $x = $_REQUEST['ld'];
 $y = 0;
//Loop through the array that glob returned.
foreach($fileList as $filename){
   //Simply print them out onto the screen.
    if($x > $y && $x < $y + 5){
        
    if(substr($filename,-3) != "txt"){
         $myfile = fopen(substr($filename, 0,-8).".txt", "r+") or die("Unable to open file!");
          $s = fgets($myfile);
        if(strpos(mb_strtolower($s), mb_strtolower($query)) !== false){
           
       
   echo "<hr>","<a href='/feed.php?id=".$filename."'<h3>".$s."<div align='center'>".substr(substr($filename, 0,-8),20)."</div>";
  if(substr($filename,-3) != "mp4"){
   echo "<br><audio src='".$filename."' id='".$filename."'controls/><video src='".$filename."' width='250px'/>";
  }else{
       echo "<br><video src='".$filename."' id='".$filename."'width='250px'/>";
  
  }
  
   
  
   echo "</h3></a>";
   
    }
    
    }
    }
    $y++;
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
         $xz = 0;
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
            
             if($x > $xz && $x < $xz + 5){
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<a href='profilepics.php?value3=".strtolower($results['username'])."'><hr><p><h3>".$results['username']."</h3>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".strtolower($results['username'])."profilepic.png'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".strtolower($results['username'])."profilepic.jpg'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".strtolower($results['username'])."profilepic.jpeg'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".strtolower($results['username'])."profilepic.bmp'/> ";
                echo "<img alt=' 'style='border-radius: 50%;width:8%;' src='TBS_profilepics/".strtolower($results['username'])."profilepic.webp'/></p></a> ";
                
            }
             }
             $xz++;
        }