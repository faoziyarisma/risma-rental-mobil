<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index',[
            'title' => 'JASA PERSEWAAN MOBIL',
            'mobils' => Mobil::latest()->paginate(4)
        ]);
    }
}
