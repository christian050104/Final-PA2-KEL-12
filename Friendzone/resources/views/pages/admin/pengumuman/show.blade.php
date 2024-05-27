<!-- resources/views/pages/admin/pengumuman/show.blade.php -->

<x-app-layout title="Pengumuman Detail">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $pengumuman->judul }}</h2>
                        <p>{{ $pengumuman->konten }}</p>
                        @if ($pengumuman->image)
                            <img src="/images/{{ $pengumuman->image }}" alt="Pengumuman Image" class="img-fluid">
                        @endif
                        <!-- Add other details as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
