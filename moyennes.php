<?php
if(file_exists('db.php'))
{
    include 'db.php';

    // Recuperation des donnees du formulaire
    $nomEtudiant = $_POST['nomEtudiant'];
    $matiere = $_POST['nomMatiere'];
    $note = $_POST['note'];

    // Recuperation de idMatiere lie à la matiere choisie dans le formulaire
    $idMatiere = 'SELECT n.idMatiere from note n, matiere m where m.id = n.idMatiere and m.nomMatiere="'.$matiere.'";';
    $resultidMatiere = $pdo->query($idMatiere)->fetchAll();
    $resultidMatiere = $resultidMatiere[0]['idMatiere'];

    // Recuperation de idEtudiant lie à l'etudiant choisi dans le formulaire
    $idEtudiant = 'SELECT n.idEtudiant from note n, etudiant e where e.id = n.idEtudiant and e.nomEtudiant="'.$nomEtudiant.'";';
    $resultidEtudiant = $pdo->query($idEtudiant)->fetchAll();
    $resultidEtudiant = $resultidEtudiant[0]['idEtudiant'];

    // Insertion de la note dans la base de données.
    $insertNote = 'Insert into Note(idEtudiant, idMatiere, note) values (:idEtudiant, :idMatiere, :note)';
    $sqlPrepare = $pdo->prepare($insertNote);
    $sqlPrepare -> execute(array(':idEtudiant' => $resultidEtudiant, ':idMatiere'=> $resultidMatiere, ':note'=> $note ));

} else {
    die('Fichier introuvable.');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class='container pt-3'>
        <h1>Page des moyennes</h1>
    </div>
    <div class='container pt-3'>
        <h2>Moyennes par matière par étudiant.</h2>
    </div>
    <?php
    // Affichage des etudiants avec leur moyenne par matiere

    $sql = 'select e.nomEtudiant, m.nomMatiere, round(avg(n.note),2) as "Moyenne matiere", m.coefMatiere as "Coefficient" from note n, etudiant e, matiere m where e.id = n.idEtudiant and m.id = n.idMatiere GROUP BY e.nomEtudiant, m.nomMatiere ';
    $result = $pdo->query($sql)->fetchAll();
    //var_dump($result);
    ?>
    <div class='container pt-3'>
        <table class='table'>
            <thead>
                <th scope='col'>Prénom</th>
                <th scope="col">Matière</th>
                <th scope="col">Moyenne</th>
                <th scope="col">Coefficient</th>
            </thead>
            <tbody>
                <?php
                    foreach($result as $row)
                        {
                            echo '<tr>';
                            echo '<th scope="row">'.$row['nomEtudiant'].'</th>';
                            echo '<td>'.$row['nomMatiere'].'</td>';
                            echo '<td>'.$row['Moyenne matiere'].'</td>';
                            echo '<td>'.$row['Coefficient'].'</td>';
                            echo '</tr>';
                        }
                ?>
            </tbody>
        </table>
    </div>
    <div class='container pt-3'>
        <h2>Affichage des moyennes générales par étudiant.</h2>
    </div>
    <div class='container pt-3'>
        <?php

        // Récupération des moyennnes générales.
        $sqlMoyennesGen = 'select e.nomEtudiant, Round((SUM(n.note*m.coefMatiere)/ SUM(m.coefMatiere)),2) as "Moyenne generale" from etudiant e, matiere m, note n where e.id = n.idEtudiant and m.id = n.idMatiere GROUP by e.nomEtudiant;';
        $resultMoyennesGen = $pdo->query($sqlMoyennesGen)->fetchAll();

        ?>
        <table class='table'>
            <thead>
                <th scope="col">Prénom</th>
                <th scope="col">Moyenne générale</th>
            </thead>
            <tbody>
                <?php
                    foreach($resultMoyennesGen as $row)
                    {
                        echo '<tr>';
                        echo '<th scope="row">'.$row['nomEtudiant'].'</th>';
                        echo '<td>'.$row['Moyenne generale'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>