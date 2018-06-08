<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Mobil;
use App\Supir;
use Session;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::with('Mobil','Supir')->get();
        return view('booking.index',compact('booking'));
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
        return view('booking.create',compact('mobil','supir'));
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
            'jumlah_hari'=>'required|',
            'mobil_id' => 'required|',
            'supir_id' => 'required|',
            'total_harga'=>'required|'
        ]);
        $booking = new Booking;
        $booking->tanggal_pengambilan = $request->tanggal_pengambilan;
        $booking->tanggal_pengembalian = $request->tanggal_pengembalian;
        $booking->jumlah_hari = $request->jumlah_hari;
        $booking->mobil_id = $request->mobil_id;
        $booking->supir_id = $request->supir_id;
        $booking->total_harga = $request->total_harga;
        $booking->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$booking->customer_id</b>"
        ]);
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $mobil = Mobil::all();
        $selectedMobil = Booking::findOrFail($id)->mobil_id;
        $supir = Supir::all();
        $selectedSupir = Booking::findOrFail($id)->supir_id;
        return view('booking.edit',compact('booking','mobil','selectedMobil','supir','selectedSupir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tanggal_pengambilan' => 'required|',
            'tanggal_pengembalian' => 'required|',
            'jumlah_hari' => 'required|',
            'mobil_id' => 'required|',
            'supir_id' => 'required|',
            'total_harga' => 'required|'
        ]);
        $booking = Booking::findOrFail($id);
        $booking->tanggal_pengambilan = $request->tanggal_pengambilan;
        $booking->tanggal_pengembalian = $request->tanggal_pengembalian;
        $booking->jumlah_hari = $request->jumlah_hari;
        $booking->mobil_id = $request->mobil_id;
        $booking->supir_id = $request->supir_id;
        $booking->total_harga = $request->total_harga;
        $booking->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$booking->mobil_id</b>"
        ]);
        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('booking.index');
    }
}
