<?php
  session_start();
  
  include("db.php");
  include("h_function.php");
  
  if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
  }
  
  $id = $_SESSION['user_id']; 
  
  if(check_ban($id,$db)){
    header("Location: ban.php");
  }
  
  $sel = "select * from hack where id = '$id' ";
  $qu = mysqli_query($db,$sel);
  $row = mysqli_fetch_assoc($qu);
  
?>


<html lang="en">
  <head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>



      <title>COЯE</title>
          <link rel="icon" href="logo.png">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <meta http-equiv="x-ua-compatible" content="ie=edge">
 <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,600,700,800|Raleway:200,300,400,600|Architects+Daughter|Muli:300,400,700|Ubuntu:400|Poiret+One" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="dstyle.css" rel="stylesheet">
 <script type="text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>

 <script type="text/javascript" src = "jquery-ui.min.js"></script>
         <script src= "script.js"></script>
    </head>
<body>
<div class="header">
<div class="name"><span class="twist">Hacking</span> 
</div>
  <div class="menu-toggle nav-ele">
  <span class="hamburger">
  <span></span>
  <span class="line"></span>
</span>

 </div>
 <div class="nav-ele-container site-nav " align="center">
  <div class="nav-text"><a href="rules.php" class="nav-texts">Rules</a></div>
   <div class="nav-text"><a href="leaderboard.php" class="nav-texts">Leaderboard</a></div>
  <div class="nav-text"> <a href="logout.php" class="nav-texts">Logout</a></div>
  
 
   </ul>
  </div>
 <div class="menu-toggle">
   <div class="aloo-tikki"></div>
 </div>
 </div>
<div class="main">
  <h3>Score  <?php echo $row['score']; ?> </h3>

</div>

  <?php
    $arr = array();
    for($i=0; $i<15; $i++) $arr[$i]=0;
    $s = "select * from play where id = '$id' ";
    $q = mysqli_query($db,$s);
    
    while($cur = mysqli_fetch_assoc($q)){
      $arr[$cur['level']] = 1;
    }
    
    $s2 = "select * from level";
    $q2 = mysqli_query($db,$s2);
    
    $x=0;
    
    while($row = mysqli_fetch_assoc($q2)){
      if($x%2==0){
        echo "<div class='boxes' align='center'>";
      }
      $st = "L".$row['id'];
      if(!$arr[$row['id']]){
        echo "<a href='$st'><div class = 'junior-box'>".$row['name']."<br>"." Points - ".$row['points']."<br> No. of solves - ".$row['nos']." </div></a>";
      }else{
        echo "<div class = 'junior-box'>".$row['name']." <br>Points - ".$row['points']." <br>No. of solves - ".$row['nos']." </div>";
      }
      if($x%2!=0){
        echo "</div>";
      }
      $x++;
    }
    
  ?>

</html>