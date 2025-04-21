<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=cars;port=3307;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur de connexion: ' . $e->getMessage());
    }

    // Sanitize and fetch data from POST, store in session
    $_SESSION['full-name']     = $nomC     = htmlspecialchars(trim($_POST['full-name']));
    $_SESSION['email']         = $email    = htmlspecialchars(trim($_POST['email']));
    $_SESSION['pickup-date']   = $pdate    = htmlspecialchars($_POST['pickup-date']);
    $_SESSION['return-date']   = $rdate    = htmlspecialchars($_POST['return-date']);
    $_SESSION['location']      = $location = htmlspecialchars(trim($_POST['location']));
    $_SESSION['notes']         = $notes    = htmlspecialchars(trim($_POST['notes']));
    $_SESSION['tel']           = $tel      = htmlspecialchars(trim($_POST['tel']));
    $_SESSION['payement']      = $payement = htmlspecialchars(trim($_POST['payement']));

    // Check if email exists
    $checkStmt = $conn->prepare("SELECT id FROM carstable WHERE email_adress = ?");
    $checkStmt->execute([$email]);
    $existingClient = $checkStmt->fetch();

    if ($existingClient) {
        // Update existing row
        $updateStmt = $conn->prepare('
            UPDATE carstable 
            SET full_name = ?, `pick-up_date` = ?, return_date = ?, `pick-up_location` = ?, notes = ?, tel = ?, payement_method = ?
            WHERE email_adress = ?
        ');
        $updateStmt->execute([$nomC, $pdate, $rdate, $location, $notes, $tel, $payement, $email]);
    } else {
        // Insert new row
        $insertStmt = $conn->prepare('
            INSERT INTO carstable (`full_name`, `email_adress`, `pick-up_date`, `return_date`, `pick-up_location`, `notes`, `tel`, `payement_method`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');
        $insertStmt->execute([$nomC, $email, $pdate, $rdate, $location, $notes, $tel, $payement]);
    }

    header("Location: afficher.php");
    exit;
}
?>
