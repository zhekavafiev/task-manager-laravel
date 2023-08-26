<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Model\Team;
use Illuminate\View\View;

class TeamFormController extends Controller
{
    public function create(): View
    {
        $team = new Team();
        return view('team.create', compact('team'));
    }
}
