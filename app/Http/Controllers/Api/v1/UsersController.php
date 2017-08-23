<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1;
use App\User;

class UsersController extends Controller
{
    public function getUsers()
    {
        return User::all();
    }
}