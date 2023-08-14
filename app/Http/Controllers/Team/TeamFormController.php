<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Model\Team;

class TeamFormController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = new Team();
        return view('team.create', compact('team'));
    }
}
