<?php
 //header("Location: index.php");
  include("db.php");
  $q = "select *from hack order by score desc, time";
  $res = mysqli_query($db,$q);
?>

<html>
  <head>
    <head>
	    <title>Leaderboard</title>
	    <link rel="stylesheet" type="text/css" href="lstyle.css">
    </head>
  </head>
  <body>
    <div class="header">
<div class="left-part nav-ele">
    Hacking
</div>
    <div class="right-part nav-ele">
       <a href="dashboard.php">Dashboard</a>
    <a href="rules.php">Rules</a>
    <a href="leaderboard.php">Leaderboard</a>
    <a href="logout.php">Logout</a>
   
    </div>
  </div>
  <div class="leaderboard" align="center">
    <div class="table">
      <table class="table-fill">
        <thead>
          <tr>
            <th class = "text-heading">#</th>
            <th class="text-heading">Username</th>
            <th class="text-heading">Score</th>
            <th class="text-heading">Time</th>
          </tr>
        </thead>
        <tbody class="table-hover">
        <?php
          $i=1;
          while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            if($row['score']){
              echo "<td class='text-left'>".$i."</td>";
              echo "<td class='text-left'>".$row['user']."</td>";
              echo "<td class='text-left'>".$row['score']."</td>";
              echo "<td class='text-left'>".$row['time']."</td>";
            }else{
              echo "<td class='text-left'>".$i."</td>";
              echo "<td class='text-left'>".$row['user']."</td>";
              echo "<td class='text-left'>".$row['score']."</td>";
              echo "<td class='text-left'> --- </td>";
            }
            echo "</tr>";
            $i++;
          }
        ?>
        </tbody>
      </table>
    </div>
  </div>
  </body>
</html>