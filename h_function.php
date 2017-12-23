<?php

  function check($id,$db,$level){
    $s = "select * from play where id = '$id' and level = '$level' ";
    $q = mysqli_query($db,$s);
    $r = mysqli_fetch_row($q);
    if(check_ban($id,$db)){
      header("Location: ../ban.php");
    }
    if($r[0]>0){
      return 0;
    }else{
      return 1;
    }
  }
  
  function check_ban($id,$db){
    $l = "select ban from bache where id = '$id' " ;
    $q = mysqli_query($db,$l);
    $r = mysqli_fetch_row($q);
    return $r[0];
  }
  
  function solved($id, $level, $score, $db){
    date_default_timezone_set('Asia/Kolkata');
    $time = date(" Y/m/d H:i:s",time());
    
    $up1 = "update hack set score = score + $score where id = '$id' ";
    $up2 = "update hack set time = '$time' where id = '$id' ";
    
    $updro = "insert into play (id,level) VALUES ('$id','$level') ";
    $m = mysqli_query($db,$updro);
    
    $q1 = mysqli_query($db,$up1);
    $q2 = mysqli_query($db,$up2);
    
    $ups = "update level set nos = nos + 1 where id = '$level' ";
    $qus = mysqli_query($db,$ups);
    
  }
  
  function make_log($user, $answer, $level, $time){
    $name = "../logs.txt";
    $file = fopen($name,"a+");
    $str = "User -> ".$user." Answer -> ".$answer." Level -> ".$level." Time -> ".$time."\n";
    fwrite($file,$str);
  }

?>