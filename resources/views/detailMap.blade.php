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
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light navbar-light"
    style="box-shadow: 0 4px 20px rgba(0, 0, 0, .08); padding: 20px 0;">
    <div class="container-fluid container">
      <a class="navbar-brand page-scroll" href="{{ route('welcome') }}" style="font-weight: 500;">SIG <span
          style="font-weight: 700; letter-spacing: .15rem; color: #1d3557;">UMKM</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
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

  <section class="about my-5 container" id="about" style="background-color: #ffffff;">
    {{-- <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-12">
            <h5 class="mb-3">Informasi UMKM</h5>
            <div class="table-responsive">
              <table class="table" style="width:100%">
                <tr>
                  <th>Pemilik Usaha</th>
                  <td>{{ ucwords($umkm->user->name) }}</td>
                </tr>
                <tr>
                  <th>Kelompok Usaha</th>
                  <td>{{ ucwords($umkm->kelompokUsaha->kel_usaha) }}</td>
                </tr>
                <tr>
                  <th>Jenis Usaha</th>
                  <td>{{ ucwords($umkm->jenis_usaha) }}</td>
                </tr>
                <tr>
                  <th>Bidang Usaha</th>
                  <td>{{ ucwords($umkm->nama_usaha) }}</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-12" style="text-align: justify;">
            <h5>Lokasi</h5>
            <div id="map" class="border rounded mb-3" style="height: 220px"></div>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-1 fw-bold">{{ ucwords($umkm->nama_usaha) }}</h5>
        <p class="card-text"><small class="text-muted">{{ ucwords($umkm->user->name) }}</small></p>

        <p class="card-text">{{ ucwords($umkm->kelompokUsaha->kel_usaha) }} - {{ ucwords($umkm->jenis_usaha) }}</p>

        <p class="card-text"><small class="text-muted">{{ ucwords($umkm->keterangan) }}</small></p>
      </div>
      <div id="map" class="card-img-bottom" style="height: 40vh"></div>
    </div>
  </section>

  <footer class="py-3 fixed-bottom" style="background-color: rgba(29, 53, 87, .9);">
    <p class="p-0 m-0 text-center text-white" style="font-size: 12px;">Copyright © 2022 - Achmad Ricky Andrian</p>
  </footer>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>

  <script>
    let map = L.map('map', {
    attributionControl: false,
  }).setView([{{ $umkm->location }}], 15);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  let marker = L.marker([{{ $umkm->location }}]).addTo(map);
  marker.bindPopup("<h6>{{ ucwords($umkm->nama_usaha) }}</h6><br>{{ ucwords($umkm->alamat) }}").openPopup();
  </script>
</body>

</html>