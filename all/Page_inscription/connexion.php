<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=page_inscription", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

    //recuperation des valeurs saisie par le user
    $email = $_POST['mail'];
    $pasword = $_POST['mot_de_passe'];
    if (isset($email, $pasword)) {
        if (empty($email && $pasword)) {
            echo 'vous devez remplir tous les champs';
        } else {
            $sql= 
            $users_connected = $conn->query("SELECT email, pass FROM inscription WHERE email=$email AND pass=$pasword")->fetch();

           echo $users_connected;
        }
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
