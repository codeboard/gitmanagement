<?php namespace Codeboard\Repositories;

use Codeboard\User;

class UserRepository {

    public function createNewUser($userData = [])
    {
        $user = User::create($userData);
        return $user;
    }

    public function updatePassword($userId, $password)
    {
        $user = User::find($userId);
        $user->password = $password;
        $user->save();
        return $user;
    }
} 