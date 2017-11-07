<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Badges;

class BadgesController extends Controller
{

    public function index()
    {

        $badge = Badges::all();
        return view('layouts.achievements', compact('badge'));


    }
}
