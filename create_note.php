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
    <title>Create Note</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Create Note</h1>
    <form action="" method="POST">
        <textarea name="note" rows="5" placeholder="Write your note here..." required></textarea>
        <button type="submit">Create Note</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $note = $_POST['note'];
        $user_id = $_SESSION['user_id'];

        $stmt = $pdo->prepare("INSERT INTO notes (note, user_id) VALUES (?, ?)");
        if ($stmt->execute([$note, $user_id])) {
            echo "Note created successfully.";
        } else {
            echo "Error creating note.";
        }
    }
    ?>
</body>
</html>
