<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NegaraController extends Controller
{

    public function index()
    {

        $query = Negara::latest();
        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('sejarah', 'like', '%' . request('search') . '%');
        }
        $negaras = $query->paginate(6)->withQueryString();
        return view('homepage', compact('negaras'));
    }

    public function detail($id)
    {
        $negara = Negara::find($id);
        return view('detail', compact('negara'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('negara', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sejarah' => 'required|string',
            'tahunmerdeka' => 'required|integer',
            'pendiri' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Jika validasi gagal, kembali ke halaman input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('negaras/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        // Simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        // Simpan data ke table movies
        Negara::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'sejarah' => $request->sejarah,
            'tahunmerdeka' => $request->tahunmerdeka,
            'pendiri' => $request->pendiri,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $negaras = Negara::latest()->paginate(10);
        return view('data-negaras', compact('negaras'));
    }

    public function edit($id)
    {
        $negara = Negara::find($id);
        $categories = Category::all();
        return view('form-edit', compact('negara', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sejarah' => 'required|string',
            'tahunmerdeka' => 'required|integer',
            'pendiri' => 'required|string',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/negaras/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data movie yang akan diupdate
        $negara = Negara::findOrFail($id);

        // Jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $negara->foto_sampul))) {
                File::delete(public_path('images/' . $negara->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $negara->update([
                'nama' => $request->nama,
                'sejarah' => $request->sejarah,
                'category_id' => $request->category_id,
                'tahunmerdeka' => $request->tahunmerdeka,
                'pendiri' => $request->pendiri,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $negara->update([
                'nama' => $request->nama,
                'sejarah' => $request->sejarah,
                'category_id' => $request->category_id,
                'tahunmerdeka' => $request->tahunmerdeka,
                'pendiri' => $request->pendiri,
            ]);
        }

        return redirect('/negaras/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $negara = Negara::findOrFail($id);

        // Delete the movie's photo if it exists
        if (File::exists(public_path('images/' . $negara->foto_sampul))) {
            if ($negara->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $negara->foto_sampul));
            }
        }

        // Delete the movie record from the database
        $negara->delete();

        return redirect('/negaras/data')->with('success', 'Data berhasil dihapus');
    }
}
