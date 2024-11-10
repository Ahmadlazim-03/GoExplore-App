<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoExplore</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #224B79;
        }

        .header {
            font-family: 'Playfair Display', serif;
            position: relative;
            color: white;
            text-align: left;
            padding: 20px;
            overflow: hidden;
            border-bottom: 2px solid white;
            height: 800px;
        }

        .header video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .header .logo {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
            border-bottom: 2px solid white;
            padding-bottom: 10px;
        }

        .header .logo img {
            height: 100px;
        }

        .header nav {
            display: flex;
            gap: 70px;
            margin-left: 50%;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            position: relative;
            padding-bottom: 5px;
            border-bottom: 2px solid transparent;
        }

        .header nav a:hover {
            border-bottom: 2px solid white;
        }

        .header .title {
            margin-top: 150px;
            position: relative;
            z-index: 1;
            text-align: left;
            margin-left: 30px;
        }

        .header .title h1 {
            font-family: 'Playfair Display', serif;
            font-size: 100px;
            margin: 0;
            display: inline-block;
            border-bottom: 2px solid white;
            padding-bottom: 10px;
        }

        .header .title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            margin-left: 10px;
        }

        .header .buttons {
            margin-top: 20px;
            margin-left: 50px;
            position: relative;
            z-index: 1;
            text-align: left;
        }

        .header .buttons button {
            background-color: #224B79;
            border-radius: 30px;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 22px;
            margin-right: 10px;
            cursor: pointer;
        }

        .header .buttons button:last-child {
            background-color: white;
            color: #224B79;
            border: 2px solid #224B79;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 20px;
            height: 500px;
        }

        .content .explore-text {
            max-width: 50%;
            margin-right: 20px;
        }

        .content .explore-text p {
            margin-left: 150px;
            color: #224B79;
            font-size: 20px;
            margin-bottom: 20px;
            text-align: left;
        }

        .content .explore-text button {
            margin-left: 150px;
            background-color: #224B79;
            color: white;
            border: 2px solid #224B79;
            border-radius: 30px;
            padding: 15px 30px;
            font-size: 22px;
            cursor: pointer;
        }

        .content .explore-image {
            margin-right: 100px;
            max-width: 45%;
            margin-left: 20px;
            text-align: right;
        }

        .content .explore-image img {
            width: 100%;
            border-radius: 10px;
        }

        .why-goexplore {
            background-color: #1a3b5d;
            color: white;
            padding: 50px 20px;
            text-align: left;
        }

        .why-goexplore h2 {
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
        }

        .why-goexplore .features {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .why-goexplore .feature {
            flex: 1;
            text-align: center;
            padding: 20px;
        }

        .why-goexplore .feature i {
            font-size: 36px;
            margin-bottom: 10px;
            color: #FFC107;
        }

        .why-goexplore .feature h3 {
            font-size: 20px;
            margin: 10px 0;
        }

        .why-goexplore .feature p {
            font-size: 16px;
        }

        /* Move the image to the right */
        .why-goexplore .image {
            text-align: right;
            margin-left: 50px; /* Adds a bit of space from the left */
        }

        .why-goexplore .image img {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
        }

        .why-goexplore .explore-text {
            text-align: center;
            margin-top: 30px;
        }

        .why-goexplore .explore-text h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .why-goexplore .explore-text p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }

        .why-goexplore .explore-text button {
            background-color: #224B79;
            color: white;
            border: 2px solid #224B79;
            border-radius: 30px;
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 15px;
        }
        .test {
            display:flex;
        }
    </style>
</head>
<body>
    <div class="header">
        <video autoplay loop muted playsinline>
            <source src="{{ asset('video/vd1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        <div class="logo">
            <img alt="GoExplore Logo" height="300" src="{{ asset('img/logo.png') }}" width="350"/>
            <nav>
                <a href="#">Home</a>
                <a href="#">Destination</a>
                <a href="#">Contact Us</a>
            </nav>
        </div>
        <div class="title">
            <h2>Kota Surabaya</h2>
            <h1>City of Heroes <br> In Indonesia</h1>
        </div>
        <div class="buttons">
            <button>Log in</button>
            <button>Explore</button>
        </div>
    </div>
    <div class="content">
        <div class="explore-text">
            <p>"Ayo, Mulai Petualangan Semumu di Kota Surabaya! <br> Temukan destinasi ikonik, wisata sejarah, kuliner khas, dan <br> pengalaman yang tak terlupakan"</p>
            <button>Explore</button>
        </div>
        <div class="explore-image">
            <img alt="Surabaya Image" src="{{ asset('img/logo2.png') }}"/>
        </div>
    </div>

    <div class="why-goexplore">
        <h2>Kenapa Harus GoExplore ?</h2>

        <div class="test">
            <div>
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-user-check"></i>
                        <h3>Rekomendasi Terpersonalisasi</h3>
                        <p>GoExplore menyediakan rekomendasi destinasi berdasarkan minat Anda.</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-clock"></i>
                        <h3>Kepastian Jadwal yang Terjamin</h3>
                        <p>Pengaturan waktu yang fleksibel untuk jadwal kunjungan Anda, hanya dari aplikasi GoExplore.</p>
                    </div>
                </div>
        
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-camera"></i>
                        <h3>Mengabadikan Momen</h3>
                        <p>Kesempatan bagi pengguna untuk mengabadikan momen-momen indah selama perjalanan.</p>
                    </div>
                    <div class="feature">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Perencanaan Perjalanan yang Mudah</h3>
                        <p>Merencanakan perjalanan Anda tidak pernah semudah ini dengan GoExplore.</p>
                    </div>
                </div>
            </div>
                

            <div>
                <div class="image">
                    <img alt="GoExplore Features" src="{{ asset('img/logo3.png') }}"/>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
