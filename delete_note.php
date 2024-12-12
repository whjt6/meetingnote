<?php
include 'db.php'; 
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: view_note.php");
    exit();
} else {
    echo "No note ID provided.";
}
?>
