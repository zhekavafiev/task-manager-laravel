<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Model\Team;
use App\Services\Team\CreateTeamService;
use App\Services\Team\DTO\CreateTeamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TeamStoreController extends Controller
{
    private CreateTeamService $createTeamService;

    public function __construct(CreateTeamService $createTeamService)
    {
        $this->createTeamService = $createTeamService;
    }
    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->check($request->all());
        $this->createTeamService->create(new CreateTeamRequest(
            $request->get('name'),
            $request->get('components'),
        ));
        return redirect()->route('team.index');
    }

    /**
     * @throws ValidationException
     */
    private function check(array $requestData): void
    {
        Validator::make($requestData, [
            'name' => 'required|string|max:255',
            'components' => 'required|string|max:255',
        ])->validate();
    }
}
