<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Model\Team;
use App\Model\User;

class TeamListController extends Controller
{
    public function index()
    {
        $teams = Team::get();
        return view('team.index', compact('teams'));
    }
}
