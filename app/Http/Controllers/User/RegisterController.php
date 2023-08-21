<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Registration\DTO\UserRequest;
use App\Services\User\Registration\Exception\DublicateEmailException;
use App\Services\User\Registration\FailedRegistrationUser;
use App\Services\User\Registration\FormRequest\RegistrationFormRequest;
use App\Services\User\Registration\RegistrationService;
use Auth;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    private RegistrationService $registrationService;
    private FailedRegistrationUser $failedRegistrationUser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegistrationService $registrationService, FailedRegistrationUser $failedRegistrationUser)
    {
        $this->middleware('guest');
        $this->registrationService = $registrationService;
        $this->failedRegistrationUser = $failedRegistrationUser;
    }

    protected function register(RegistrationFormRequest $request): RedirectResponse
    {
        try {
            $user = $this->registrationService->register(UserRequest::createFromRequest($request));
            Auth::login($user);
        } catch (DublicateEmailException $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'email' => $e->getMessage()]
                );
        }

        return redirect()->route('users.show', $user);
    }
}
