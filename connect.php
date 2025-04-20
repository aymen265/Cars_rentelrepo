<?php
session_start();
if (isset($_POST['full-name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['pickup-date']) && isset($_POST['return-date']) && isset($_POST['location'])&& isset($_POST['notes'])&& isset($_POST['payement'])) {
    if (!empty($_POST['full-name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['pickup-date']) && !empty($_POST['return-date']) && !empty($_POST['location']) && !empty($_POST['notes'])&& !empty($_POST['payement'])) {
$_SESSION["full-name"] = $_POST["full-name"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["tel"] = $_POST["tel"];
$_SESSION["pickup-date"] = $_POST["pickup-date"];
$_SESSION["return-date"] = $_POST["return-date"];
$_SESSION["location"] = $_POST["location"];
$_SESSION["notes"] = $_POST["notes"];
$_SESSION["payement"] = $_POST["payement"];

header("location:form.php");
exit();
}else {
    echo 'Attention, Tous Les Champs Sont Obligatoires !!';
}}

?>

<?php
session_start();
include "connect.php";

if (isset($_POST['submit'])) {
    $id = $_SESSION['id'] ?? null;

    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['tel'];
    $pickupDate = $_POST['pickup-date'];
    $returnDate = $_POST['return-date'];
    $location = $_POST['location'];
    $payment = $_POST['payement'];
    $notes = $_POST['notes'];

    if ($id) {
        // Supprimer l'ancienne ligne via ID
        $deleteSQL = "DELETE FROM carstable WHERE id = ?";
        $stmtDelete = $conn->prepare($deleteSQL);
        $stmtDelete->bind_param("i", $id);
        $stmtDelete->execute();
    }

    // Insérer la nouvelle ligne
    $insertSQL = "INSERT INTO carstable (full_name, email, phone, pickup_date, return_date, location, payment_method, notes)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($insertSQL);
    $stmtInsert->bind_param("ssssssss", $fullName, $email, $phone, $pickupDate, $returnDate, $location, $payment, $notes);

    if ($stmtInsert->execute()) {
        // Clear ID
        unset($_SESSION['id']);
        header("Location: afficher.php");
        exit();
    } else {
        echo "Erreur d'insertion : " . $stmtInsert->error;
    }
}
?>
