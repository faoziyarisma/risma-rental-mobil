<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $is_admin = auth()->user()->is_admin;
        $user_id = auth()->user()->id;
        if($is_admin){
            $mobils = Mobil::latest()->paginate(10);
        }
        else{
            // $mobils = Mobil->where()->paginate(10);
            $mobils = DB::table('mobils')->where('user_id','>=',$user_id)->paginate(10);
        }
        // dd($mobils);
        return view('dashboard.mobil.index',['title'=>'Data Mobil','mobils'=>$mobils]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mobil.create',[
            'title' => 'Tambah Mobil',
            // 'laporanHarian' => laporanHarian::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($user_id);
        // dd($request);
        $validatedData = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'no_plat' => 'required',
            'tarif_per_hari' => 'required',
        ]);
        // dd($validatedData);
        // $validatedData['status'] = 1;
        $user_id  = auth()->user()->id;
        $validatedData['user_id'] = $user_id;
        Mobil::create($validatedData);
        return redirect('/dashboard/mobils')->with('success', 'Data mobil berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        return view('dashboard.mobil.show', [
            'title' => 'Detail Mobil',
            'mobil' => $mobil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('dashboard.mobil.edit',[
            'title' => 'Edit Data Mobil',
            'mobil' => $mobil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $rules = [
            'merek' => 'required',
            'model' => 'required',
            'no_plat' => 'required',
            'tarif_per_hari' => 'required'
        ];

        $validatedData = $request->validate($rules);
        Mobil::where('id', $mobil->id)->update($validatedData);
        return redirect('/dashboard/mobils')->with('success', 'Data mobil berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        Mobil::destroy($mobil->id);
        return redirect('/dashboard/mobils')->with('success', 'Data mobil berhasil dihapus!');
    }

    /**
     * Fungsi status_name : untuk mengetahui status dari mobil yang diketahui
     */
    public static function status_name(int $status){
        if($status==1){
            $result = "Tersedia";
        }
        else{
            $result = "Sedang disewa";
        }

        return $result;
    }
}
