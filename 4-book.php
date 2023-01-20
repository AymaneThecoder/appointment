<?php
require "2-class.php";
echo $_APPO->save ($_POST["date"], $_POST["slot"], $_POST["user"])
  ? "<h2 style:'font-weight:bold ; color: black  ; padding: 50% 50% ;'> Merci Pour Votre Reservation "
  
  
  
  
  
  
  
  
  
  
  : $_APPO->error; 


