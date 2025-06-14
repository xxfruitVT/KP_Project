<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('tab.profil.sejarah'); 
    }
}
