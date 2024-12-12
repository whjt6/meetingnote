<?php include 'db.php'; session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Meeting</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Create Meeting</h1>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Meeting Title" required>
        <textarea name="description" rows="5" placeholder="Meeting Description"></textarea>
        <input type="datetime-local" name="meeting_date" required>
        <button type="submit">Create Meeting</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $meeting_date = $_POST['meeting_date'];
        $user_id = $_SESSION['user_id'];

        $stmt = $pdo->prepare("INSERT INTO meetings (title, description, meeting_date) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $meeting_date]);
        echo "Meeting created successfully.";
    }
    ?>
</body>
</html>
