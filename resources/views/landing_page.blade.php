<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Agri - Sistem Prediksi Kecocokan Komoditas</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        /* Styling header kecil dengan info kontak dan ikon media sosial */
        .top-header {
            background-color: #f8f9fa;
            padding: 10px 0;
            font-size: 14px;
            color: #6c757d;
        }

        .top-header .social-icons a {
            color: #6c757d;
            margin-right: 10px;
        }

        .top-header .contact-info {
            font-size: 16px;
            color: #495057;
            margin-left: 15px;
            display: inline-block;
        }

        /* Navbar */
        .navbar {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            width: 180px;
        }

        .navbar-nav .nav-item .nav-link {
            padding: 15px 20px;
            color: #6c757d;
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link.active {
            background-color: #f8f9fa;
            border-radius: 20px;
            color: #000;
        }

        /* Hero section */
        .hero-section {
    background-image: url('img/img_landing_page.png');
    background-size: cover;
    background-position: center;
    height: 100vh;
    position: relative;
    padding: 0 15px;
}

@media (min-width: 768px) {
    .hero-section {
        padding: 0 30px;
    }
}

@media (min-width: 1200px) {
    .hero-section {
        padding: 0 50px;
    }
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.hero-content {
    position: relative;
    z-index: 1;
    color: white;
    text-align: left;
    top: 50%;
    transform: translateY(-50%);
    max-width: 1200px;
    margin: 0 auto;
}

.hero-content h1 {
    font-size: 48px;
    font-weight: 700;
    line-height: 1.3;
}

.hero-content p {
    font-size: 16px;
    margin-top: 15px;
    max-width: 600px;
}

.hero-content p:first-of-type {
    font-size: 14px;
    font-weight: bold;
}

.btn-cta {
    background-color: #28a745;
    border: none;
    color: white;
    padding: 12px 25px;
    margin-top: 25px;
    font-size: 18px;
    border-radius: 30px;
}

.btn-cta:hover {
    background-color: #218838;
}
    </style>
</head>
<body>

    <!-- Top Header -->
    <div class="top-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="social-icons">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="contact-info">
                <i class="fas fa-phone-alt"></i> Kontak: +78 (000) - 9630
                <i class="fas fa-envelope ml-4"></i> Email: smartagri.com
                <i class="fas fa-map-marker-alt ml-4"></i> Lokasi: Jakarta, Indonesia
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo_smart_agri_no_bg.png" alt="Smart Agri Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peta') }}">Peta Rekomendasi Tanaman Pangan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   <!-- Hero Section -->
<section class="hero-section">


    <div class="hero-content">
        <p align = "left" >SELAMAT DATANG DI SMART AGRI</p>
        <h1 align = "left" >Sistem Prediksi Kecocokan <br>Komoditas Tanaman <span style="color: #ffc107;">Pangan</span> </h1>
        <h1 align = "left" >Berdasarkan Musim</h1>
        <p align = "left" >Sistem Prediksi Kecocokan Komoditas Tanaman Pangan membantu petani memilih tanaman yang optimal berdasarkan kondisi musim dan lokasi geografis untuk meningkatkan hasil dan efisiensi pertanian.</p>
        <a href="{{ route('dashboard') }}" class="btn-cta" >Jelajahi Lebih Lanjut</a>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-light py-4 text-center">
        <p>© 2024 Smart Agri. All Rights Reserved. Jakarta, Indonesia.</p>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
