<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Livre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM Livres WHERE ID=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $titre = $row['Titre'];
            $isbn = $row['ISBN'];
            $annee = $row['AnneePublication'];
            $prix = $row['Prix'];
            $stock = $row['StockDisponible'];
            $auteurID = $row['AuteurID'];
        } else {
            echo "Aucun livre trouvé avec cet ID.";
            exit();
        }
    }
    ?>
    
    <h2>Modifier un livre</h2>
    <form action="action.php" method="post">
        <input type="hidden" name="update_id" value="<?php echo $id; ?>">
        <label for="update_title">Titre:</label>
        <input type="text" name="update_title" id="update_title" value="<?php echo $titre; ?>">
        <label for="update_isbn">ISBN:</label>
        <input type="text" name="update_isbn" id="update_isbn" value="<?php echo $isbn; ?>">
        <label for="update_year">Année de publication:</label>
        <input type="number" name="update_year" id="update_year" value="<?php echo $annee; ?>">
        <label for="update_price">Prix:</label>
        <input type="number" name="update_price" id="update_price" value="<?php echo $prix; ?>">
        <label for="update_stock">Stock disponible:</label>
        <input type="number" name="update_stock" id="update_stock" value="<?php echo $stock; ?>">
        <label for="update_author">Auteur:</label>
        <select name="update_author" id="update_author">
            <?php
            $sql = "SELECT * FROM Auteurs";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['ID'] == $auteurID) {
                    echo '<option value="'.$row['ID'].'" selected>'.$row['Nom'].' '.$row['Prenom'].'</option>';
                } else {
                    echo '<option value="'.$row['ID'].'">'.$row['Nom'].' '.$row['Prenom'].'</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
