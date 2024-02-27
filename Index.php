<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Librairie en ligne</title>
</head>
<body>
    <h1>Librairie en ligne</h1>
    <form action="Index.php"  method="post">
        <label for="author">Sélectionnez un auteur:</label>
        <select name="author" id="author">
            <option value="all">Tous les auteurs</option>
            <?php
            include 'db_connection.php';
            $sql = "SELECT * FROM Auteurs";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['ID'].'">'.$row['Nom'].' '.$row['Prenom'].'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Filtrer">
    </form>
    
    <h2>Liste de livres</h2>
    <table border="1px solid black">
        <tr>
            <th>Titre</th>
            <th>ISBN</th>
            <th>Année de publication</th>
            <th>Prix</th>
            <th>Stock disponible</th>
            <th>Action</th>
        </tr>
        <?php
        include 'db_connection.php';
        $sql = "SELECT * FROM Livres";
        if (isset($_POST['author']) && $_POST['author'] != 'all') {
            $sql .= " WHERE AuteurID=".$_POST['author'];
        }
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>'.$row['Titre'].'</td>';
            echo '<td>'.$row['ISBN'].'</td>';
            echo '<td>'.$row['AnneePublication'].'</td>';
            echo '<td>'.$row['Prix'].'</td>';
            echo '<td>'.$row['StockDisponible'].'</td>';
            echo '<td><a href="edit.php?id='.$row['ID'].'">Modifier</a></td>';  // Ajout du lien de modification
            echo '</tr>';
        }
    ?>
    </table>
    
    <h2>Ajouter un nouveau livre</h2>
    <form action="action.php" method="post">
        <label for="title">Titre:</label>
        <input type="text" name="title" id="title">
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn">
        <label for="year">Année de publication:</label>
        <input type="number" name="year" id="year">
        <label for="price">Prix:</label>
        <input type="text" name="price" id="price">
        <label for="stock">Stock disponible:</label>
        <input type="number" name="stock" id="stock">
        <label for="author">Auteur:</label>
        <select name="author" id="author">
            <?php
            include 'db_connection.php';
            $sql = "SELECT * FROM Auteurs";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['ID'].'">'.$row['Nom'].' '.$row['Prenom'].'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
