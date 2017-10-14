<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pembayaran = Pembayaran::all();
      return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembayaran.add');
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
      'pasien_id' => 'required',
      'tanggal' => 'required',
      'jumlah' => 'required',
      ]);

       $tambah = new Pasien();
       $tambah->pasien_id = $request['pasien_id'];
       $tambah->tanggal = $request['tanggal'];
       $tambah->jumlah = $request['jumlah'];

       $tambah->save();

       return redirect()->to('/pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $detail = Pembayaran::findOrfail($id);
       return view('pembayaran.detail')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $edit = Pembayaran::where('id', $id)->first();
      return view('pembayaran.edit')->with('edit', $edit);
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
      'pasien_id' => 'required',
      'tanggal' => 'required',
      'jumlah' => 'required',
      ]);

       $update =Pembayaran::where('id', $id)->first();
       $update->pasien_id = $request['pasien_id'];
       $update->tanggal = $request['tanggal'];
       $update->jumlah = $request['jumlah'];

       $update->update();

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
      $hapus = Pembayaran::find($id);
      $hapus->delete();

      return redirect()->to('/pembayaran');
    }
}
