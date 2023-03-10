<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpFoundation\Response;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'role_id' => 1]) && FacadesRequest::ip() == '127.0.0.1')
        {
            $token =  auth()->user()->createToken('admin')->accessToken;

            $cookie = \cookie('origin_sesion', $token,3600);

            return response([
                'token' => $token
            ])->withCookie($cookie);
        }

        return response([
            'error' => 'No es posible crear cookie para alojar el token de la sesión'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
