<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    /**
     * authentication method
     * we need to replace later to convert,
     * it to jwt token for more security and statless apps
     * @param array $validatedData
     * @return object
     */
    public function signIn(array $validatedData): mixed
    {
        if (Auth::attempt($validatedData)) {
            Auth::user()->ApiTokenGenerater();
            $user = Auth::user()->only(['name', 'email', 'is_admin', 'api_token']);
        } else {
            $user = [];
        }
        return $user;
    }

    /**
     * token destroy 
     * @param object $user
     * @return bool
     */
    public function signOut(): bool
    {
        $user = auth('api')->user();
        $user->update([
            'api_token' => null
        ]);
        return true;
    }
}
