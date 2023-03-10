<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{


    public function getSesions()
    {
        return view('sessions');
    }
}
