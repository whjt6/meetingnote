<?php
include 'db.php'; 
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Notes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Your Notes</h1>
    <ul>
        <?php
        $user_id = $_SESSION['user_id'];
        $stmt = $pdo->prepare("SELECT * FROM notes WHERE user_id = ?");
        $stmt->execute([$user_id]);
        
        while ($note = $stmt->fetch()) {
            echo "<li>
                    <strong>Note ID: {$note['id']}</strong>
                    <p>{$note['note']}</p>
                    <a href='delete_note.php?id={$note['id']}'>Delete</a>
                </li>";
        }
        ?>
    </ul>
    <p><a href="create_note.php">Create New Note</a></p>
</body>
</html>
