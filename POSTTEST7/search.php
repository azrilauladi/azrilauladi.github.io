<?php 
session_start();
include("php/config.php");

// Cek apakah pengguna sudah login
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

// Tangani pencarian jika ada input
$search_query = "";
if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($con, $_GET['search']);
    $query = "SELECT * FROM cars 
              WHERE brand LIKE '%$search_query%' 
                 OR model LIKE '%$search_query%'";
} else {
    $query = "SELECT * FROM cars";
}

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_search.css">
    <title>Search Cars</title>

   
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
            <a href="rumah.php" class="btn">Back to Home</a>
        </header>

        <div class="box form-box">
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Search by brand or model..." 
                       value="<?php echo htmlspecialchars($search_query); ?>" required>
                <button type="submit" class="btn">Search</button>
            </form>
        </div>

        <div class="box results-box">
            <h2>Car Listings</h2>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                                <td><?php echo $row['year']; ?></td>
                                <td>$<?php echo number_format($row['price'], 2); ?></td>
                                <td><?php echo ucfirst($row['status']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No cars found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
