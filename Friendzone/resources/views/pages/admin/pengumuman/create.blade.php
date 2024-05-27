<!-- resources/views/pages/admin/pengumuman/create.blade.php -->

<x-app-layout title="Create Pengumuman">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2>Create Pengumuman</h2>
                        <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="konten" class="form-label">Konten</label>
                                <textarea name="konten" id="konten" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
