<x-web-layout title="Menu">
    <style>
        body {
            background-color: rgb(208, 221, 224);
        }

        /* Menentukan tinggi tetap untuk gambar */
        .card-img-top {
            height: 300px; /* Atur tinggi gambar sesuai kebutuhan */
            object-fit: cover; /* Untuk memastikan gambar tetap proporsional */
        }

        /* Menentukan tinggi tetap untuk kartu */
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 100%; /* Memastikan setiap kartu memiliki tinggi yang sama */
            display: flex;
            flex-direction: column;
            border-radius: 15px; /* Membuat sudut kartu menjadi bulat */
            overflow: hidden; /* Mengatasi sudut bulat yang terlalu besar */
        }

        /* Menyamakan tinggi konten di dalam kartu */
        .card-body {
            flex: 1; /* Agar konten di dalam kartu menyesuaikan tinggi kartu */
            padding: 15px;
        }

        /* Efek zoom saat hover */
        .card:hover {
            transform: scale(1.05);
        }

        /* Styling untuk tombol View */
        .card-footer {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            border-top: 1px solid #ddd;
            text-align: center; /* Pusatkan tombol View */
        }

        /* Aligment tombol View */
        .card-footer .btn-primary {
            color: black;
            transition: background-color 0.3s ease; /* Efek hover */
            border: none;
            background-color: #007bff; /* Warna default tombol */
        }

        /* Efek hover pada tombol View */
        .card-footer .btn-primary:hover {
            background-color: #0056b3; /* Warna saat dihover */
        }
    </style>
    <div class="banner">
        <img src="{{ asset('assets/images/shop/3.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
        <div class="container">
            <div class="matter">
                <div class="crumb">
                    <h2>Daftar Menu</h2>
                    <ul class="list-inline">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/daftarmenu') }}">Daftar Menu</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <!-- Search Form -->
                    <form action="/daftarmenu/search" class="form-horizontal search-icon" method="GET" style="background: linear-gradient(135deg, #4a69bd, #6a89cc); padding: 15px; border-radius: 10px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease;">
                        <fieldset>
                            <legend style="color: #fff; font-size: 18px; text-align: center; margin-bottom: 10px;">Pencarian Kata Kunci</legend>
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="search" value="" placeholder="Kata Kunci" class="form-control" type="search" style="border-radius: 10px 0 0 10px; border: none; padding: 10px; font-size: 14px; color: #333;">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" style="border-radius: 0 10px 10px 0; background-color: #ff6b6b; border: none; padding: 10px 15px; font-size: 14px; transition: background-color 0.3s ease;">
                                            <i class="icofont icofont-search" style="color: white; font-size: 16px;"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <br>
                    <!-- Filter Form -->
                    <form action="{{ url('/daftarmenu/filter') }}" class="form-horizontal filter-icon" method="GET" style="background: linear-gradient(135deg, #4a69bd, #6a89cc); padding: 15px; border-radius: 10px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease;">
                        <legend style="color: #fff; font-size: 16px; text-align: center; margin-bottom: 10px;">Pilih Kategori</legend>
                        <div class="form-group">
                            <select name="filter" class="form-control" style="border-radius: 10px; border: none; padding: 10px; font-size: 14px; color: #333;">
                                <option value="">Semua</option>
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #ff6b6b; border: none; border-radius: 10px; padding: 10px; font-size: 14px; transition: background-color 0.3s ease;">Filter</button>
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 m-5 col-12 mainpage">
                    <div class="row">
                        @if (isset($message))
                            <div class="alert alert-info">
                                {{ $message }}
                            </div>
                        @endif
                        @if (isset($filter))
                            <div class="alert alert-info">
                                Menampilkan menu {{ ucfirst($filter) }}
                            </div>
                        @endif
                        @foreach ($product as $index => $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card">
                                    <img src="{{ asset('images/produk/' . $item->cover) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <h6 class="card-text">Stok: {{ $item->stock }}</h6>
                                        <h6 class="card-text">Harga: {{ $item->price }}</h6>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ url('/daftarmenu/menudetail', $item->id) }}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        {{ $product->links('theme.web.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
