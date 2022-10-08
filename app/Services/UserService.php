<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /**
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        return User::all();
    }
}
