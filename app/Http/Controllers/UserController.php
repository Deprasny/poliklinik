<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id','DESC')->paginate(5);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'username' => 'required',
          'nama' => 'required',
          'alamat' => 'required',
          'akses' => 'required',
      ]);

       $tambah = new User();
       $tambah->username = $request['username'];
       $tambah->nama = $request['nama'];
       $tambah->alamat = $request['alamat'];
       $tambah->akses = $request['akses'];

       $tambah->save();

       return redirect()->to('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = User::findOrfail($id);
       return view('user.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = User::where('id', $id)->first();
      return view('user.edit')->with('edit', $edit);
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
      $this->validate($request, [
          'username' => 'required',
          'nama' => 'required',
          'alamat' => 'required',
          'akses' => 'required',
      ]);

       $update = User::where('id', $id)->first();
       $update->username = $request['username'];
       $update->nama = $request['nama'];
       $update->alamat = $request['alamat'];
       $update->akses = $request['akses'];

       $update->update();

       return redirect()->to('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus = User::find($id);
      $hapus->delete();

      return redirect()->to('/user');
    }
}
