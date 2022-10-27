<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>GIS - UMKM Bontang Barat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <!-- Core CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        header {
            height: 100vh;
            background-image: url('./assets/img/bontang.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header-overlay {
            height: 100vh;
            background-color: rgba(29, 53, 87, .9);
        }

        .hero {
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            color: white;
        }

        .about {
            height: 50vh;
            margin: 60px 0;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }

        .kategori {
            background-image: url('./assets/img/bontang.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .kategori-color {
            /* background-color: rgba(0, 0, 0, 0.6); */
            background-color: rgba(29, 53, 87, 0.8);
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="header-overlay">
            <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top"
                style="box-shadow: 0 4px 20px rgba(0, 0, 0, .08); padding: 20px 0;">
                <div class="container-fluid container">
                    <a class="navbar-brand page-scroll" href="#header" style="font-weight: 500;">SIG <span
                            style="font-weight: 700; letter-spacing: .15rem; color: #1d3557;">UMKM</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" aria-current="page" href="#header"
                                    style="font-size: 14px;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#about" style="font-size: 14px;">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#maps" style="font-size: 14px;">Maps</a>
                            </li>
                            <li class="nav-item">
                                @auth
                                <a class="nav-link fw-bold text-primary mx-md-3 my-2 my-md-0" href="{{ route('home') }}"
                                    style="font-size: 14px;">{{
                                    ucwords(Auth::user()->name)}}</a>
                                @endauth
                                @guest
                                <a class="nav-link btn btn-sm btn-primary text-white px-md-3 mx-md-3 my-2 my-md-0"
                                    href="{{ route('login') }}" style="font-size: 14px;">Login</a>
                                @endguest
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <section class="hero">
                <h2>Sistem Informasi Geografis</h2>
                <h1 style="font-weight: 600; margin: 10px 0 20px;">Usaha Mikro Kecil Dan Menengah (UMKM)</h1>
                <h2>Kecamatan Bontang Barat - Kota Bontang</h2>
            </section>
        </div>
    </header>

    <section class="about" id="about" style="background-color: #ffffff;">
        <div class="row d-flex container">
            <div class="col-md-6 col-12 d-flex my-2 flex-column justify-content-center align-items-center">
                <img src="./assets/img/logo-bontang.png" alt="" width="85" class="my-2">
                <h4 style="font-weight: 500;">SIG UMKM BONTANG BARAT</h4>
            </div>
            <div class="col-md-6 col-12 d-flex flex-column justify-content-center" style="text-align: justify;">
                <p>Sistem Informasi Geografis UMKM Bontang Barat Merupakan Website Pemetaan Geografis UMKM Di Wilayah
                    Kecamatan
                    Bontang Barat, Kota Bontang. Website SIG UMKM Bontang Barat Berisikan Informasi Dan Lokasi Dari UMKM
                    Di
                    Kecamatan Bontang Barat, Kota Bontang.</p>
                <span style="font-size: 14px;"><i>~ Informasi Dapat Berubah Sewaktu-waktu</i></span>
            </div>
        </div>
    </section>

    <section class="kategori d-flex align-items-center text-center" id="kategori"
        style="background-color: #1d3557; height: 18vh;">
        <div class="kategori-color">
            <div class="row container justify-content-evenly text-white">
                <div class="col-6 col-md-4">
                    <span style="font-size: 14px;letter-spacing: 1.2px" class="fw-bold">Kelurahan Belimbing</span>
                </div>
                <div class="col-6 col-md-4">
                    <span style="font-size: 14px;letter-spacing: 1.2px" class="fw-bold">Kelurahan Kanaan</span>
                </div>
                <div class="col-6 col-md-4">
                    <span style="font-size: 14px;letter-spacing: 1.2px" class="fw-bold">Kelurahan Telihan</span>
                </div>
            </div>
        </div>
    </section>

    <section class="maps d-flex justify-content-center align-items-center" id="maps"
        style="height: 75vh; background-color: #F6F6F7;">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div id="map"
                style="height: 60vh; width: 100%; border-radius: 10px; box-shadow: 0 0 20px 1px rgba(0, 0, 0, .1);">
            </div>
        </div>
    </section>

    <footer class="py-3" style="background-color: rgba(29, 53, 87, .9);">
        <p class="p-0 m-0 text-center text-white" style="font-size: 12px;">Copyright © 2022 - Achmad Ricky Andrian</p>
    </footer>


    <!-- JQuery and Datatables -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- geoJson Bontang Barat -->
    <script src="{{ asset('assets/js/bontang-barat.js') }}"></script>

    <script>
        const map = L.map('map', {
            attributionControl: false,
        }).setView([0.1372358, 117.4548496], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);
        const barat = L.geoJson(bontangBarat);
        barat.addTo(map);
        barat.bindPopup("Kawasan Kecamatan Bontang Barat").openPopup();


        @foreach ($umkms as $umkm)
            L.marker([{{ $umkm->location }}])
                .bindPopup("<h6>{{ ucwords($umkm->nama_usaha) }}</h6><br />{{ ucwords($umkm->alamat) }}<br /><a href='{{ route('detail-map', $umkm->id) }}' class='btn btn-sm btn-primary px-2 py-1 mt-2 text-white'>Detail</a>").
                addTo(map);
        @endforeach

        var popup = L.popup()
            .setLatLng([0.1372358, 117.4548496])
            .setContent("Kawasan Kecamatan Bontang Barat")
            .openOn(map);

        $('.page-scroll').on('click', function(e) {
            let tujuan = $(this).attr('href');
            let elementTujuan = $(tujuan);
            $("html, body").animate({
                scrollTop: elementTujuan.offset().top - 100
            });
            e.preventDefault();
        });

        $(document).ready(function() {
          $('#example').DataTable();
        });
    </script>
</body>

</html>