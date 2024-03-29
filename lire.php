﻿<?php

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    require_once "config.php";

    $nom = $prenom = $email = "";
    $query = "SELECT * FROM Etudiants WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        if (mysqli_stmt_execute($stmt)) {
            $resultats = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($resultats) == 1) {
                $ligne = mysqli_fetch_array($resultats, MYSQLI_ASSOC);
                $nom = $ligne["nom"];
                $prenom = $ligne["prenom"];
                $email = $ligne["email"];
            }
        } else {
            header("location:error.php");
            exit();
        }
    } else {
        header("location:error.php");
        exit();
    }
} else {
    header("location:error.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture donnée</title>
    <style>
        .wrapper {
            width: 520px;
            margin: 0 auto;
            border: 1px solid blue;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div>
            <h2>Informations étudiant</h2>
        </div>

        <div>
            <form>
                <div>
                    <label>Nom</label>
                    <p><b><?php echo $nom; ?></b></p>

                </div>
                <div>
                    <label>Prénom</label>
                    <p><b><?php echo $prenom; ?></b></p>
                </div>
                <div>
                    <label>Email</label>
                    <p><b><?php echo $email; ?></b></p>
                </div>
                <div>
                    <p><a href="index.php" class="btn btn-primary">Dashboard</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>