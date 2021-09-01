<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Helpers\JsonResponse;
use Illuminate\Support\Facades\Lang;

class RegisterController extends Controller
{
    /**
     * will validating the request and create user
     * then send verification mail him if email not real will rise un error 
     * asking him to send real email
     * @param RegisterRequest $request
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, UserRepository $userRepository)
    {
        $user = $userRepository->create($request->validated());
        return JsonResponse::response(message: Lang::get('auth.register'), data: ['user' => $user], statusCode: 201);
    }
}
