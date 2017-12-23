<?php
  session_start();
  
  include("../h_function.php");
  include("../db.php");
  
  if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
  }
  
  $id = $_SESSION['user_id'];
  
  if(!check($id,$db,2)){
    header("Location: ../dashboard.php");
  }
  
  $glevel = "select points from level where id = '2' ";
  $my = mysqli_query($db,$glevel);
  $score = mysqli_fetch_row($my);
  
  $gn = "select user from bache where id = '$id' ";
  $gx = mysqli_query($db,$gn);
  $user = mysqli_fetch_row($gx);
  
  if(isset($_POST['but'])){
    $answer = $_POST['ans'];
    date_default_timezone_set('Asia/Kolkata');
    $time = date(" Y/m/d H:i:s",time());
    make_log($user[0],$answer,2,$time);
    if($answer == "core{4380ea2ba38f11d13420095ed761342f}"){
      solved($id,2,$score[0],$db);
      header("Location: ../dashboard.php");
    }else{
      
    }
  }
  
?>

<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link rel="icon" href="logo-black.png">
    <title>Weak Authentication</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,600,700,800|Raleway:100,200,300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
    <script type="text/javascript" src = "jquery-ui.min.js"></script>
    <script src= "script.js"></script>
    <meta name="description" content="CO&YAcy;E - Computer Obsessed Radical Enthusiasts | The official computer and technology club of DPS Dwarka" />
    <meta name="keywords" content="CO&YAcy;E, core, dps, dwarka, core 10, core x, x, corex, CO&YAcy;E 10, computer, technology, club, delhi public school, core 9, annual, fest, obsession, redifined, are, you,  obsessed, decade of obsession" />
    <meta name="author" content="metatags generator">
    <meta name="robots" content="index, follow">
  </head>
  <body>
    <div class="header">
        <div class="header">
<div class="left-part nav-ele">
    Hacking
</div>
<div class="right-part nav-ele">
    <a href="../dashboard.php">Dashboard</a>
    <a href="../rules.php">Rules</a>
    <a href="../leaderboard.php">Leaderboard</a>
    <a href="../logout.php">Logout</a>
</div>

    <div class="landing">
      <h1>Weak Authentication</h1>
      <p> My friend thinks that just by complicating the authentication process it wouldn't get hacked easily.Can you prove him wrong<a href="pr0site">?</a></p>
      <form action = "index.php" method = "post">
        <input type = "text" name = "ans"><br>
        <button type = "submit" name = "but" class = "buttons">Check</button>
      </form>
    </div>
  </body>
</html>