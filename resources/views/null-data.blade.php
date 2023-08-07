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
          @if (session('message') == 'Success get nulls value' )
            <h2>Data Kosong</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Curah Hujan</th>
                            <th>Harga</th>
                            <th>Produksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row['Curah Hujan'] }}</td>
                                <td>{{ $row['Harga'] }}</td>
                                <td>{{ $row['Produksi'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <form action="{{ route('proses') }}" method="get">
                @csrf
                    <input type="hidden" id="komoditas" name="komoditas" value="{{ $komoditas }}">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </div>
            </form>
          @endif  
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
