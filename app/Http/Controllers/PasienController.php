<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pasien = Pasien::all();
      return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.add');
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
      'nama' => 'required',
      'alamat' => 'required',
      'gender' => 'required',
      'umur' => 'required',
      'telepon' => 'required',
      ]);

       $tambah = new Pasien();
       $tambah->nama = $request['nama'];
       $tambah->alamat = $request['alamat'];
       $tambah->gender = $request['gender'];
       $tambah->umur = $request['umur'];
       $tambah->telepon = $request['telepon'];

       $tambah->save();

       return redirect()->to('/pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = Pasien::findOrfail($id);
       return view('pasien.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = Pasien::where('id', $id)->first();
      return view('pasien.edit')->with('edit', $edit);
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
      'nama' => 'required',
      'alamat' => 'required',
      'gender' => 'required',
      'umur' => 'required',
      'telepon' => 'required',
      ]);

       $update =Pasien::where('id', $id)->first();
       $update->nama = $request['nama'];
       $update->alamat = $request['alamat'];
       $update->gender = $request['gender'];
       $update->umur = $request['umur'];
       $update->telepon = $request['telepon'];

       $update->update();

       return redirect()->to('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus = Pasien::find($id);
      $hapus->delete();

      return redirect()->to('/pasien');
    }
}
