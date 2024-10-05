<?php
session_start(); // Start session

// Include the database connection from config.php
include 'php/config.php';

// Ensure user is logged in
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Fetch user data from the database
    $stmt = $con->prepare("SELECT Username, Email, Age, Id FROM users WHERE Id = ?");
    $stmt->bind_param("i", $id); // "i" for integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Display user profile data
    if ($row = $result->fetch_assoc()) {
        echo "<h2>User Profile</h2>";
        echo "<p>Username: " . htmlspecialchars($row['Username']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($row['Email']) . "</p>";
        echo "<p>Age: " . htmlspecialchars($row['Age']) . "</p>";
        echo "<p>ID: " . htmlspecialchars($row['Id']) . "</p>";
    } else {
        echo "No user found.";
    }

    $stmt->close();
} else {
    echo "Please log in to view your profile.";
}

mysqli_close($con); // Close connection
?>
