<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
              include("php/config.php");

              if (isset($_POST['submit'])) {
                  $email = mysqli_real_escape_string($con, $_POST['email']);
                  $password = $_POST['password']; // Tidak perlu escape karena ini akan diverifikasi, bukan dipakai langsung di query

                  // Mengambil data pengguna berdasarkan email
                  $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("Select Error");
                  $row = mysqli_fetch_assoc($result);

                  if ($row && password_verify($password, $row['Password'])) {
                      // Password benar, buat session
                      $_SESSION['valid'] = $row['Email'];
                      $_SESSION['username'] = $row['Username'];
                      $_SESSION['age'] = $row['Age'];
                      $_SESSION['id'] = $row['Id'];

                      header("Location: rumah.php");
                      exit();
                  } else {
                      // Email atau password salah
                      echo "<div class='message'>
                                <p>Wrong Email or Password</p>
                            </div> <br>";
                      echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                  }
              } else {
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
