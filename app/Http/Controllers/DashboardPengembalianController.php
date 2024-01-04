<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $auth_id = $user->id;
        $pengembalians = Order::where('user_id',$auth_id)->paginate(10);
        return view('dashboard.pengembalian.index', [
            'title' => 'Pengembalian Mobil',
            'pengembalians' => $pengembalians,
            'auth_id' => $auth_id
            // 'pengembalians_warning' => $pengembalians_warning,
            // 'message_warning' => $message_warning,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Fungsi status_name : untuk mengetahui status dari mobil yang diketahui
     */
    public static function status_sewa_name(int $status_sewa){
        if($status_sewa==1){
            $result = "Sudah dikembalikan";
        }
        else{
            $result = "Belum dikembalikan";
        }

        return $result;
    }
}
