<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::Select("*")
        ->orderBy("id", "asc")
        ->get();
         return view('admin.member.index', compact('user'));
        return response()->json($user);
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
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.member.edit', compact('user'));

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
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $user = User::find($id);


        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->alamat = $request->get('alamat');
        $user->no_hp = $request->get('no_hp');
        $user->save();


        return redirect()->route('admin.member')
        ->with('success', 'Member Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect()->route('admin.member')
        -> with('success', 'Member Berhasil Dihapus');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $user = DB::table('users')
        ->where('name','like','%'.$search.'%')
        ->orWhere('email','like','%'.$search.'%')
        ->orWhere('alamat','like','%'.$search.'%')
        ->orWhere('no_hp','like','%'.$search.'%')->get();
        return view('admin.member.index', compact('user'));
    }
}
