<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title'=>"System Rent-Car",
            'menu'=>"Home",
            "submenu"=> null,
            'type'=>"home",
        ];

        return view('home', $data);
    }
}