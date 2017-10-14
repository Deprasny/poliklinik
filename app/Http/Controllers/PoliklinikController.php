<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $polklinik = Poliklinik::all();
      return view('poliklinik.index', compact('poliklinik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polklinik.add');
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
      ]);

      $tambah = new Poliklinik();
      $tambah->nama = $request['nama'];

      $tambah->save();

      return redirect()->to('/poliklinik');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = Poliklinik::findOrfail($id);
       return view('poliklinik.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = Poliklnik::where('id', $id)->first();
      return view('poliklinik.edit')->with('edit', $edit);
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
      ]);

      $update =Poliklinik::where('id', $id)->first();
      $tambah->nama = $request['nama'];

      $tambah->update();

      return redirect()->to('/poliklinik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hapus = Poliklnik::find($id);
      $hapus->delete();

      return redirect()->to('/poliklinik');
    }
}
