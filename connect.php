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