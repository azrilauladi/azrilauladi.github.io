<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Rental Mobil</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="#" class="logo"><img src="img/jeep.png" alt=""></a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#ride">Ride</a></li>
            <li><a href="#Services">Services</a></li>
            <li><a href="bio/portfolio.html" id="about-link" target="_blank">About</a></li>
            <li><a href="#reviews">Reviews</a></li>
            <li><a href="view_user.php">Profile</a></li>
            <li><a href="search.php">Search</a></li>
        </ul>
        <div class="header-btn">
            <a href="register.php" class="sign-up">Sign Up</a>
            <a href="login.php" class="sign-in">Sign In</a>
        </div>
    </header>

    <!-- Home -->

    <section class="home" id="home">
        <div class="text">
            <h1><span>Mau rental</span> <br>mobil?</h1>
            <p>Temukan mobil yang sesuai dengan kebutuhan anda</p>
            <div class="app-stores">
                <img src="img/ios.png" alt="">
                <img src="img/play.png" alt="">
            </div>
        </div>

        <div class="form-container">
            <form action="">
                <div class="input-box">
                    <span>Location</span>
                    <input type="search" name="" id="" placeholder="Cari">
                </div>
                <div class="input-box">
                    <span>Hari Awal Pinjam</span>
                    <input type="date" name="" id="">
                </div>
                <div class="input-box">
                    <span>Hari Pengembalian</span>
                    <input type="date" name="" id="">
                </div>
                <input type="submit" name="" id="" class="btn">
            </form>
        </div>
    </section>

    <!-- Ride -->
    <section class="ride" id="ride">
        <div class="heading">
            <span>Mau Pinjam?</span>
            <h1>Caranya sangat mudah!!</h1>
        </div>
        <div class="ride-container">
            <div class="box">
                <i class='bx bxs-map'></i>
                <h2>Pilih Lokasi</h2>
                <p>Pilih lokasi anda</p>
            </div>

            <div class="box">
                <i class='bx bxs-calendar-check'></i>
                <h2>Pilih Hari Awal</h2>
                <p>Pilih hari awal anda meminjam</p>
            </div>
            
            

            <div class="box">
                <i class='bx bxs-calendar-star'></i>
                <h2>Sewa Mobil</h2>
                <p>Pilih Mobil yang ingin disewa</p>
            </div>
        </div>
    </section>
    
    <!-- Services -->
    <section class="services" id="services">
        <div class="heading">
            <span>Best Rental</span>
            <h1>Cari Tawaran Terbaik <br> Dari Tempat Terbaik</h1>
        </div>
        <div class="services-container">
            <div class="box">
                <div class="box-img">
                    <img src="img/car1.jpg" alt=""><!-- Gambar Mobil -->
                </div>
                <p>2017</p><!-- Tahun Mobil -->
                <h3>2018 Honda Civic</h3><!-- Nama Mobil -->
                <h2>Rp400000 <span>/bulan</span></h2><!-- Harga Sewa -->
                <a href="#" class="btn">Pilih Sekarang</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/car2.jpg" alt="">
                </div>
                <p>2017</p>
                <h3>2018 Honda Civic</h3>
                <h2>Rp400000 <span>/bulan</span></h2>
                <a href="#" class="btn">Pilih Sekarang</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/car3.jpg" alt="">
                </div>
                <p>2017</p>
                <h3>2018 Honda Civic</h3>
                <h2>Rp400000 <span>/bulan</span></h2>
                <a href="#" class="btn">Pilih Sekarang</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/car4.jpg" alt="">
                </div>
                <p>2017</p>
                <h3>2018 Honda Civic</h3>
                <h2>Rp400000 <span>/bulan</span></h2>
                <a href="#" class="btn">Pilih Sekarang</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/car5.jpg" alt="">
                </div>
                <p>2017</p>
                <h3>2018 Honda Civic</h3>
                <h2>Rp400000 <span>/bulan</span></h2>
                <a href="#" class="btn">Pilih Sekarang</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/car6.jpg" alt="">
                </div>
                <p>2017</p>
                <h3>2018 Honda Civic</h3>
                <h2>Rp400000 <span>/bulan</span></h2>
                <a href="#" class="btn">Pilih Sekarang</a>
            </div>
        </div>
    </section>
    <!-- Reviews -->
     <section class="reviews" id="reviews">
        <div class="heading">
            <span>Reviews</span>
            <h1>What Our Customers Say</h1>
        </div>
        <div class="reviews-container">
            <div class="box">
                <div class="rev-img">
                    <img src="img/rev1.jpg" alt="">
                </div>
                <h2>Mamat</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half' ></i>
                </div>
                <p>Sudah nyewa sebulan, masih aman belum ketangkap</p>
            </div>

            <div class="box">
                <div class="rev-img">
                    <img src="img/rev2.jpg" alt="">
                </div>
                <h2>Mamat</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half' ></i>
                </div>
                <p>Gacor kang</p>
            </div>

            <div class="box">
                <div class="rev-img">
                    <img src="img/rev3.jpg" alt="">
                </div>
                <h2>Putri</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half' ></i>
                </div>
                <p>Suka banget sama servicenya, nyaman dan komplit</p>
            </div>
        </div>
     </section>
     <!-- Newsletters -->
     <section class="newsletter">
        <h2>Subscribe to newsletter</h2>
        <div class="box">
            <input type="text" placeholder="Enter Your Email...">
            <a href="#" class="btn">Subscribe</a>
        </div>
     </section>

     <!--ScrollReveal-->
     <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Link Js -->
    <script src="main.js"></script>
</body>
</html>