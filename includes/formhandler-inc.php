<?php

if ($_SERVER["REQUEST_METHOD" ] == "POST") {
  $organizationName = $_POST["organizationName"];
  $participantsNumber = $_POST["participantsNumber"];
  $moto = $_POST["moto"];
  $contacts = $_POST["contacts"];

  try {
    require_once "dbh-inc.php";

    $query = "INSERT INTO organizations (organizationName, participantsNumber, moto, contacts) VALUES (?, ?, ?, ?);";
    $stmt = $pdo->prepare($query);

    $stmt->execute([$organizationName, $participantsNumber, $moto, $contacts]);

    $pdo = null;
    $stmt = null;

    header("Location: ../index.html");

    die();
  } catch (PDOException $e) {
    die("Query failed: ". $e->getMessage());
  }
}
else {
  header("Location: ../index.html");
}