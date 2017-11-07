<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Badges;
use App\Userbadges;
use Illuminate\Support\Facades\Auth;

class BadgesController extends Controller
{

    public function index()
    {

        $badge = Badges::all();
        return view('layouts.achievements', compact('badge'));


    }

    public function achievedBadges()
    {

        $id = Auth::user()->id;

        $achieved =  Userbadges::all()->where('user_id', $id);

        return view('layouts.achievements', compact('achieved'));


    }
}
