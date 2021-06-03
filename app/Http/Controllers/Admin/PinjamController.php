<?php

namespace App\Http\Controllers\Admin;
use App\Models\Borrow;
use App\Models\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin-web');
    }
    public function index()
    {
        //
        // $buku = Borrow::with('books', 'users')->get();
        $buku = Borrow::with('book', 'user')->get();
        // $borrow = Borrow::where([
        //     ['status', 'Dipinjam'],
        // ])->orderBy("id_peminjaman", "asc")
        // ->get();
        // $borrow = Borrow::orderBy('id_peminjaman','asc');
        $borrow = Borrow::Select("*")
                ->where('status', 'Dipinjam')
                ->orderBy("id_peminjaman", "asc")
                ->get();
        return view('admin.pinjam.index', ['buku'=>$buku,'Borrow'=>$borrow]);
        return response()->json($buku);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_peminjaman)
    {
        //
        Borrow::find($id_peminjaman)->delete();
        return redirect()->route('admin.pinjam')
        -> with('success', 'Peminjaman Berhasil Dihapus');

    }

    public function dikembalikan($id_peminjaman)
    {
        $kembali = Borrow::where('id_peminjaman', $id_peminjaman)->first();
        $kembali->status = 'Tersedia';
        $kembali->save();
        $id_buku = $kembali->id_book;
        $this->selesai($id_buku);
        // return response()->json($id_buku);
        return redirect()->route('admin.pinjam')
        -> with('success', 'Buku Berhasil Dikembalikan');


    }

    public function selesai($id_buku)
    {
        $kembali = Book::where('id', $id_buku)->first();
        $kembali->status_buku = 'Tersedia';
        $kembali->save();

    }

}
