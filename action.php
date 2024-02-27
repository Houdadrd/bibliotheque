<?php
include 'db_connection.php';
include 'validate.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = test_input($_POST['title']);
    $isbn = test_input($_POST['isbn']);
    $year = test_input($_POST['year']);
    $price = test_input($_POST['price']);
    $stock = test_input($_POST['stock']);
    $author = test_input($_POST['author']);

    $sql = "INSERT INTO Livres (Titre, ISBN, AnneePublication, Prix, StockDisponible, AuteurID) VALUES ('$title', '$isbn', $year, $price, $stock, $author)";
    if (mysqli_query($conn, $sql)) {
        header("Location:index.php");
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_title'])) {
    $id = test_input($_POST['update_id']);
    $title = test_input($_POST['update_title']);
    $isbn = test_input($_POST['update_isbn']);
    $year = test_input($_POST['update_year']);
    $price = test_input($_POST['update_price']);
    $stock = test_input($_POST['update_stock']);
    $author = test_input($_POST['update_author']);

    $sql = "UPDATE Livres SET Titre='$title', ISBN='$isbn', AnneePublication=$year, Prix=$price, StockDisponible=$stock, AuteurID=$author WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
