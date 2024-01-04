<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $mobils = Mobil::latest()->paginate(9);

        if(request('search')){
            $action = request('action');

            if ($action === 'cari') {
                // Handle the "Cari" button click
                // For example: return view('search_results');
                $word = request('search');
                // dd($word);
                $items = DB::table('mobils')->where('merek','LIKE','%'.$word."%")->orWhere('model','LIKE','%'.$word."%")->paginate(9);
                // dd($items);
                $items->appends(request()->all());
                return view('home.index',[
                    "title" => "JASA PERSEWAAN MOBIL",
                    // 'active' => 'dashboard/buku',
                    'mobils' => $items,
                ]);
            } elseif ($action === 'tersedia') {
                // Handle the "Tersedia" button click
                // For example: return view('tersedia_results');
                $mobils = DB::table('mobils')->where('status',1)->paginate(9);
                return view('home.index',[
                    'title' => 'JASA PERSEWAAN MOBIL',
                    'mobils' => $mobils
                ]);
            }
            
        }
        return view('home.index',[
            'title' => 'JASA PERSEWAAN MOBIL',
            'mobils' => $mobils
        ]);
    }

    // public function index_tersedia(){
    //     $mobils = DB::table('mobils')->where('status',1)->paginate(9);
    //     return view('home.index',[
    //         'title' => 'JASA PERSEWAAN MOBIL',
    //         'mobils' => $mobils
    //     ]);
    // }

    
}
