<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prediksi Harga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #43b46b;">
    <a class="navbar-brand" href="">Prediksi Harga</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="">Home</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
      <div class="row" style="margin-top: 40px;">
      <h2>Hasil Training Data</h2>
      <!-- Accessing the "korelasi_hujan_kepada_harga" object -->
      <p>Korelasi hujan terhadap harga: <b>{{ $data['korelasi_hujan_kepada_harga']['nama'] }}</b>
        dengan nilai: {{ $data['korelasi_hujan_kepada_harga']['nilai'] }}</p>
      <!-- Accessing the "korelasi_produksi_kepada_harga" object -->
      <p>Korelasi produksi terhadap harga: <b>{{ $data['korelasi_produksi_kepada_harga']['nama'] }}</b>
        dengan nilai: {{ $data['korelasi_produksi_kepada_harga']['nilai'] }}</p>
      
      <?php
        $bulan = [
          "Januari",
          "Februari",
          "Maret",
          "April",
          "Mei",
          "Juni",
          "Juli",
          "Agustus",
          "September",
          "Oktober",
          "November",
          "Desember"
        ]
      ?>
      @foreach($data['hasil_prediksi'] as $index => $prediksi)
        <p> {{ $bulan[$index] }}: <b>Rp. {{ floor($prediksi) }} / KG</b></p>
      @endforeach
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>