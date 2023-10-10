<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="#">Latihan Belanja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">Keranjang Belanja</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Card Produk -->
    <div class="container mt-5">
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Harga: Rp. {{ number_format($product->price, 2, '.', '.') }}</p>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <label for="quantity">Kuantitas:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1">
                            <div class="mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm">Tambahkan ke Keranjang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
