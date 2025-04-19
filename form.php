<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=cars;port=3306;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    echo 'Erreur de connexion: ' . $e->getMessage();
}
if (isset($_POST['full-name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['pickup-date']) && isset($_POST['return-date']) && isset($_POST['location'])&& isset($_POST['notes'])&& isset($_POST['payement'])) {
    if (!empty($_POST['full-name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['pickup-date']) && !empty($_POST['return-date']) && !empty($_POST['location']) && !empty($_POST['notes'])&& !empty($_POST['payement'])) {

        $nomC = htmlspecialchars($_POST['full-name']);
        $email = htmlspecialchars($_POST['email']);
        $pdate = htmlspecialchars($_POST['pickup-date']);
        $rdate = htmlspecialchars($_POST['return-date']);
        $location = htmlspecialchars($_POST['location']);
        $notes = htmlspecialchars($_POST['notes']);
        $tel = htmlspecialchars($_POST['tel']);
        $payement = htmlspecialchars($_POST['payement']);
        

        $insertionClient = $conn->prepare('INSERT INTO carstable(`full_name`,`email_adress`,`pick-up_date`,`return_date`,`pick-up_location`,`notes`,`tel`,`payement_method`) VALUES(?,?,?,?,?,?,?,?)');
        $insertionClient->execute(array($nomC,$email,$pdate,$rdate,$location,$notes,$tel,$payement));

        echo 'Le Client a été bien ajouté !!';
    } else {
        echo 'Attention, Tous Les Champs Sont Obligatoires !!';
    }
}
?>