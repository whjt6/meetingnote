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
    <title>Your Meetings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Your Meetings</h1>
    <ul>
        <?php
        $user_id = $_SESSION['user_id'];
        $stmt = $pdo->prepare("SELECT * FROM meetings WHERE user_id = ?");
        $stmt->execute([$user_id]);
        
        while ($meeting = $stmt->fetch()) {
            echo "<li>
                    <strong>{$meeting['title']}</strong> - {$meeting['description']} 
                    <br>Meeting Date: {$meeting['meeting_date']}
                    <a href='delete_meeting.php?id={$meeting['id']}'>Delete</a>
                </li>";
        }
        ?>
    </ul>
    <p><a href="create_meeting.php">Create New Meeting</a></p>
</body>
</html>
