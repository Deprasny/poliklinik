<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $obat = Obat::all();
      return view('obat.index', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.add');
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
      'jenis' => 'required',
      'kategori' => 'required',
      'harga' => 'required',
      'jumlah' => 'required',
      ]);

       $tambah = new Dokter();
       $tambah->nama = $request['nama'];
       $tambah->jenis = $request['jenis'];
       $tambah->kategori = $request['kategori'];
       $tambah->harga = $request['harga'];
       $tambah->jumlah = $request['jumlah'];

       $tambah->save();

       return redirect()->to('/obat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = Obat::findOrfail($id);
       return view('obat.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = Obat::where('id', $id)->first();
      return view('obat.edit')->with('edit', $edit);
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
      'jenis' => 'required',
      'kategori' => 'required',
      'harga' => 'required',
      'jumlah' => 'required',
      ]);

       $update = Obat::where('id', $id)->first();
       $update->nama = $request['nama'];
       $update->jenis = $request['jenis'];
       $update->kategori = $request['kategori'];
       $update->harga = $request['harga'];
       $update->jumlah = $request['jumlah'];

       $update->update();

       return redirect()->to('/obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus = Obat::find($id);
      $hapus->delete();

      return redirect()->to('/obat');
    }
}
