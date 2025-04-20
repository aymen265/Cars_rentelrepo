<?php
  session_start();

?>
<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=cars;port=3307;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
