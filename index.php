<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <style>
        .wrapper {
            width: 540px;
            margin: 0 auto;
            border: 1px solid blue;
            padding: 20px;
        }

        .entete {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin: 10px;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div>

            <div class="entete">
                <h2>Détails Etudiants</h2>
                <a href="ajouter.php">AJOUTER ETUDIANT</a>
            </div>

            <div>
                <?php require_once "config.php";
                $requete = "SELECT * FROM Etudiants";
                if ($resultats = mysqli_query($link, $requete)) {
                    if (mysqli_num_rows($resultats) > 0) {
                        echo "<table>";

                        echo "<thead>";
                        echo "<tr>";
                        echo "<th> ID </th>";
                        echo "<th> NOM </th>";
                        echo "<th> PRENOM </th>";
                        echo "<th> EMAIL </th>";
                        echo "<th> ACTION</th>";
                        echo "<tr>";
                        echo "</thead>";

                        while ($ligne = mysqli_fetch_array($resultats)) {
                            echo "<tr>";
                            echo "<td>" . $ligne['id'] . "</td>";
                            echo "<td>" . $ligne['nom'] . "</td>";
                            echo "<td>" . $ligne['prenom'] . "</td>";
                            echo "<td>" . $ligne['email'] . "</td>";
                            echo "<td>";
                            echo '<a style="margin-right: 10px" href="lire.php?id=' . $ligne['id'] . '" title="voir">Voir</a>';
                            echo '<a style="margin-right: 10px" href="modifier.php?id=' . $ligne['id'] . '" title="modifier">Modifier</a>';
                            echo '<a style="margin-right: 10px" href="supprimer.php?id=' . $ligne['id'] . '" title="supprimer">Supprimer</a>';

                            echo "</td>";
                            echo "<tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Aucun donnée n'a été trouvé. <br/>";
                    }
                    mysqli_free_result($resultats);
                } else {
                    echo "ERROR : La connexion n'a pas été établie. <br/>";
                }

                ?>
            </div>
        </div>

    </div>



</body>

</html>