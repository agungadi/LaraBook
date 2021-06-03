<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $book = Book::Select("*")
        ->orderBy("id", "asc")
        ->get();
        return view('home', compact('book'));
        return response()->json($book);

        // return view('home');
    }


    public function tambahpinjam($id)
    {
        $book = Book::where('id', $id)->get();
        // return response()->json($book);

        return view('tambahpinjam', compact('book'));

    }

    public function konfirmasipinjam(Request $request)
    {
        $request->validate([
            'id_member' => 'required',
            'id_book' => 'required',
            'tanggal_kembali' => 'required',

        ]);
        $datenow = Carbon::now()->format('Y-m-d');

        // Book::create($request->all());
        $pinjam = new Borrow;
        $pinjam->id_member = $request->get('id_member');
        $pinjam->id_book = $request->get('id_book');
        $pinjam->tanggal_pinjam = $datenow;
        $pinjam->tanggal_kembali = $request->get('tanggal_kembali');
        $pinjam->status = 'Booked';

        // $buku->status_buku = $request->get('status_buku');
        // $buku->foto = $image_name;
        $pinjam->save();

        $id_buku = $pinjam->id_book = $request->get('id_book');
        $this->booked($id_buku);

        return redirect()->route('home')
        ->with('success', 'Buku Berhasil di Booked');

    }

    public function booked($id_buku)
    {
        $book = Book::where('id', $id_buku)->first();
        $book->status_buku = 'Booked';
        $book->save();

    }

    public function daftarpinjam(Request $request)
    {
        $userId = Auth::id();

        // $buku = Borrow::with('book', 'user')->get();
        $borrow = Borrow::Select("*")
        ->where('id_member', $userId)
        ->orderBy("id_peminjaman", "asc")
        ->get();
        return view('daftarpinjam', compact('borrow'));

        // return view('daftarpinjam', ['buku'=>$buku,'Borrow'=>$borrow]);
        return response()->json($borrow);
    }

    public function batalkan($id, $id_buku)
    {

        // $id_buku = $id;
        Borrow::find($id)->delete();
        $this->tersedia($id_buku);
        // return response()->json($id_buku);

        return redirect()->route('daftarpinjam')
        -> with('success', 'Pinjaman Berhasil Dibatalkan');

    }

    public function tersedia($id_buku)
    {
        $book = Book::where('id', $id_buku)->first();
        $book->status_buku = 'Tersedia';
        $book->save();

    }
}
