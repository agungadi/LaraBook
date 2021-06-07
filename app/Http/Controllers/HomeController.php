<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $this->denda();
        $this->expired();

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

        return response()->json($borrow_ids);


        // $datenow = 2021-06-6);
        // $datenow = Carbon::now()->format('Y-m-d');
        // $date= \Carbon\Carbon::createFromFormat('Y-m-d', '2021-6-5');
        // $datenow = Carbon::now()->format('Y-m-d');


        // $denda = $date->diffInDays(now(), false)
        // ;

        // $totaldenda = $denda * 1000;
        // $days = $denda->format('%a');

        // $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
        // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-6 9:30:34');

        // $diff_in_days = $to->diffInDays($from);
        // return response()->json($totaldenda);


    }

    public function caribuku(Request $request){
        $search = $request->get('search');
        $book = DB::table('books')
        ->where('nama_buku','like','%'.$search.'%')
        ->orWhere('penulis','like','%'.$search.'%')->get();
        return view('home', compact('book'));
    }

    public function caririwayat(Request $request){
        $buku = Borrow::with('book')->get();

        $search = $request->get('search');
        $borrow = Borrow::select('*')
        ->where('status','like','%'.$search.'%')
        ->orWhere('tanggal_pinjam','like','%'.$search.'%')
        ->orWhere('tanggal_kembali','like','%'.$search.'%')
        ->orWhereHas('book', function($q) use($search){
            $q->where('nama_buku', 'like', '%' . $search . '%');})
        ->get();
        return view('daftarpinjam', compact('borrow'));
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
}
