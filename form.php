<?php
  session_start();

?>
<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=cars;port=3306;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    echo 'Erreur de connexion: ' . $e->getMessage();
}


        $nomC = htmlspecialchars($_SESSION['full-name']);
        $email = htmlspecialchars($_SESSION['email']);
        $pdate = htmlspecialchars($_SESSION['pickup-date']);
        $rdate = htmlspecialchars($_SESSION['return-date']);
        $location = htmlspecialchars($_SESSION['location']);
        $notes = htmlspecialchars($_SESSION['notes']);
        $tel = htmlspecialchars($_SESSION['tel']);
        $payement = htmlspecialchars($_SESSION['payement']);
        

        $insertionClient = $conn->prepare('INSERT INTO carstable(`full_name`,`email_adress`,`pick-up_date`,`return_date`,`pick-up_location`,`notes`,`tel`,`payement_method`) VALUES(?,?,?,?,?,?,?,?)');
        $insertionClient->execute(array($nomC,$email,$pdate,$rdate,$location,$notes,$tel,$payement));

        header("location:afficher.php")
?>


<?php
$conn = new PDO("mysql:host=localhost;dbname=cars", "root", "");

if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $stmt = $conn->prepare("SELECT * FROM carstable WHERE id = ?");
    $stmt->execute([$id]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email_address'];
    $tel = $_POST['tel'];
    $pickup = $_POST['pick_up_date'];
    $return = $_POST['return_date'];
    $location = $_POST['pick_up_location'];
    $payment = $_POST['payment_method'];
    $notes = $_POST['notes'];

    $update = $conn->prepare("UPDATE carstable SET full_name=?, email_address=?, tel=?, pick_up_date=?, return_date=?, pick_up_location=?, payment_method=?, notes=? WHERE id=?");
    $update->execute([$full_name, $email, $tel, $pickup, $return, $location, $payment, $notes, $id]);

    echo "<script>alert('Client updated successfully!'); window.location.href='afficher.php';</script>";
}

?>

