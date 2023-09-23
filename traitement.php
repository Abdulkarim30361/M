<?php
    //la connexion a la base de donnes
    $servername="localhost";
    $username="root";
    $password="@1teRnet!";
    $dbname=""; //nom de la base de donnees

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "la connexion reussi";
    }
    catch(PDOException $e)
    {
        echo "la connexion a echoué" . $e->getMessage();

    }

    if(isset($_POST['valider']))
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];

        $sql = (""); //entre les cotes on insert la requette sql d'insertion de donnes
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':age', $age);

        //pour changer plusieurs champs a la fois clique sur ctrl + d
    }
?>