<?php

namespace App\Services\Team;

use App\Model\Team;
use App\Services\Team\DTO\CreateTeamRequest;
use App\Services\Team\DTO\CreateTeamResponse;

final class CreateTeamService
{
    public function __construct()
    {
    }

    public function create(CreateTeamRequest $transfer): CreateTeamResponse
    {
        $team = new Team();
        $team->name = $transfer->getName();
        $team->components = $transfer->getComponent();
        $team->save();
        return new CreateTeamResponse(
            $team->id,
            $team->name,
            $team->components
        );
    }
}
