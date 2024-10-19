<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php 
        // Aktifkan tampilan error
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include("php/config.php");

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            // Hash password sebelum disimpan
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Memverifikasi apakah email sudah digunakan
            $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

            if (!$verify_query) {
                die("Query Error: " . mysqli_error($con));
            }

            if (mysqli_num_rows($verify_query) != 0) {
                echo "<div class='message'>
                          <p>This email is used, try another one please!</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            } else {
                $insert_query = "INSERT INTO users (Username, Email, Age, Password) 
                                 VALUES ('$username', '$email', '$age', '$hashed_password')";

                if (mysqli_query($con, $insert_query)) {
                    echo "<div class='message'>
                              <p>Registration successfully!</p>
                          </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button>";
                } else {
                    echo "<div class='message'>
                              <p>Error occurred during registration: " . mysqli_error($con) . "</p>
                          </div>";
                }
            }
        } else {
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>

        <?php } // Tutup blok else ?>
        </div>
    </div>
</body>
</html>
