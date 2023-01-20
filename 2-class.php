
<?php
class Reservation {
  // 1-  POUR CONNECTER A LA BASSE DU DONNEES
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  
  
  
  function __construct () {
    try {
      $this->pdo = new PDO("mysql:host=localhost;dbname=login;charset=utf8",'root','');
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
     
      ;} catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // 2-  Pour fermer la connexion avec base du données
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
    
  }

  // 3- executer sql
  function query ($sql, $data=null) {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // 4-   Prenez le rendez-vous ENtRE ;
  function get ($de, $a) {
    $this->query(
      "SELECT * FROM `reservations` WHERE `reservation_date` BETWEEN ? AND ?",
      [$de, $a]
    );
    $res = [];
    while ($r = $this->stmt->fetch()) {
      $res[$r["reservation_date"]][$r["reservation_slot"]] = $r["user_id"];
    }
    return $res;
  }

  // 5 - ENreGISTREZ le Rendez-vous
  function save ($date, $slot, $user) {
    //  CHECK LES dates Selectionner ;
    $min = strtotime("+".rmin." day");
    $max = strtotime("+".rmax." day");
    $unix = strtotime($date);
    if ($unix<$min || $unix<$max) {
      $this->error = "La date doit etre entre  ".date("Y-m-d", $min)." and ".date("Y-m-d", $max);
    }
    

    // (E2) CHECK les Rendez-Vous Precedant
    $this->query(
      "SELECT * FROM `reservations` WHERE `reservation_date`=? AND `reservation_slot`=?",
      [$date, $slot]
    );
    if (is_array($this->stmt->fetch())) {
      $this->error = "$date $slot dejà resérvé";
      return false;
    }

    // Prendre le Rendez-vous 
    $this->query(
      "INSERT INTO `reservations` (`reservation_date`, `reservation_slot`, `user_id`) VALUES (?,?,?)",
      [$date, $slot, $user]
    );
    return true; 
  }
}

// DATES & SLOTS ;
define("APPO_SLOTS", ["matin", "apres-midi"]);
define("rmin", 1); 
define("rmax", 7); 


define("DB_HOST", "localhost");
define("DB_NAME", "login");
define("DB_CHARSET", "utf8");
define("DB_USER", " root");
define("DB_PASSWORD", "");

// Nouveau Rendez-vous
$_APPO = new Reservation();
