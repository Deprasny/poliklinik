<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pendaftaran = Pendaftaran::all();
      return view('pendaftaran.index', compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendaftaran.add');
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
      'tanggal' => 'required',
      'dokter_id' => 'required',
      'pasien_id' => 'required',
      'polklinik_id' => 'required',
      'biaya' => 'required',
      'keterangan' => 'required',
      ]);

       $tambah = new Pendaftaran();
       $tambah->tanggal = $request['tanggal'];
       $tambah->dokter_id = $request['dokter_id'];
       $tambah->pasien_id = $request['pasien_id'];
       $tambah->poliklinik_id = $request['poliklinik_id'];
       $tambah->biaya = $request['biaya'];
       $tambah->keterangan = $request['tanggal'];

       $tambah->save();

       return redirect()->to('/pendaftaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = Pendaftaran::findOrfail($id);
       return view('pendaftaran.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = Pendaftaran::where('id', $id)->first();
      return view('pendaftaran.edit')->with('edit', $edit);
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
      'tanggal' => 'required',
      'dokter_id' => 'required',
      'pasien_id' => 'required',
      'polklinik_id' => 'required',
      'biaya' => 'required',
      'keterangan' => 'required',
      ]);

       $update =Pembayaran::where('id', $id)->first();
       $update->tanggal = $request['tanggal'];
       $update->dokter_id = $request['dokter_id'];
       $update->pasien_id = $request['pasien_id'];
       $update->poliklinik_id = $request['poliklinik_id'];
       $update->biaya = $request['biaya'];
       $update->keterangan = $request['tanggal'];

       $tambah->update();

       return redirect()->to('/pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus = Pendaftaran::find($id);
      $hapus->delete();

      return redirect()->to('/pendaftaran');
    }
}
