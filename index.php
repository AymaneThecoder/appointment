<?php 
session_start();

	include("connection.php");
	include("fonctions.php");

	$user_data = check_login($con);

?>
 <!DOCTYPE html>
<html>
  <head>
    <title> Reservation </title>
    <script src="index.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <header>
    <a href="#" class="logo">La commune de SEBAA AIYOUNE</a>
    
  </header>
  
  <section class="main">
  <button class="button-63"  role="button" style=" 
  align-items: center;
  background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
  display: flex;
  font-family: Phantomsans, sans-serif;
  font-size: 20px;
  justify-content: center;
  line-height: 1em;
  max-width: 100%;
  min-width: 140px;
  padding: 19px 24px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
">
<a href="logout.php" >  Quitter</a >
  <!-- <a href="adminlogin.php" > Admin </a > -->
  </button>
  <br>
	<!-- <a href="logout.php" class="logout"> Cliquez Pour Quittez </a > -->
  <button class="button-63"  role="button" style=" 
  align-items: center;
  background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
  display: flex;
  font-family: Phantomsans, sans-serif;
  font-size: 20px;
  justify-content: center;
  line-height: 1em;
  max-width: 100%;
  min-width: 140px;
  padding: 19px 24px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
">
<a href="adminlogin.php" > Admin </a >
  <!-- <a href="adminlogin.php" > Admin </a > -->
  </button>
  
  
  <br>
	Bonjour, <?php echo $user_data['user_name']; ?>
    <?php
   
    require "2-class.php";
    $start = strtotime("+".rmin." day");
    $end = strtotime("+".rmax." day");
    $booked = $_APPO->get(date("Y-m-d", $start), date("Y-m-d", $end));
    ?>

    
    <h2>Reservez içi , S'il vous plaît  :    </h2>
    <table id="select">
    
      <tr>
        <th></th>
        <?php
        foreach (APPO_SLOTS as $slot) 
        { echo "<th>$slot</th>"; }
        ?>
      </tr>

     
      <?php
      for ($unix=$start; $unix<=$end; $unix+=86400) {
        $thisDate = date("Y-m-d", $unix);
        echo "<tr><th>$thisDate</th>";
        foreach (APPO_SLOTS as $slot) {
          if (isset($booked[$thisDate][$slot])) {
            echo "<td class='booked'>Reservez</td>";
          } else {
            echo "<td onclick=\"select(this, '$thisDate', '$slot')\"></td>";
          }
        }
        echo "</tr>";
      }
      ?>
    </table>

   
    <h2>CONFIRMEZ</h2>
    <form id="confirm" method="post" action="4-book.php">
      
      <input type="hidden" name="user" value= "<?php echo $user_data['id']; ?>
    "/>
      <input type="text" id="cdate" name="date" readonly placeholder="Sélectionnez ci-dessus"/>
      <input type="text" id="cslot" name="slot" readonly placeholder="Sélectionnez ci-dessus"/>
      <input type="submit" id="cgo" value="envoyez" disabled/>
    </form>
    </section>
  </body>
</html>
