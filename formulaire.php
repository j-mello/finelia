<?php
if(file_exists('db.php'))
{
    include 'db.php';
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
        <h1>Page de saisie des notes</h1>
    </div>
    <div class='container pt-3'> 
        <form action="moyennes.php" method="POST">
        <div class='form-group'>
        <label for="nomEtudiant">Prénom de l'étudiant :</label>
            <select name="nomEtudiant" id="nomEtudiant">
                <?php 
                $sql = 'select nomEtudiant from etudiant';
                foreach($pdo->query($sql) as $row) 
                {
                ?>
                    <option value="<?= $row['nomEtudiant'] ?>"><?php print $row['nomEtudiant']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class='form-group'>
        <label for="nomMatiere">Nom de la matière :</label>
            <select name="nomMatiere" id="nomMatiere">
                <?php 
                $sql = 'select nomMatiere from matiere';
                foreach($pdo->query($sql) as $row) 
                {
                ?>
                    <option value="<?= $row['nomMatiere'] ?>"><?php print $row['nomMatiere']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class='form-group'>
                    <label for="note">Note obtenue :</label>
            <input type="number" name="note" id="note" min='0' max='20'><br>
        </div>
        
        <button class='btn btn-primary' type='submit'>Enregistrer la note</button>
        
        </form>
    <br>
    <p>Le coefficient de la matière front-end est 1 et celui du back-end est de 2.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>