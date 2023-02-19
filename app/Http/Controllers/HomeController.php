<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pendidiks = User::where('role', 'pendidik')->get();
        $orangtuas = User::where('role', 'orangtua')->get();
        $anaks = Anak::get();
        
        $kelases = Kelas::get();
        $mapels = Mapel::get();

        return view('home', compact(
            'pendidiks', 
            'orangtuas',
            'anaks',
            'kelases',
            'mapels'
        ));
    }
}
