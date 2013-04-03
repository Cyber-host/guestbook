<?php 

    
   $_COOKIE['counter']++;
  setcookie("counter",$_COOKIE['counter'], time()+1);
  echo("Pos:".$_COOKIE['counter']);
 

    

