<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Http\UserInformationService;

class UserController extends Controller
{
    private UserInformationService $userInformationService;

    public function __construct(UserInformationService $userInformationService)
    {
        $this->userInformationService = $userInformationService;
    }

    public function show(int $userId)
    {
        $user = $this->userInformationService->get($userId);
        $user = $user->jsonSerialize();
        return view('users.show', compact('user'));
    }
}
