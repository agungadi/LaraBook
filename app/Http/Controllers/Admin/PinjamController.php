<?php

namespace App\Http\Controllers\Admin;
use App\Models\Borrow;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

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
        $this->denda();
        $this->expired();

        $buku = Borrow::with('book', 'user')->get();
        // $borrow = Borrow::where([
        //     ['status', 'Dipinjam'],
        // ])->orderBy("id_peminjaman", "asc")
        // ->get();
        // $borrow = Borrow::orderBy('id_peminjaman','asc');
        $borrow = Borrow::Select("*")
                ->where('status', 'Dipinjam')
                ->orWhere('status', 'Booked')
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
    public function Setujui($id_peminjaman)
    {
        $borrow = Borrow::find($id_peminjaman);
        return view('admin.setujui', compact('borrow'));

    }
    public function cetakpdf($id_peminjaman){
        $borrow = Borrow::with('book','user')->find($id_peminjaman);
        $pdf = PDF::loadview('admin.pdfview', compact('borrow'));
        return $pdf->stream('pinjam.pdf');
        readfile('pinjam.pdf');

    }

    public function disetujui($id_peminjaman, $id_book)
    {
        $disetujui = Borrow::where('id_peminjaman', $id_peminjaman)->first();
        $disetujui->status = 'Dipinjam';
        $disetujui->save();
        $this->dipinjam($id_book);
        return redirect()->route('admin.pinjam')
        -> with('success', 'Pinjaman Berhasil disetujui');
    }

    public function dipinjam($id_book)
    {
        $kembali = Book::where('id', $id_book)->first();
        $kembali->status_buku = 'Dipinjam';
        $kembali->save();

    }

    public function denda()
    {

        $borrows = Borrow::all();
        $borrow_ids = [];
        // $datenow = Carbon::now()->format('Y-m-d');
        // $date= \Carbon\Carbon::createFromFormat('Y-m-d', '2021-6-1');

        foreach ($borrows as $borrow) {
            $borrow_ids[]=  $borrow->id_peminjaman;
            $denda =Carbon::parse($borrow->tanggal_kembali)->diffInDays(now(),false);
            if ($denda > '1'){
            $totaldenda = $denda * 1000;
            } else {
            $totaldenda = 0;
            }
            $borrow_ids[]=  $borrow->denda = $totaldenda;
            $borrow->save();
        }

        // return response()->json($borrow_ids);
    }


    public function cari(Request $request){
        $buku = Borrow::with('book', 'user')->get();

        $search = $request->get('search');
        $borrow = Borrow::select('*')
        ->where('status','like','%'.$search.'%')
        ->orWhereHas('book', function($q) use($search){
            $q->where('nama_buku', 'like', '%' . $search . '%');})

        ->orWhereHas('user' ,function($q1) use($search){
            $q1->where('name', 'like', '%'. $search. '%');
        })
        ->get();

        // whereHas('book', function ($query) use ($request) {
        //         $query->where('nama_buku', 'like', "%{$request->nama_buku}%");
        // })->get();
        // ->where('id_peminjaman','like','%'.$search.'%')
        // ->orWhere('email','like','%'.$search.'%')
        // ->orWhere('alamat','like','%'.$search.'%')
        // ->orWhere('no_hp','like','%'.$search.'%')->get();
        // return view('admin.pinjam.index', compact('Borrow'));
        return view('admin.pinjam.index', ['buku'=>$buku,'Borrow'=>$borrow]);

        // return response()->json($Borrow);

    }
    public function expired(){

        $borrows = Borrow::all();
        // $expired =Carbon::parse($borrow->tanggal_pinjam);
        $borrow_ids = [];
        foreach ($borrows as $borrow) {
            $borrow_ids[]=  $borrow->id_peminjaman;
            $expired1 =Carbon::now()->format('Y-m-d');
            $expired2 =Carbon::parse($borrow->tanggal_pinjam)->format('Y-m-d');
            $borrow_ids[]= $expired1;
            $borrow_ids[]= $expired2;
            $status = $borrow->status;
            // $borrow_ids = $expired->addDay(1);
            // $borrow_ids[]= $expired;
            if ($expired1 > $expired2 && $status == 'Booked'){
                $borrow->delete();
                $this->tersedia($borrow->id_book);
            }
    }
    return response()->json($borrow_ids);

    }
    public function tersedia($id_buku)
    {
        $book = Book::where('id', $id_buku)->first();
        $book->status_buku = 'Tersedia';
        $book->save();

    }
}
