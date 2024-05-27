<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        // Paginate the results
        $pengumuman = Pengumuman::latest()->paginate(10); // Adjust the number to your needs

        return view('pages.admin.pengumuman.pengumuman', compact('pengumuman'));
    }
    public function create()
    {
        return view('pages.admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData['image'] = "$profileImage";
        }

        Pengumuman::create($validatedData);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil disimpan.');
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pages.admin.pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pages.admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData['image'] = "$profileImage";
        } else {
            unset($validatedData['image']);
        }

        $pengumuman->update($validatedData);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diubah.');
    }

    public function destroy($id)
{
    $pengumuman = Pengumuman::findOrFail($id);
    $pengumuman->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Pengumuman berhasil dihapus',
    ]);
}

}
