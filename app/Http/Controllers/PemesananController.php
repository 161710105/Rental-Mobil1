<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Mobil;
use App\Supir;
use App\Customer;
use Session;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::with('Mobil','Supir','Customer')->get();
        return view('pemesanan.index',compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobil = Mobil::all();
        $supir = Supir::all();
        $customer = Customer::all();
        return view('pemesanan.create',compact('mobil','supir','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tanggal_pengambilan' => 'required|',
            'tanggal_pengembalian' => 'required|',
            'jumlah_hari' => 'required|',
            'denda' => 'required|',
            'mobil_id' => 'required|',
            'customer_id' => 'required|',
            'supir_id' => 'required|',
            'total_harga' => 'required|'
        ]);
        $pemesanan = new Pemesanan;
        $pemesanan->tanggal_pengambilan = $request->tanggal_pengambilan;
        $pemesanan->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pemesanan->jumlah_hari = $request->jumlah_hari;
        $pemesanan->demda = $request->demda;
        $pemesanan->mobil_id = $request->mobil_id;
        $pemesanan->customer_id = $request->customer_id;
        $pemesanan->supir_id = $request->supir_id;
        $pemesanan->total_harga = $request->total_harga;
        $pemesanan->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$pemesanan->customer_id</b>"
        ]);
        return redirect()->route('pemesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.show',compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $customer = Customer::all();
        $selectedCustomer = Pemesanan::findOrFail($id)->customer_id;
        $mobil = Mobil::all();
        $selectedMobil = Pemesanan::findOrFail($id)->mobil_id;
        $supir = Supir::all();
        $selectedSupir = Pemesanan::findOrFail($id)->supir_id;
        return view('pemesanan.edit',compact('pemesanan','customer','selectedCustomer','mobil','selectedMobil','supir','selectedSupir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'tanggal_pengambilan' => 'required|',
            'tanggal_pengembalian' => 'required|',
            'jumlah_hari' => 'required|',
            'total_harga' => 'required|',
            'mobil_id' => 'required|',
            'customer_id' => 'required|',
            'supir_id' => 'required|',
            'total_harga' => 'required|'
        ]);
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->tanggal_pengambilan = $request->tanggal_pengambilan;
        $pemesanan->tanggal_pengembalian = $request->tanggal_pengembalian;
        $pemesanan->jumlah_hari = $request->jumlah_hari;
        $pemesanan->denda = $request->denda;
        $pemesanan->mobil_id = $request->mobil_id;
        $pemesanan->customer_id = $request->customer_id;
        $pemesanan->supir_id = $request->supir_id;
        $pemesanan->total_harga = $request->total_harga;
        $pemesanan->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$pemesanan->customer_id</b>"
        ]);
        return redirect()->route('pemesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pemesanan.index');
    }
}
