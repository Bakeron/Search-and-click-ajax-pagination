<?php
  /**
  * Open the database file and when it is missing, it creates it.
  */
  class MyDB extends SQLite3 {
      function __construct() {
         $this->open('bikes.db');
      }
   }
   $db = new MyDB();

  if (isset($_POST['value'])) {
    $value = $_POST['value'];

    if (($_POST['value'] == 'all'))  $sql = "SELECT * FROM bikes";
    else $sql = "SELECT * FROM bikes WHERE NAME = '$value'";

    $ret = $db->query($sql);
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo $row['path_file'] . ' ';
      echo $row['NAME'] . ' ';
    }
  }

$db->close();