<?php

namespace App\Repositories;

use App\Interfaces\Crud;
use App\Models\User;

class UserRepository implements Crud
{
    /**
     * List resources in the database
     *
     * @return mixed
     */
    public function list(): array
    {
        $users = User::all()->toArray();
        return $users;
    }

    /**
     * Saves the resource in the database
     *
     * @param array $validatedData
     * @return object
     */
    public function create(array $validatedData): object
    {
        $user = User::create($validatedData);
        return $user;
    }

    /**
     * Updates the resource in the database
     *
     * @param array $validatedData
     * @param object $user
     * @return object
     */
    public function update(object $user, array $validatedData): object
    {
        $user->update($validatedData);
        return $user;
    }

    /**
     * Deletes the resource in the database
     *
     * @param object $user
     * @return string
     */
    public function delete(object $user): bool
    {
        $user->delete();
        return true;
    }

    public function userFeedBackRequest(): object
    {
        $user = auth('api')->user()->load('feedbacks');
        return $user;
    }
}
