<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $bukus = Buku::all();
        return view('peminjaman.create', compact('users', 'bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peminjaman = new Peminjaman;
        $peminjaman->user_id = $request->user_id;
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->TanggalPeminjaman = $request->TanggalPeminjaman;
        $peminjaman->TanggalPengembalian = $request->TanggalPengembalian;
        $peminjaman->StatusPeminjaman = $request->StatusPeminjaman;
        $peminjaman->save();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            abort(404);
        }
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            abort(404);
        }
        $users = User::all();
        $bukus = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'users', 'bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            abort(404);
        }
        $peminjaman->user_id = $request->user_id;
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->TanggalPeminjaman = $request->TanggalPeminjaman;
        $peminjaman->TanggalPengembalian = $request->TanggalPengembalian;
        $peminjaman->StatusPeminjaman = $request->StatusPeminjaman;
        $peminjaman->save();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            abort(404);
        }
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman deleted successfully.');
    }
}
