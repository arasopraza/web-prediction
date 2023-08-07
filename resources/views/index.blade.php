<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prediksi Harga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #43b46b;">
        <a class="navbar-brand" href="">Prediksi Harga</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="komoditas" class="form-label">Nama Komoditas</label>
                    <select name="komoditas" id="komoditas">
                        <option value="BawangMerah">Bawang Merah</option>
                        <option value="CabaiMerah">Cabai Merah</option>
                        <option value="CabaiRawit">Cabai Rawit</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Upload Data Prediksi</label>
                    <br><a href="{{ route('download') }}">Download Template Data</a></br>
                    <input class="form-control @error('file') is-invalid @enderror" id="formFileSm" type="file"
                        name="file" accept=".xls, .xlsx">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            @if(session()->has('message'))
                <div class="alert alert-{{ session('messageType') }}" style="margin: 10px; width: fit-content;">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
