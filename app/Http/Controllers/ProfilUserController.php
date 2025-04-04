<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilUserController extends Controller
{
    public function __invoke()
    {
      $userConnected = auth()->user();
      return response()->json([
        'nom'=> $userConnected->name,
        'email'=> $userConnected->email,
      ]);
    }
}
