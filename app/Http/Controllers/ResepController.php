<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $resep = Resep::all();
      return view('resep.index', compact('resep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resep.add');
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
      'total_bayar' => 'required',
      'bayar' => 'required',
      'kembali' => 'required',
      ]);

       $tambah = new Resep();
       $tambah->tanggal = $request['tanggal'];
       $tambah->dokter_id = $request['dokter_id'];
       $tambah->pasien_id = $request['pasien_id'];
       $tambah->poliklinik_id = $request['poliklinik_id'];
       $tambah->total_bayar = $request['total_bayar'];
       $tambah->bayar = $request['bayar'];
       $tambah->kembali = $request['kembali'];

       $tambah->save();

       return redirect()->to('/resep');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = Resep::findOrfail($id);
       return view('resep.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = Resep::where('id', $id)->first();
      return view('resep.edit')->with('edit', $edit);
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
      'total_bayar' => 'required',
      'bayar' => 'required',
      'kembali' => 'required',
      ]);

       $update =Resep::where('id', $id)->first();
       $update->tanggal = $request['tanggal'];
       $update->dokter_id = $request['dokter_id'];
       $update->pasien_id = $request['pasien_id'];
       $update->poliklinik_id = $request['poliklinik_id'];
       $update->total_bayar = $request['total_bayar'];
       $update->bayar = $request['bayar'];
       $update->kembali = $request['kembali'];

       $update->update();

       return redirect()->to('/resep');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus = Resep::find($id);
      $hapus->delete();

      return redirect()->to('/resep');
    }
}
