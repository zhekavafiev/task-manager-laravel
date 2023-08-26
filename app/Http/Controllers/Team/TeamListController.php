<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Model\Team;
use App\Model\User;
use Illuminate\View\View;

class TeamListController extends Controller
{
    public function index(): View
    {
        $teams = Team::get();
        return view('team.index', compact('teams'));
    }
}
