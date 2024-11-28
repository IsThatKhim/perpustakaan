<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use Exception;


class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $buku = Buku::with('kategori')->paginate(5); 
        return view('buku.index', compact('buku'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all(); 
        return view('buku.create', compact('kategoris')); 
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'TahunTerbit' => 'required|date',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori_id' => 'required|integer|exists:kategori,id',
        ]);

        $buku = new Buku();
        $buku->judul = $validatedData['judul'];
        $buku->TahunTerbit = $validatedData['TahunTerbit'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->penulis = $validatedData['penulis'];
        $buku->kategori_id = $validatedData['kategori_id'];
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
        }
        
        $kategoris = Kategori::all();
        return view('buku.edit', ['buku' => $buku, 'kategoris' => $kategoris]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255|unique:buku,judul,' . $id . ',id',
            'TahunTerbit' => 'required|date',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori_id' => 'required|integer|exists:kategori,id',
        ]);
          
        try {
            $buku = Buku::find($id); 
            if (!$buku) {
                return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
            }

            $buku->judul = $validatedData['judul'];
            $buku->TahunTerbit = $validatedData['TahunTerbit'];
            $buku->penerbit = $validatedData['penerbit'];
            $buku->penulis = $validatedData['penulis'];
            $buku->kategori_id = $validatedData['kategori_id'];
            $buku->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan: ' . $e->getMessage());
        }

        return redirect()->route('buku.index')->with('success', 'Data Berhasil Disimpan');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);

        try {
            if (!$buku) {
                return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
            }
            $buku->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Buku Gagal dihapus: ' . $e->getMessage());
        }
        
        return redirect()->back()->with('success', 'Buku Berhasil dihapus');
    }
}
