<?php
/**
  * Checking whether a file exists and $ isset assigns answer.
  */
  if (file_exists('backend/bikes.db')) {
    $isset = TRUE;
  } else $isset = FALSE;

  /**
  * Open the database file and when it is missing, it creates it.
  */
  class MyDB extends SQLite3 {
      function __construct() {
         $this->open('backend/bikes.db');
      }
   }
   $db = new MyDB();

  /**
  * Checks if the table exists in the database, where it is missing, it creates it.
  *
  * Adds a new record to the database.
  */
  if (!$isset) {
    $sql_create = "CREATE TABLE bikes(ID INTEGER PRIMARY KEY AUTOINCREMENT, NAME TEXT NOT NULL, path_file TEXT NOT NULL)";

    /* Kross */
    $sql_kross1 = "INSERT INTO bikes(NAME, path_file) VALUES ('kross','img/kross/1.png')";
    $sql_kross2 = "INSERT INTO bikes(NAME, path_file) VALUES ('kross','img/kross/2.png')";
    $sql_kross3 = "INSERT INTO bikes(NAME, path_file) VALUES ('kross','img/kross/3.png')";
    $sql_kross4 = "INSERT INTO bikes(NAME, path_file) VALUES ('kross','img/kross/4.png')";
    $sql_kross5 = "INSERT INTO bikes(NAME, path_file) VALUES ('kross','img/kross/5.jpg')";
    $sql_kross6 = "INSERT INTO bikes(NAME, path_file) VALUES ('kross','img/kross/6.png')";
    /* Author */
    $sql_author1 = "INSERT INTO bikes(NAME, path_file) VALUES ('author','img/author/1.jpg')";
    $sql_author2 = "INSERT INTO bikes(NAME, path_file) VALUES ('author','img/author/2.jpg')";
    $sql_author3 = "INSERT INTO bikes(NAME, path_file) VALUES ('author','img/author/3.png')";
    $sql_author4 = "INSERT INTO bikes(NAME, path_file) VALUES ('author','img/author/4.png')";
    $sql_author5 = "INSERT INTO bikes(NAME, path_file) VALUES ('author','img/author/5.jpg')";
    $sql_author6 = "INSERT INTO bikes(NAME, path_file) VALUES ('author','img/author/6.jpg')";
    /* Merida */
    $sql_merida1 = "INSERT INTO bikes(NAME, path_file) VALUES ('merida','img/merida/1.jpg')";
    $sql_merida2 = "INSERT INTO bikes(NAME, path_file) VALUES ('merida','img/merida/2.jpg')";
    $sql_merida3 = "INSERT INTO bikes(NAME, path_file) VALUES ('merida','img/merida/3.jpg')";
    $sql_merida4 = "INSERT INTO bikes(NAME, path_file) VALUES ('merida','img/merida/4.jpg')";
    $sql_merida5 = "INSERT INTO bikes(NAME, path_file) VALUES ('merida','img/merida/5.jpg')";
    $sql_merida6 = "INSERT INTO bikes(NAME, path_file) VALUES ('merida','img/merida/6.jpg')";
    /* Accent */
    $sql_accent1 = "INSERT INTO bikes(NAME, path_file) VALUES ('accent','img/accent/1.png')";
    $sql_accent2 = "INSERT INTO bikes(NAME, path_file) VALUES ('accent','img/accent/2.jpg')";
    $sql_accent3 = "INSERT INTO bikes(NAME, path_file) VALUES ('accent','img/accent/3.jpg')";
    $sql_accent4 = "INSERT INTO bikes(NAME, path_file) VALUES ('accent','img/accent/4.jpg')";
    $sql_accent5 = "INSERT INTO bikes(NAME, path_file) VALUES ('accent','img/accent/5.jpg')";
    /* Agang */
    $sql_agang1 = "INSERT INTO bikes(NAME, path_file) VALUES ('agang','img/agang/1.jpg')";
    $sql_agang2 = "INSERT INTO bikes(NAME, path_file) VALUES ('agang','img/agang/2.png')";
    $sql_agang4 = "INSERT INTO bikes(NAME, path_file) VALUES ('agang','img/agang/3.jpg')";

    $db->exec($sql_create);
    $db->query($sql_kross1);
    $db->query($sql_kross2);
    $db->query($sql_kross3);
    $db->query($sql_kross4);
    $db->query($sql_kross5);
    $db->query($sql_kross6);
    $db->query($sql_author1);
    $db->query($sql_author2);
    $db->query($sql_author3);
    $db->query($sql_author4);
    $db->query($sql_author5);
    $db->query($sql_author6);
    $db->query($sql_merida1);
    $db->query($sql_merida2);
    $db->query($sql_merida3);
    $db->query($sql_merida4);
    $db->query($sql_merida5);
    $db->query($sql_merida6);
    $db->query($sql_accent1);
    $db->query($sql_accent2);
    $db->query($sql_accent3);
    $db->query($sql_accent4);
    $db->query($sql_accent5);
    $db->query($sql_accent6);
    $db->query($sql_agang1);
    $db->query($sql_agang2);
    $db->query($sql_agang3);
    $db->query($sql_agang4);
    $db->query($sql_agang5);
    $db->query($sql_agang6);
  }

  $db->close();