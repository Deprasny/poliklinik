<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;
use App\Poliklinik;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dokter = Dokter::all();
      return view('dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poliklinik = Poliklinik::all();
        return view('dokter.add', compact('poliklinik'));
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
          'poliklinik_id' => 'required',
          'nama' => 'required',
          'spesialis' => 'required',
          'alamat' => 'required',
          'telepon' => 'required',
          'tarif' => 'required',
      ]);

       $tambah = new Dokter();
       $tambah->poliklinik_id = $request['poliklinik_id'];
       $tambah->nama = $request['nama'];
       $tambah->spesialis = $request['spesialis'];
       $tambah->alamat = $request['alamat'];
       $tambah->telepon = $request['telepon'];
       $tambah->tarif = $request['tarif'];

       $tambah->save();

       return redirect()->to('/dokter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = Dokter::findOrfail($id);
       return view('dokter.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = Dokter::where('id', $id)->first();
      return view('dokter.edit')->with('edit', $edit);
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
          'polklinik_id' => 'required',
          'nama' => 'required',
          'spesialis' => 'required',
          'alamat' => 'required',
          'telepon' => 'required',
          'tarif' => 'required',
      ]);

       $update = Dokter::where('id', $id)->first();
       $update->poliklinik_id = $request['poliklinik_id'];
       $update->nama = $request['nama'];
       $update->spesialis = $request['spesialis'];
       $update->alamat = $request['alamat'];
       $update->telepon = $request['akses'];
       $update->tarif = $request['tarif'];

       $update->update();

       return redirect()->to('/dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus = Dokter::find($id);
      $hapus->delete();

      return redirect()->to('/dokter');
    }
}
