<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Golongan;
use App\Models\Pelanggan;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            "title" => "Home",
            "totalUser" => count(User::all()),
            "totalGolongan" => count(Golongan::all()),
            "totalPelanggan" => count(Pelanggan::all())
        ]);
    }
}
