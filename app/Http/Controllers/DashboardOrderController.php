<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mobil;
// App\Http\Controllers\DateTime;

class DashboardOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $auth_id = $user->id;
        $orders = Order::where('user_id',$auth_id)->paginate(10);
        return view('dashboard.order.index', [
            'title' => 'Peminjaman Mobil',
            'orders' => $orders,
            'auth_id' => $auth_id
            // 'orders_warning' => $orders_warning,
            // 'message_warning' => $message_warning,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobils = DB::table('mobils')->where('status',1)->get();
        return view('dashboard.order.create',[
            'title' => 'Tambah Order',
            'mobils' => $mobils,
            // 'pemasoks' => $pemasoks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $mobil_id =  $request->mobil_id;
        # mencari tarif dari mobil id yang diketahui
        $tarif_per_hari = DB::table('mobils')->where('id',intval($mobil_id))->value('tarif_per_hari');
        // dd($tarif);
        // Assuming you have start_date and end_date as strings
        $startDateString = $request->tgl_mulai;
        $endDateString = $request->tgl_selesai;
        // Convert date strings to DateTime objects
        $startDate = new \DateTime($startDateString);
        $endDate = new \DateTime($endDateString);
        // Calculate the difference in days
        $interval = $startDate->diff($endDate);
        $diffInDays = $interval->days;
        $diff_date = $diffInDays + 1;
        
        # calculate tarif
        $tarif = $diff_date * $tarif_per_hari;
        // dd($tarif);

        $validatedData = $request->validate([
            // 'user_id' => 'required'
            'mobil_id' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            // 'tarif' => 'required',
        ]);

        $validatedData['user_id'] = $user_id;
        $validatedData['tarif'] = $tarif;
        $validatedData['status_sewa'] = 0;
        
        Order::create($validatedData);
        //update status mobil
        $status = 0; // Replace this with your actual status value

        // Update the mobils table where status = $status
        Mobil::where('id', $mobil_id)->update(['status' => $status]);
        return redirect('/dashboard/orders')->with('success', 'Sewa mobil berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $mobil_id = $order->mobil_id;
        $tarif_per_hari = DB::table('mobils')
        ->where('id', $mobil_id)
        ->value('tarif_per_hari');

        return view('dashboard.order.show', [
            'title' => 'Detail Data Penjualan',
            'tarif_per_hari' => $tarif_per_hari,
            'order' => $order
            // 'harga_satuan' => $harga_satuan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $mobils = DB::table('mobils')->where('status',1)->get();
        return view('dashboard.order.edit',[
            'title' => 'Edit Data Sewa',
            'order' => $order,
            'mobils' => $mobils
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $user_id = auth()->user()->id;
        $mobil_id =  $request->mobil_id;
        # mencari tarif dari mobil id yang diketahui
        $tarif_per_hari = DB::table('mobils')->where('id',intval($mobil_id))->value('tarif_per_hari');
        // dd($tarif);
        // Assuming you have start_date and end_date as strings
        $startDateString = $request->tgl_mulai;
        $endDateString = $request->tgl_selesai;
        // Convert date strings to DateTime objects
        $startDate = new \DateTime($startDateString);
        $endDate = new \DateTime($endDateString);
        // Calculate the difference in days
        $interval = $startDate->diff($endDate);
        $diffInDays = $interval->days;
        $diff_date = $diffInDays + 1;
        // dd($diff_date);
        
        # calculate tarif
        $tarif = $diff_date * $tarif_per_hari;
        // dd($tarif);

        $rules = [
            'mobil_id' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = $user_id;
        $validatedData['tarif'] = $tarif;
        
        // dd($validatedData);
        Order::where('id', $order->id)->update($validatedData);

        $status = 0; // Replace this with your actual status value

        // Update the mobils table where status = $status
        Mobil::where('id', $mobil_id)->update(['status' => $status]);
        return redirect('/dashboard/orders')->with('success', 'Data sewa mobil berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $status = 1; // Replace this with your actual status value
        $mobil_id = $order -> mobil_id;
        // Update the mobils table where status = $status
        Order::destroy($order->id);
        Mobil::where('id', $mobil_id)->update(['status' => $status]);
        return redirect('/dashboard/orders')->with('success', 'Data sewa mobil berhasil dihapus!');
    }

    /**
     * Fungsi merek_mobil : untuk mengetahui status dari mobil yang diketahui
     */
    public static function merek_mobil(int $mobil_id){
        $mobil = Mobil::find($mobil_id);
        // Check if the mobil with the given ID exists
        if ($mobil) {
            return $mobil->merek;
        }

        // If the mobil does not exist, you may return an error message or handle it as needed
        return "mobil not found";

        return $result;
    }
}
