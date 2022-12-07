<?php

declare(strict_types=1);

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Data\SessionData;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Services\UserRegisterService;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function __construct(
        protected UserRegisterService $registerService,
    ) {
    }

    public function create(): View
    {
        return View('session.create');
    }

    public function store(User $user, SessionData $data)
    {
        try {
            $authUser = $this->registerService->register($user, $data);

            auth()->login($authUser);

            session()->regenerate();
        } catch (ValidationException $exception) {
            echo $exception->getMessage();
        }
    }
}