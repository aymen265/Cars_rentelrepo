<?php
session_start();
include 'connect.php'; // tu dois avoir un fichier de connexion PDO ici

// Récupérer les données du formulaire
$_SESSION["full-name"] = $_POST["full-name"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["tel"] = $_POST["tel"];
$_SESSION["pickup-date"] = $_POST["pickup-date"];
$_SESSION["return-date"] = $_POST["return-date"];
$_SESSION["location"] = $_POST["location"];
$_SESSION["payement"] = $_POST["payement"];
$_SESSION["notes"] = $_POST["notes"];

// Insertion dans la base
$stmt = $pdo->prepare("INSERT INTO cafrstable (full_name, email, phone, pickup_date, return_date, location, payment, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([
  $_SESSION["full-name"],
  $_SESSION["email"],
  $_SESSION["tel"],
  $_SESSION["pickup-date"],
  $_SESSION["return-date"],
  $_SESSION["location"],
  $_SESSION["payement"],
  $_SESSION["notes"]
]);

// Redirection
header("Location: afficher.php"); // ou n'importe quelle page
exit;
