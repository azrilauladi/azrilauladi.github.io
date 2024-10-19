<?php 
   session_start();
   include("php/config.php");

   if(!isset($_SESSION['valid'])){
       header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="rumah.php"> <img src="im/jeep.png" alt=""></a></p>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                   $username = $_POST['username'];
                   $email = $_POST['email'];
                   $age = $_POST['age'];
                   $id = $_SESSION['id'];

                   // Upload File Handling
                   $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
                   $max_size = 2 * 1024 * 1024; // 2MB
                   $upload_dir = 'pp/';

                   $foto_name = $_FILES['foto']['name'];
                   $foto_tmp = $_FILES['foto']['tmp_name'];
                   $foto_size = $_FILES['foto']['size'];
                   $foto_ext = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));

                   $delete_photo = isset($_POST['delete_photo']);  // Cek apakah user ingin menghapus foto

                   // Ambil nama foto lama dari database
                   $query = mysqli_query($con, "SELECT foto FROM users WHERE Id=$id");
                   $result = mysqli_fetch_assoc($query);
                   $old_foto = $result['foto'];

                   if ($delete_photo && !empty($old_foto)) {
                       // Hapus foto lama dari server
                       if (file_exists($upload_dir . $old_foto)) {
                           unlink($upload_dir . $old_foto);
                       }
                       $new_name = '';  // Kosongkan nama file untuk disimpan di database
                   } elseif (!empty($foto_name)) {
                       // Proses upload jika ada file baru
                       if (in_array($foto_ext, $allowed_ext) && $foto_size <= $max_size) {
                           $new_name = date('Y-m-d H.i.s') . '.' . $foto_ext;
                           $upload_path = $upload_dir . $new_name;

                           // Hapus foto lama jika ada
                           if (!empty($old_foto) && file_exists($upload_dir . $old_foto)) {
                               unlink($upload_dir . $old_foto);
                           }

                           if (!move_uploaded_file($foto_tmp, $upload_path)) {
                               die("Failed to upload new photo.");
                           }
                       } else {
                           die("Invalid file type or size too large.");
                       }
                   } else {
                       // Jika tidak ada upload atau penghapusan, gunakan foto lama
                       $new_name = $old_foto;
                   }

                   // Update data di database
                   $edit_query = mysqli_query($con, 
                       "UPDATE users SET Username='$username', Email='$email', Age='$age', foto='$new_name' WHERE Id=$id"
                   ) or die("Error occurred");

                   echo "<div class='message'><p>Profile Updated!</p></div><br>";
                   echo "<a href='rumah.php'><button class='btn'>Go Home</button>";
               } else {
                   $id = $_SESSION['id'];
                   $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
                   $result = mysqli_fetch_assoc($query);

                   $res_Uname = $result['Username'];
                   $res_Email = $result['Email'];
                   $res_Age = $result['Age'];
                   $res_Foto = $result['foto'];
            ?>
            <header>Change Profile</header>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" required>
                </div>

                <div class="field input">
                    <label for="foto">Upload Photo</label>
                    <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png, .gif">
                </div>

                <?php if (!empty($res_Foto)): ?>
                    <div class="field">
                        <p>Current Photo:</p>
                        <img src="pp/<?php echo $res_Foto; ?>" alt="Profile Photo" width="100">
                    </div>
                <?php endif; ?>

                <div class="field-checkbox-wrapper">
                    <input type="checkbox" name="delete_photo" id="delete_photo">
                    <label for="delete_photo">Hapus Foto</label>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>