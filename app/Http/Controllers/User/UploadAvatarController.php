<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Avatar\AvatarService;
use App\Services\User\Avatar\DTO\AvatarRequest;
use App\Services\User\UserInformationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UploadAvatarController extends Controller
{
    private AvatarService $avatarService;

    public function __construct(AvatarService $avatarService)
    {
        $this->avatarService = $avatarService;
    }

    public function store(int $userId, Request $request): RedirectResponse
    {
        $this->validate($request, [
            'avatar' => 'required|image'
        ]);
        $this->avatarService->handle(new AvatarRequest($userId, $request->file('avatar')));
        return redirect()->back();
    }
}
