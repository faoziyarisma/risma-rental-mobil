<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use App\Models\Order;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'auth_id' => $auth_id,
            // 'order' => $pengembalians
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
        dd($order);
        return view('dashboard.pengembalian.show', [
            'title' => 'Detail Data Pengembalian',
            // 'tarif_per_hari' => $tarif_per_hari,
            'pengembalian' => $order
            // 'harga_satuan' => $harga_satuan
        ]);
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

    public function pengembalian_form(Order $pengembalian){
        $mobil_id = $pengembalian->mobil_id;
        $tarif_per_hari = DB::table('mobils')
        ->where('id', $mobil_id)
        ->value('tarif_per_hari');
        // dd($tarif_per_hari);
        return view('dashboard.pengembalian.form_pengembalian', [
            'title' => 'Pengembalian Mobil',
            'pengembalian' => $pengembalian,
            'tarif_per_hari' => $tarif_per_hari  
        ]);
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

    /**
     * Fungsi validate_NoPlat : untuk memvalidasi inputan no_plat user dengan no_plat sebenarnya
     */
    public static function validate_NoPlat(Request $request){
        // mendapatkan inputan no_plat dari user
        $mobil_id = $request->input('mobil_id');
        $no_plat = $request->input('no_plat');

        // mendapatkan data no_plat sebenarnya
        $act_no_plat = DB::table('mobils')->where('id','=',$mobil_id)->value('no_plat');

        if($no_plat == $act_no_plat){
            $result = 1;
        }
        else{
            $result = 0;
        }

        return $result;
    }

    public function update_status(Request $request){
        $mobil_id = $request->mobil_id;
        $order_id = $request->order_id;
        $status = 1;
        // dd($order_id);
        // mengupdate status mobil
        Mobil::where('id', $mobil_id)->update(['status' => $status]);

        //mengupdate status sewa
        Order::where('id', $order_id)->update(['status_sewa' => $status]);

        return redirect('/dashboard/pengembalians')->with('success', 'Mobil berhasil dikembalikan!');
    }
}
