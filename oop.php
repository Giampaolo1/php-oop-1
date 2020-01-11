<!-- TODO TODAY:
REPO: php-oop-1
GOAL: completare il file todoToday.php in modo da stampare tutte le configurazioni presenti del DB, attraverso la programmazione OOP -->

<?php

class Configurazione {
  // variabili, no libera scelta ma colonne della tabella del db, rappresentare una realtà coesistente
  // variabili di istanza:
  public $id;
  public $title;
  public $description;

  function__construct($id, $title, $description){
    // valorizzazioni variabili tramite parametri
    $ this -> id = $id;
    $ this -> title = $title;
    $ this -> description = $description;

  }
  function __toString(){
    // rappresentazione testuale dell oggetto
    return"(" . $this -> id . ","
              . $this -> title . ","
              . $this -> description . ")";
  }
}

// connessione al db

header ('Content-Type: application/json');

$server = "localhost";
$username = "root";
$password = "root";
$dbname = "HotelDB";

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn -> connect_errno) {
  echo json_encode(-1);
  return;
}
// se va tt bene faccio il
// download di tutte le config
$sql = "
  SELECT *
  FROM configurazioni
";
$res = $conn -> query($sql);

// --------
$confs = [];
while ($conf = $res -> fetch_assoc()) {
  $confs[] = new Configurazione ($conf["id"],
  $conf["title"],
  $conf["description"],
  )
}

foreach ($confs as $conf) {
  echo $conf . "\n";
}
