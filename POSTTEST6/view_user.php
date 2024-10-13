<?php
session_start(); // Start session

// Include the database connection from config.php
include 'php/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- Link ke CSS -->
    <link rel="stylesheet" href="style/view.css">
</head>
<body>
<?php
// Ensure user is logged in
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Fetch user data from the database
    $stmt = $con->prepare("SELECT Username, Email, Age, foto, Id FROM users WHERE Id = ?");
    $stmt->bind_param("i", $id); // "i" for integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Display user profile data
    if ($row = $result->fetch_assoc()) {
        echo '<div class="profile-container">';
        echo "<h2>User Profile</h2>";

        // Tampilkan foto jika ada, jika tidak tampilkan placeholder
        if (!empty($row['foto'])) {
            echo '<img src="pp/' . htmlspecialchars($row['foto']) . '" alt="Profile Photo" class="profile-photo">';
        } else {
            echo '<img src="pp/placeholder.png" alt="Default Photo" class="profile-photo">';
        }

        echo "<p><strong>Username:</strong> " . htmlspecialchars($row['Username']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($row['Email']) . "</p>";
        echo "<p><strong>Age:</strong> " . htmlspecialchars($row['Age']) . "</p>";
        echo "<p><strong>ID:</strong> " . htmlspecialchars($row['Id']) . "</p>";
        echo '</div>';
    } else {
        echo "<p>No user found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Please log in to view your profile.</p>";
}

mysqli_close($con); // Close connection
?>
</body>
</html>
