<?php

namespace App\Http\Controllers\Admin;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin-web');
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
        return view('admin.home', compact('book'));
        return response()->json($book);

    }

    public function create()
    {
        //

        return view('admin.tambah');

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
        $request->validate([
            'nama_buku' => 'required',
            'penulis' => 'required',
            'tentang_buku' => 'required',
            'status_buku' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image_name='';
        if($request->file('foto')){
            $image_name= $request->file('foto')->store('img','public');
        }
        // Book::create($request->all());
        $buku = new Book;
        $buku->nama_buku = $request->get('nama_buku');
        $buku->penulis = $request->get('penulis');
        $buku->tentang_buku = $request->get('tentang_buku');
        $buku->status_buku = $request->get('status_buku');
        $buku->foto = $image_name;
        $buku->save();

        return redirect()->route('admin.home')
        ->with('success', 'Buku Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        //
        $book = Book::find($id);

        return view('admin.edit', compact('book'));

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
        $request->validate([
            'nama_buku' => 'required',
            'penulis' => 'required',
            'tentang_buku' => 'required',
            'status_buku' => 'required',
            // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $buku = Book::find($id);

        // $image_name='';
        // if($request->file('foto')){
        //     $image_name= $request->file('foto')->store('img','public');
        // }

        if($request->hasFile('foto')){
            $request->validate([
              'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('foto')->store('img','public');
            $buku->foto = $path;
        }
        $buku->nama_buku = $request->get('nama_buku');
        $buku->penulis = $request->get('penulis');
        $buku->tentang_buku = $request->get('tentang_buku');
        $buku->status_buku = $request->get('status_buku');
        $buku->save();


        return redirect()->route('admin.home')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('admin.home')
        -> with('success', 'Buku Berhasil Dihapus');

    }


    public function search(Request $request){
        $search = $request->get('search');
        $book = DB::table('books')
        ->where('nama_buku','like','%'.$search.'%')
        ->orWhere('penulis','like','%'.$search.'%')->get();
        return view('admin.home', compact('book'));
    }

}

