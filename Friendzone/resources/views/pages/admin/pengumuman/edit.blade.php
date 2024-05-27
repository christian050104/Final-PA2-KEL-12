<!-- resources/views/pages/admin/pengumuman/edit.blade.php -->

<x-app-layout title="Edit Pengumuman">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit Pengumuman</h2>
                        <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="{{ $pengumuman->judul }}">
                            </div>
                            <div class="mb-3">
                                <label for="konten" class="form-label">Konten</label>
                                <textarea name="konten" id="konten" class="form-control">{{ $pengumuman->konten }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($pengumuman->image)
                                    <img src="/images/{{ $pengumuman->image }}" alt="Current Image" class="mt-2 img-fluid">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
