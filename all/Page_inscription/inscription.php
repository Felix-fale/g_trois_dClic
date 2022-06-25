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
    $nom = $_POST['nom'];
    $email = $_POST['mail'];
    $pasword = $_POST['mot_de_passe'];

    if (isset($nom, $email, $pasword)) {
        if (empty($nom && $email && $pasword)) {
            echo 'vous devez remplir tous les champs';
        } else {
            // echo $nom; 
            // echo $email;
            // echo $password;
            $sql = "INSERT INTO inscription (nom, email, pass)
            VALUES ('$nom', '$email', '$pasword')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "vous êtes connecté";
            echo "<a href= 'connexion.html'>Aller à la page de connexion</a> ";
            // ife ($conn) {
            //     header('Location:login.html');
            //     exit();
            // }
        }
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
