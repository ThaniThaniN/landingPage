<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class adminPolicy
{
    public function enter(Admin $admin): bool
    {
        return ;
    }
}
