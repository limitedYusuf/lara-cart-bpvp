<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
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

    <div class="container mt-5">
        <h2>Keranjang Belanja</h2>
        @if (count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $itemId => $item)
                    @php
                        $total += $item['price'] * $item['quantity'];
                    @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp. {{ number_format($item['price'], 2, '.', '.') }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp. {{ number_format($item['price'] * $item['quantity'], 2, '.', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $itemId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total Belanja: Rp. {{ number_format($total ?? 0, 2, '.', '.') }}</p>
            <a href="#" class="btn btn-primary">Lanjutkan ke Checkout</a>
        @else
            <p>Keranjang belanja Anda kosong.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
