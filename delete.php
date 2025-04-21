<?php
 session_start();
 session_destroy();
?>

<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=cars;port=3307;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur de connexion: ' . $e->getMessage());
}
    // Récupérer le dernier client (avec le plus grand id)
    $stmt = $conn->query('SELECT * FROM carstable ORDER BY id DESC LIMIT 1');
    $lastClient = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($lastClient) {
        $id = $lastClient['id'];

        // Supprimer ce client
        $delete = $conn->prepare('DELETE FROM carstable WHERE id = ?');
        $delete->execute([$id]);

       header('location:cars.html');
    } else {
        echo "❌ Aucun client trouvé dans la table `carstable`.";
    }


?>
