<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visita;
use App\Models\User;

class VisitasController extends Controller
{

    public function index(Request $request)
    {
        $ip = file_get_contents('https://api64.ipify.org');
        $country = json_decode(file_get_contents('http://ip-api.com/json/'.$ip), true)['country'];
        $visita = new Visita;
        $visita->ip = $ip;
        $visita->country = $country;
        $visita->save();
        return redirect('home.php');
    }

}
